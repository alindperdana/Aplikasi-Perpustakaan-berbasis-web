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

                        <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                            <?php echo $title; ?>
                        </h3>
                        <br><br>
                        <h6 class="box-title" style="font-family: 'Quicksand', sans-serif;">
                            Kata kunci :<mark><?php echo $kunci ?></mark>
                        </h6>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Buku</th>
                                    <th>ISBN</th>
                                    <th>Judul Buku</th>
                                    <th>Pengarang Buku</th>
                                    <th>Penerbit</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kategori Buku</th>
                                    <th>Jumlah Buku Tersedia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($qbuku as $row) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row->kodebuku ?></td>
                                        <td><?php echo $row->isbn ?></td>
                                        <td><?php echo $row->judulbuku ?></td>
                                        <td><?php echo $row->pengarang ?></td>
                                        <td><?php echo $row->penerbit ?></td>
                                        <td><?php echo $row->tahunterbit ?></td>
                                        <td><?php echo $row->kategoribuku ?></td>
                                        <td><?php echo $row->jumlahbuku ?></td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>

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