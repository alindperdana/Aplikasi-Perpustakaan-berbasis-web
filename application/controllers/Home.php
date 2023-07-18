<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$count_anggota = $this->db->query("SELECT count(namalengkap) as namalengkap FROM tb_anggota");
		$count_buku = $this->db->query("SELECT count(judulbuku) as judulbuku FROM tb_buku");
		$count_pinjam = $this->db->query("SELECT count(kodepinjam) as kodepinjam FROM tb_pinjam");
		$count_kembali = $this->db->query("SELECT count(kodepinjam) as kodepinjam FROM tb_kembali");
		$data = array(
			'count_anggota' => $count_anggota->row()->namalengkap,
			'count_buku' 	=> $count_buku->row()->judulbuku,
			'count_pinjam'  => $count_pinjam->row()->kodepinjam,
			'count_kembali' => $count_kembali->row()->kodepinjam,
		);
		$this->load->template('admin/dashboard', $data);
	}

	public function login()
	{
		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$to = base_url();

			$query = $this->db->get_where('tb_user', array('username' => $username, 'password' => $password));
			if ($query->num_rows() >= 1) {
				$row = $query->row();
				$datasession = array(
					'id' => $row->id,
					'tipeuser' => $row->tipeuser,
					'logged_in' => TRUE
				);
				$data = array(
					'alert' => "Login Berhasil!!..."
				);
				$this->session->set_userdata($datasession);

				$this->load->view('alert/loading', $data);
				echo "<meta http-equiv='refresh' content='3; url=" . $to . "'>";
			} else {
				$this->session->set_flashdata(
					'gagal',
					'<div class="alert alert-danger" id="notifikasi">					 				
					<strong><i class="icon fa fa-ban"></i>Login Gagal..!!</strong><br> 
					<small>Username atau Password Anda Salah!!</small>
					</div>'
				);
				redirect('home/login');
			}
		} else {
			$this->load->view('login');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect(base_url());
	}
	//-----------end Login--------------

	// -----------start Administrator--------------
	public function v_admin()
	{
		$quser = $this->db->query("SELECT * FROM tb_user");

		$data = array(
			'quser' => $quser->result(),
		);
		$this->load->template('admin/pages/v_admin', $data);
	}

	public function v_tambahadmin()
	{
		$this->load->template('admin/pages/tambahadmin');
	}

	public function v_editadmin($id)
	{
		$quser = $this->db->query("SELECT * FROM tb_user where id = $id");

		$data = array(
			'quser' => $quser->row(),
		);
		$this->load->template('admin/pages/editadmin', $data);
	}

	public function acttambahuser()
	{
		$to = base_url('home/v_admin');
		$to1 = base_url('home/v_tambahadmin');

		$username = $this->input->post('username');
		$namalengkap = $this->input->post('namalengkap');
		$tipeuser = $this->input->post('tipeuser');

		$cek = $this->db->get_where('tb_user', array('username' => $username, 'tipeuser' => $tipeuser));
		if ($cek->num_rows() >= 1) {
			echo "Username atau Tipeuser sudah ada";
			echo "<meta http-equiv='refresh' content='2; url=" . $to1 . "'>";
		} else {
			$namalengkap = $this->input->post('namalengkap');

			$namafoto = $namalengkap;

			$config['upload_path'] 		= './images/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['file_name'] 		= $namafoto;

			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
				exit();
			} else {
				$datax = $this->upload->data();

				$data = array(
					'namalengkap' => $this->input->post('namalengkap'),
					'username' 	  => $this->input->post('username'),
					'password' 	  => $this->input->post('password'),
					'tipeuser'    => $this->input->post('tipeuser'),
					'foto' 		  => $datax['file_name'],
				);
			}
			$config['image_library'] = 'gd2';
			$config['source_image'] = './images/' . $datax['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '100%';
			$config['width'] = '400';
			$config['new_image'] = './images/' . $datax['file_name'];

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$qinsert = $this->db->insert('tb_user', $data);

			if ($qinsert == FALSE) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            	<p><i class="icon fa fa-ban">Data User telah di gagal tambahkan !</p>
            	</div></div>');
				redirect($to);
			} else {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            	<p><i class="icon fa fa-check"></i>Data User telah di tambahkan !</p>
            	</div></div>');
				redirect($to);
			}
		}
	}

	public function actedituser($id)
	{
		$to = base_url('home/v_admin');

		$data = array(
			'namalengkap' => $this->input->post('namalengkap'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'tipeuser' => $this->input->post('tipeuser'),
		);

		$qupdate = $this->db->where(array('id' => $id));
		$qupdate = $this->db->update('tb_user', $data);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data User gagal di Edit !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data User berhasil di Edit !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function hapususer($id)
	{
		$select = $this->db->get_where('tb_user', array('id' => $id))->row();
		if ($select->foto != '') {
			$del = unlink(APPPATH . '../images/' . $select->foto);
			$qdelete = $this->db->delete('tb_user', array('id' => $id));
			$to = base_url('home/v_admin');
		} else {
			$qdelete = $this->db->delete('tb_user', array('id' => $id));
			$to = base_url('home/v_admin');
		}
		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data User gagal di Hapus !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data User berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function actuploadfoto($id)
	{
		$to = base_url('home/v_editadmin/' . $id);
		$namafoto = $this->input->post('namalengkap');

		$config['upload_path'] 		= './images/';
		$config['allowed_types'] 	= 'jpg|jpeg|png';
		$config['file_name'] 		= $namafoto;

		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			exit();
		} else {
			$data = $this->upload->data();

			$datafoto = array(
				'foto' => $data['file_name'],
			);

			$config['image_library'] = 'gd2';
			$config['source_image'] = './images/' . $data['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '100%';
			$config['width'] = '400';
			$config['new_image'] = './images/' . $data['file_name'];

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$qupdate = $this->db->where('id', $id);
			$qupdate = $this->db->update('tb_user', $datafoto);

			$this->session->set_flashdata('foto', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Upload Foto berhasil !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function acthapusfoto($id)
	{
		$to = base_url('home/v_editadmin/' . $id);
		$select = $this->db->get_where('tb_user 	', array('id' => $id))->row();
		$del    = unlink(APPPATH . '../images/' . $select->foto);

		$datafoto = array(
			'foto' => "",
		);

		$qupdate = $this->db->where('id', $id);
		$qupdate = $this->db->update('tb_user', $datafoto);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('foto', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Hapus Foto berhasil !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('foto', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Hapus Foto berhasil !</p>
            </div></div>');
			redirect($to);
		}
	}

	//------------ end Administrator-------------

	//----------start anggota---------------

	public function v_anggota()
	{
		$qkode  = $this->db->select('RIGHT(tb_anggota.idanggota,3) as idanggota', FALSE);
		$qorder = $this->db->order_by(
			'idanggota',
			'DESC'
		);
		$qlimit = $this->db->limit(1);
		$query  = $this->db->get('tb_anggota');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->idanggota) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "AG-" . $kodemax;
		$qanggota = $this->db->query("SELECT * FROM tb_anggota");

		$data = array(
			'qanggota' => $qanggota->result(),
			'idanggota' => $kodetampil,
		);
		$this->load->template(
			'anggota/v_anggota',
			$data
		);
	}

	public function acttambahanggota()
	{
		$to = base_url('home/v_anggota');


		$datainsert = array(
			'idanggota' => $this->input->post('idanggota'),
			'nim' 		  => $this->input->post('nim'),
			'namalengkap' => $this->input->post('namalengkap'),
			'kelas'       => $this->input->post('kelas'),
			'alamat'      => $this->input->post('alamat'),
		);

		$qinsert = $this->db->insert('tb_anggota', $datainsert);

		if ($qinsert == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Anggota gagal di tambahkan !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Anggota telah di tambahkan !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function updateanggota($id)
	{
		$to = base_url('home/v_anggota');

		$data = array(
			'nim' 		  => $this->input->post('nim'),
			'namalengkap' => $this->input->post('namalengkap'),
			'kelas'       => $this->input->post('kelas'),
			'alamat'      => $this->input->post('alamat'),
		);

		$qupdate = $this->db->where(array('id' => $id));
		$qupdate = $this->db->update('tb_anggota', $data);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Anggota gagal di Edit !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Anggota berhasil di Edit !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function hapusanggota($id)
	{
		$qdelete = $this->db->delete('tb_anggota', array('id' => $id));
		$to = base_url('home/v_anggota');

		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Anggota Gagal di Hapus !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Anggota berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		}
	}

	// -----------end anggota--------------

	// -------------start buku------------

	public function v_databuku()
	{
		$qbuku = $this->db->query("SELECT * FROM tb_buku");

		$data = array(
			'qbuku' => $qbuku->result(),
		);
		$this->load->template('buku/v_databuku', $data);
	}

	public function v_tambahbuku()
	{
		$qkode  = $this->db->select('RIGHT(tb_buku.kodebuku,3) as kodebuku', FALSE);
		$qorder = $this->db->order_by('kodebuku', 'DESC');
		$qlimit = $this->db->limit(1);
		$query  = $this->db->get('tb_buku');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kodebuku) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "EP-" . $kodemax;

		$qbuku = $this->db->query("SELECT * FROM tb_buku");
		$qkategoribuku = $this->db->query("SELECT * FROM tb_kategori");

		$data = array(
			'qbuku' => $qbuku->result(),
			'kodebuku' => $kodetampil,
			'qkategoribuku' => $qkategoribuku->result()
		);
		$this->load->template('buku/pages/v_tambahbuku', $data);
	}

	public function v_editbuku($id)
	{
		$qbuku = $this->db->query("SELECT * FROM tb_buku where id = $id");
		$qkategoribuku = $this->db->query("SELECT * FROM tb_kategori");

		$data = array(
			'qbuku' => $qbuku->row(),
			'qkategoribuku' => $qkategoribuku->result()
		);
		$this->load->template('buku/pages/v_editbuku', $data);
	}

	public function acttambahbuku()
	{
		$to = base_url('home/v_databuku');

		$datainsert = array(
			'kodebuku' 		=> $this->input->post('kodebuku'),
			'isbn' 		  	=> $this->input->post('isbn'),
			'judulbuku' 	=> $this->input->post('judulbuku'),
			'pengarang'     => $this->input->post('pengarang'),
			'penerbit'      => $this->input->post('penerbit'),
			'tahunterbit'   => $this->input->post('tahunterbit'),
			'kategoribuku'  => $this->input->post('kategoribuku'),
			'jumlahbuku'    => $this->input->post('jumlahbuku'),
		);

		$qinsert = $this->db->insert('tb_buku', $datainsert);

		if ($qinsert == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Buku telah gagal ditambahkan !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Buku telah berhasil ditambahkan !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function acteditbuku($id)
	{
		$to = base_url('home/v_databuku');

		$data = array(
			'kodebuku' 		=> $this->input->post('kodebuku'),
			'isbn' 		  	=> $this->input->post('isbn'),
			'judulbuku' 	=> $this->input->post('judulbuku'),
			'pengarang'     => $this->input->post('pengarang'),
			'penerbit'      => $this->input->post('penerbit'),
			'tahunterbit'   => $this->input->post('tahunterbit'),
			'kategoribuku'  => $this->input->post('kategoribuku'),
			'jumlahbuku'    => $this->input->post('jumlahbuku'),
		);

		$qupdate = $this->db->where(array('id' => $id));
		$qupdate = $this->db->update('tb_buku', $data);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Buku telah gagl di Edit !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Buku berhasil di Edit !</p>
            </div></div>');
			redirect($to);
		}
	}
	public function hapusbuku($id)
	{
		$qdelete = $this->db->delete('tb_buku', array('id' => $id));
		$to = base_url('home/v_databuku');

		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Buku Gagal di Hapus !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Data Buku berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		}
	}

	// ------------end buku-------------

	// ------------start kategori-------------

	public function v_kategoribuku()
	{
		$qkode  = $this->db->select('RIGHT(tb_kategori.kodekategori,3) as kodekategori', FALSE);
		$qorder = $this->db->order_by('kodekategori', 'DESC');
		$qlimit = $this->db->limit(1);
		$query  = $this->db->get('tb_kategori');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kodekategori) + 1;
		} else {
			$kode = 1;
		}
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "KT-" . $kodemax;
		$qkategoribuku = $this->db->query("SELECT * FROM tb_kategori");

		$data = array(
			'qkategoribuku' => $qkategoribuku->result(),
			'kodekategori' => $kodetampil,
		);
		$this->load->template('buku/v_kategoribuku', $data);
	}

	public function acttambahkategori()
	{
		$to = base_url('home/v_kategoribuku');

		$datainsert = array(
			'kodekategori' => $this->input->post('kodekategori'),
			'kategoribuku' => $this->input->post('kategoribuku'),
		);

		$qinsert = $this->db->insert('tb_kategori', $datainsert);

		if ($qinsert == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Buku gagal ditambahkan !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Kategori Buku telah berhasil ditambahkan !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function updatekategori($id)
	{
		$to = base_url('home/v_kategoribuku');

		$data = array(
			'kodekategori' => $this->input->post('kodekategori'),
			'kategoribuku' => $this->input->post('kategoribuku'),
		);

		$qupdate = $this->db->where(array('id' => $id));
		$qupdate = $this->db->update('tb_kategori', $data);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Kategori Bukugagal di Edit !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Kategori Buku berhasil di Edit !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function hapuskategori($id)
	{
		$qdelete = $this->db->delete('tb_kategori', array('id' => $id));
		$to = base_url('home/v_kategoribuku');

		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Kategori Buku berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Kategori Buku berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		}
	}

	//------------end kategori-------------

	//------------ start Pinjam-------------

	public function v_pinjam()
	{
		$qpinjam = $this->db->query("SELECT * FROM tb_pinjam JOIN tb_anggota ON tb_pinjam.idanggota = tb_anggota.idanggota JOIN tb_buku ON tb_pinjam.kodebuku = tb_buku.kodebuku");
		$qdenda =  $this->db->query("SELECT * FROM tb_denda");

		$data = array(
			'qpinjam' => $qpinjam->result(),
			'qdenda' => $qdenda->row(),
		);
		$this->load->template('peminjaman/v_peminjaman', $data);
	}

	public function v_tambahpinjam()
	{
		$query  = $this->db->query("SELECT * FROM tb_pinjam ORDER BY id DESC LIMIT 1");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			$kode = $data->id;
			$kodex = $kode;
			$kodeset = $kodex + 1;
			$kodemax = str_pad($kodeset, 3, "0", STR_PAD_LEFT);
			$kodetampil = "PJ-" . $kodemax;
		} else {
			$kodeset = 0 + 1;
			$kodemax = str_pad($kodeset, 3, "0", STR_PAD_LEFT);
			$kodetampil = "PJ-" . $kodemax;
		}

		$pinjam = $this->db->query("SELECT * FROM tb_pinjam");
		$qanggota = $this->db->query("SELECT * FROM tb_anggota");
		$qbuku = $this->db->query("SELECT * FROM tb_buku");

		$data = array(
			'qpinjam' => $pinjam->result(),
			'qanggota' => $qanggota->result(),
			'qbuku' => $qbuku->result(),
			'kodepinjam' => $kodetampil,
		);
		$this->load->template('peminjaman/pages/tambahpinjam', $data);
	}

	public function acttambahpinjam()
	{
		$to = base_url('home/v_pinjam');

		$datainsert = array(
			'kodepinjam' => $this->input->post('kodepinjam'),
			'tglpinjam' => $this->input->post('tglpinjam'),
			'idanggota' => $this->input->post('idanggota'),
			'tglkembali' => $this->input->post('tglkembali'),
			'kodebuku' => $this->input->post('kodebuku'),
		);

		$qinsert = $this->db->insert('tb_pinjam', $datainsert);

		if ($qinsert == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Peminjaman Buku Gagal !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Peminjaman Buku Berhasil !</p>
            </div></div>');
			redirect($to);
		}
	}

	public function detailpinjam($id)
	{
		$qdetail = $this->db->query("SELECT * FROM tb_pinjam JOIN tb_anggota ON tb_pinjam.idanggota = tb_anggota.idanggota JOIN tb_buku ON tb_pinjam.kodebuku = tb_buku.kodebuku where tb_pinjam.kodepinjam ='$id'");
		$qdenda =  $this->db->query("SELECT * FROM tb_denda");
		$data = array(
			'qdetail' => $qdetail->row(),
			'qdenda' => $qdenda->row(),
		);

		$this->load->template('peminjaman/pages/detailpinjam', $data);
	}

	public function hapuspinjam($id)
	{
		$qdelete = $this->db->delete('tb_pinjam', array('kodepinjam' => $id));
		$to = base_url('home/v_pinjam');

		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Peminjaman Buku Gagal di Hapus !</p>
            </div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Peminjaman Buku Berhasil di Hapus !</p>
            </div></div>');
			redirect($to);
		}
	}
	// ------------end pinjam-------------

	// ------------pengembalian-------------

	public function v_kembali()
	{
		$qkembali =	$this->db->query("SELECT * FROM tb_kembali JOIN tb_anggota ON tb_kembali.idanggota = tb_anggota.idanggota JOIN tb_buku ON tb_kembali.kodebuku = tb_buku.kodebuku");

		$qdenda =  $this->db->query("SELECT * FROM tb_denda");

		$data = array(
			'qkembali' => $qkembali->result(),
			'qdenda' => $qdenda->row(),
		);
		$this->load->template('pengembalian/v_pengembalian', $data);
	}

	public function kembalibuku($id)
	{
		$to = base_url('home/v_pinjam');
		$qpinjam = $this->db->query("SELECT * FROM tb_pinjam  where kodepinjam='$id'")->row();
		$kodepinjam = $qpinjam->kodepinjam;
		$idanggota  = $qpinjam->idanggota;
		$kodebuku   = $qpinjam->kodebuku;
		$tglpinjam  = $qpinjam->tglpinjam;
		$tglkembali = $qpinjam->tglkembali;

		$data = array(
			'kodepinjam' => $kodepinjam,
			'idanggota'  => $idanggota,
			'kodebuku' 	 => $kodebuku,
			'tglpinjam'  => $tglpinjam,
			'tglkembali' => $tglkembali,

			'tglkembalikan' => date('Y-m-d'),
			'status' => 'Dikembalikan',

		);
		$qinsert = $this->db->insert('tb_kembali', $data);

		if ($qinsert == TRUE) {
			$qdelete = $this->db->delete('tb_pinjam', array('kodepinjam' => $id));
			if ($qdelete == TRUE) {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            	<p><i class="icon fa fa-check"></i>Buku Berhasil Dikembalikan !</p>
           	 	</div></div>');
				redirect($to);
			} else {
				$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            	<p><i class="icon fa fa-ban"></i>Buku Gagal Dikembalikan !</p>
           	 	</div></div>');
				redirect($to);
			}
		} else {
			echo "Insert Gagal!" . "<br>";
			echo "<meta http-equiv='refresh' content='2; url=" . $to . "'>";
		}
	}

	public function detailkembali($id)
	{
		$qdetail = $this->db->query("SELECT * FROM tb_kembali JOIN tb_anggota ON tb_kembali.idanggota = tb_anggota.idanggota JOIN tb_buku ON tb_kembali.kodebuku = tb_buku.kodebuku where tb_kembali.kodepinjam ='$id'");
		$qdenda =  $this->db->query("SELECT * FROM tb_denda");
		$data = array(
			'qdetail' => $qdetail->row(),
			'qdenda' => $qdenda->row(),
		);

		$this->load->template('pengembalian/detailkembali', $data);
	}

	public function hapuskembali($id)
	{
		$qdelete = $this->db->delete('tb_kembali', array('kodepinjam' => $id));
		$to = base_url('home/v_kembali');

		if ($qdelete == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>History Buku gagal di Hapus !</p>
           	</div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>History Buku berhasil di Hapus !</p>
           	</div></div>');
			redirect($to);
		}
	}

	public function updatedenda($id)
	{
		$to = base_url('home/v_denda');

		$data = array(
			'harga' => $this->input->post('harga'),
		);

		$qupdate = $this->db->where(array('id' => $id));
		$qupdate = $this->db->update('tb_denda', $data);

		if ($qupdate == FALSE) {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Edit harga denda gagal !</p>
           	</div></div>');
			redirect($to);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p><i class="icon fa fa-check"></i>Edit harga denda berhasil !</p>
           	</div></div>');
			redirect($to);
		}
	}

	//-----------end pengembalian--------------

	// ----------start laporan---------------

	public function v_laporan()
	{
		$this->load->view('laporan/v_laporan');
	}

	public function caribuku()
	{
		$to = base_url('home/v_laporan');

		$judulbuku = $this->input->post('judulbuku');

		$wherenya = "judulbuku like '%" . $judulbuku . "%'";

		$qbuku = $this->db->query("SELECT * FROM tb_buku where $wherenya");

		if ($qbuku->num_rows() >= 1) {
			$data = array(
				'title' => "Hasil Pencarian Buku",
				'kunci' => $judulbuku,
				'qbuku' => $qbuku->result(),
			);
			$this->load->view('laporan/pages/outputbuku', $data);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Buku tidak ditemukan !</p>
           	</div></div>');
			redirect($to);
		}
	}

	public function caripinjam()
	{
		$to = base_url('home/v_laporan');

		$cnamalengkap = $this->input->post('cnamalengkap');
		$tnamalengkap = $this->input->post('tnamalengkap');

		$cjudulbuku = $this->input->post('cjudulbuku');
		$tjudulbuku = $this->input->post('tjudulbuku');

		if (($cnamalengkap != "" and $tnamalengkap != "") and
			($cjudulbuku != "" and $tjudulbuku != "")
		) {
			$wherenya = "tb_anggota.namalengkap like '%" . $tnamalengkap . "%' and tb_buku.judulbuku like '%" . $tjudulbuku . "%'";
		} elseif (($cnamalengkap != "" and $tnamalengkap != "") and
			($cjudulbuku == "" and $tjudulbuku == "")
		) {
			$wherenya = "tb_anggota.namalengkap like '%" . $tnamalengkap . "%'";
		} elseif (($cnamalengkap == "" and $tnamalengkap == "") and
			($cjudulbuku != "" and $tjudulbuku != "")
		) {
			$wherenya = "tb_buku.judulbuku like '%" . $tjudulbuku . "%'";
		} else {
			$wherenya = "tb_anggota.namalengkap =''";
		}

		$qpinjam =	$this->db->query("SELECT * FROM tb_pinjam JOIN tb_anggota ON tb_pinjam.idanggota = tb_anggota.idanggota JOIN tb_buku ON tb_pinjam.kodebuku = tb_buku.kodebuku where $wherenya");
		$qdenda =  $this->db->query("SELECT * FROM tb_denda");

		if ($qpinjam->num_rows() >= 1) {
			$data = array(
				'title' => "Hasil Pencarian Peminjaman Buku",
				'kunci1' => $this->input->post('tnamalengkap'),
				'kunci2' => $this->input->post('tjudulbuku'),
				'qpinjam' => $qpinjam->result(),
				'qdenda' => $qdenda->row(),
			);
			$this->load->view('laporan/pages/outputpinjam', $data);
		} else {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p><i class="icon fa fa-ban"></i>Data Peminjaman tidak ditemukan !</p>
           	</div></div>');
			redirect($to);
		}
	}

	// ------------end laporan-------------

	// -------------start denda------------
	public function v_denda()
	{
		$qdenda =	$this->db->query("SELECT * FROM tb_denda");

		$data = array(
			'qdenda' => $qdenda->result(),
		);
		$this->load->template('admin/denda', $data);
	}
}
