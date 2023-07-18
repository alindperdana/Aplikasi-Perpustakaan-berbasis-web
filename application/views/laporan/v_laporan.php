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
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body style="background-color: lightgrey;">
    <section class="invoice">
        <div class="row">
            <div class="col-xs-12">
                <?= $this->session->flashdata('pesan') ?>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#pinjam" data-toggle="tab">Cek Peminjaman Buku <i class="fa fa-upload"></i></a></li>
                        <li><a href="#buku" data-toggle="tab">Buku Tersedia <i class="fa fa-book"></i></a></li>
                        <!-- button kembali -->
                        <li class="pull-right"><a href="<?php echo base_url('') ?>"> <button type="button" class="btn btn-block btn-danger btn-sm ">Kembali</button></a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- Peminjaman -->
                        <div class="tab-pane active" id="pinjam">
                            <form action="<?php echo base_url('home/caripinjam') ?>" method="POST">
                                <div class="form-group">
                                    <input type="checkbox" name="cnamalengkap" value="namalengkap"> Nama Lengkap <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="tnamalengkap" placeholder="Masukan Nama Anggota / Mahasiswa" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="cjudulbuku" value="judulbuku"> Judul Buku <i class="fa fa-book"></i>
                                    <input type="text" class="form-control" name="tjudulbuku" placeholder="Masukan Judul Buku" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Cari Data Peminjaman Buku <i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- buku -->
                        <div class="tab-pane" id="buku">
                            <form action="<?php echo base_url('home/caribuku') ?>" method="POST">
                                <div class="form-group">
                                    <label>Judul Buku <i class="fa fa-book"></i></label>
                                    <input type="text" class="form-control" name="judulbuku" id="datepicker1" placeholder="Silahkan masukan Judul Buku" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Cari Buku <i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.nav-tabs-custom -->
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
    <script>
        // notifikasi gagal di hide
        //$("#notifikasi").hide();
        var notif = function() {
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(notif, 4000);
    </script>
</body>

</html>