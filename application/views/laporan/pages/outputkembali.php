<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perpustakaan</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <!-- Bootsrap costum -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">
    <!-- my style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/mystyle.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body style="background-color: lightgrey;">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="pull-right" href="<?php echo base_url('home/v_laporan') ?>">
                            <button type="button" class="btn btn-block btn-danger btn-sm ">Kembali</button>
                        </a>

                        <h2 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                            <?php echo $title; ?>
                        </h2>
                        <br><br>
                        <small style="font-family: 'Quicksand', sans-serif;">
                            Kata kunci nama :<mark><?php echo $kunci1 ?></mark>
                        </small> <br>
                        <small style="font-family: 'Quicksand', sans-serif;">
                            Kata kunci judul buku :<mark><?php echo $kunci2 ?></mark>
                        </small>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th style="width: 5%;">No Peminjaman</th>
                                    <th>Nama Anggota</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th style="width: 5%;">Tanggal Dikembalikan</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($qkembali as $row) {
                                    $no++;

                                    $tglpinjam = new DateTime($row->tglkembali);
                                    $tglkembali = new DateTime($row->tglkembalikan);

                                    $selisih = $tglkembali->diff($tglpinjam)->format("%a");

                                    $denda = $qdenda->harga * $selisih;
                                    $hasil = "Rp" . number_format($denda, 0, ',', '.') . ',-';
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->kodepinjam ?></td>
                                        <td><?php echo $row->namalengkap ?></td>
                                        <td><?php echo $row->judulbuku ?></td>
                                        <td><?php echo $row->tglpinjam ?></td>
                                        <td><?php echo $row->tglkembali ?></td>
                                        <td><?php echo $row->tglkembalikan ?></td>
                                        <td><?php echo $row->status ?></td>
                                        <td>
                                            <?php
                                            if ($tglpinjam >= $tglkembali or $selisih == 0) {
                                                echo "<p style='color:green;'>Tidak Ada Denda</p>";
                                            } else {
                                                echo "Telat $selisih Hari <br>
                                                        <p style='color:red;font-size:18px;'>$hasil</p>";
                                            }
                                            ?>
                                        </td>
                                        </td>
                                    </tr>
                                    <!-- /.modal -->
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
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
    <!-- tabel -->
    <script src="<?php echo base_url('assets') ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
</body>

</html>