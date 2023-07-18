        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Data Anggota
                    <small>
                        <script type='text/javascript'>
                            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                            var date = new Date();
                            var day = date.getDate();
                            var month = date.getMonth();
                            var thisDay = date.getDay(),
                                thisDay = myDays[thisDay];
                            var yy = date.getYear();
                            var year = (yy < 1000) ? yy + 1900 : yy;
                            document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                            //
                        </script>
                    </small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href=""><i class="fa fa-home"></i>Dashboard</a></li>
                    <li class="active">Data Anggota</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Anggota</h3>
                                <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                                    <button type="button" onclick="tambahAnggota()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Anggota</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Anggota</th>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                            <th>Kelas</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($qanggota as $row) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->idanggota ?></td>
                                                <td><?php echo $row->nim ?></td>
                                                <td><?php echo $row->namalengkap ?></td>
                                                <td><?php echo $row->kelas ?></td>
                                                <td><?php echo $row->alamat ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditAnggota<?php echo $row->id; ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url('home/hapusanggota/' . $row->id) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Data <?php echo $row->namalengkap ?> ?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
        <div class="modal fade" id="modalTambahAnggota">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Anggota</h4>
                    </div>
                    <form action="<?php echo base_url('home/acttambahanggota') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- -->
                            <input type="hidden" name="role" value="Anggota">
                            <div class="form-group">
                                <label>ID Anggota</label>
                                <input type="text" class="form-control" name="idanggota" value="<?php echo $idanggota; ?>" required readonly>
                            </div>
                            <div class=" form-group">
                                <label>NIM <small style="color: red;">* Wajib diisi</small></label>
                                <input type="text" class="form-control" name="nim" placeholder="Masukan NIM" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                <input type="text" class="form-control" name="namalengkap" placeholder="Masukan Nama Lengkap" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Kelas <small style="color: red;">* Wajib diisi</small></label>
                                <select class="form-control" name="kelas">
                                    <option disabled selected>-- Harap Pilih Kelas --</option>
                                    <!-- X -->
                                    <option value="Business Administration 25">Business Administration 25</option>
                                    <option value="Business Administration 26">Business Administration 26</option>
                                    <option value="Computerized Accounting 13">Computerized Accounting 13</option>
                                    <option value="Informatics Computer 13">Informatics Computer 13</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                <textarea class="form-control" style="resize: none; height: 120px;" name="alamat" required autocomplete="off"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block fa fa-save"> Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <?php
        $no = 0;
        foreach ($qanggota as $row) {
            $no++;
        ?>
            <div class="modal fade" id="modalEditAnggota<?php echo $row->id ?>">
                <div class="modal-dialog">
                    <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Anggota</h4>
                        </div>
                        <form action="<?php echo base_url('home/updateanggota/' . $row->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <!-- -->
                                <input type="hidden" name="role" value="Anggota">
                                <div class="form-group">
                                    <label>ID Anggota</label>
                                    <input type="text" class="form-control" name="idanggota" required autocomplete="off" value="<?php echo $row->idanggota ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIM <small style="color: red;">* Wajib diisi</small></label>
                                    <input type="text" class="form-control" name="nim" required autocomplete="off" value="<?php echo $row->nim ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                    <input type="text" class="form-control" name="namalengkap" required autocomplete="off" value="<?php echo $row->namalengkap ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kelas <small style="color: red;">* Wajib diisi</small></label>
                                    <select class="form-control" name="kelas">
                                        <option selected value="<?php echo $row->kelas ?>"><?php echo $row->kelas ?> (Pilihan Sebelumnya)</option>
                                        <!-- X -->
                                        <option value="Business Administration 25">Business Administration 25</option>
                                        <option value="Business Administration 26">Business Administration 26</option>
                                        <option value="Computerized Accounting 13">Computerized Accounting 13</option>
                                        <option value="Informatics Computer 13">Informatics Computer 13</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                    <textarea class="form-control" style="resize: none; height: 120px;" name="alamat" required autocomplete="off"><?php echo $row->alamat ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block fa fa-save"> Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <?php } ?>
        <!-- end modal -->
        <script>
            function tambahAnggota() {
                $('#modalTambahAnggota').modal('show');
            }
        </script>