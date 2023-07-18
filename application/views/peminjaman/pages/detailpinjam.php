<div class="content-wrapper">
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            Detail Data Peminjaman
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
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Peminjaman Buku</li>
            <li class="active">Detail Data Peminjaman</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <table class="table table-striped">
                                    <tr style="background:yellowgreen">
                                        <td colspan="3">Data Transaksi</td>
                                    </tr>
                                    <tr>
                                        <td>No Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $qdetail->kodepinjam ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $qdetail->tglpinjam ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl pengembalian</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $qdetail->tglkembali ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ID Anggota</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $qdetail->idanggota ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Detail Anggota</td>
                                        <td>:</td>
                                        <td>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>NIM</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->nim ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Anggota</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->namalengkap ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->kelas ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->alamat ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lama Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $tglkembali = new DateTime($qdetail->tglkembali);
                                            $tglpinjam = new DateTime($qdetail->tglpinjam);

                                            $selisih = $tglpinjam->diff($tglkembali)->format("%a");
                                            ?>
                                            <?php echo $selisih ?> Hari
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <table class="table table-striped">
                                    <tr style="background:yellowgreen">
                                        <td colspan="3">Pinjam Buku</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $tglkembali = new DateTime($qdetail->tglkembali);
                                            $tglsekarang = new DateTime();

                                            $selisih = $tglsekarang->diff($tglkembali)->format("%a");

                                            $denda = $qdenda->harga * $selisih;
                                            $hasil = "Rp" . number_format($denda, 0, ',', '.') . ',-';

                                            if ($tglkembali >= $tglsekarang or $selisih == 0) {
                                                echo "<span class='label label-warning' style='font-size:13px;'><i class='fa fa-hourglass-half'></i> Di Pinjam</span>";
                                            } else {
                                                echo "<span class='label label-danger' style='font-size:13px;'> <i class='fa fa-warning'></i> Belum Dikembalikan</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Denda</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            $tglkembali = new DateTime($qdetail->tglkembali);
                                            $tglsekarang = new DateTime();

                                            $selisih = $tglsekarang->diff($tglkembali)->format("%a");

                                            $denda = $qdenda->harga * $selisih;
                                            $hasil = "Rp" . number_format($denda, 0, ',', '.') . ',-';

                                            if ($tglkembali >= $tglsekarang or $selisih == 0) {
                                                echo "<p style='color:green;'>Tidak Ada Denda</p>";
                                            } else {
                                                echo "Telat $selisih Hari <br>
                                                    <p style='color:red;font-size:18px;'>$hasil</p>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Buku</td>
                                        <td>:</td>
                                        <td>
                                            <?php echo $qdetail->kodebuku ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Detail Buku</td>
                                        <td>:</td>
                                        <td>
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>ISBN</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->isbn ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Judul Buku</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->judulbuku ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengarang</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->pengarang ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Penerbit</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->penerbit ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori Buku</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->kategoribuku ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tahun Terbit</td>
                                                    <td>:</td>
                                                    <td><?php echo $qdetail->tahunterbit ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="pull-right">
                            <a href="<?php echo base_url('home/v_pinjam') ?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>