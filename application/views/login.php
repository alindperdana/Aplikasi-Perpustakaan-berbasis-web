<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Perpus | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
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

<body class="login-page foto">
    <div class="login-box">
        <div class="login-logo txtc">
            <h1><a href=""><b>E</b>-Perpus</a></h1>
        </div>
        <div class="login-box-body cor"><br>
            <p class="login-box-msg">Sign in to E-perpus LP3I Balikpapan</p><br>
            <?= $this->session->flashdata('gagal') ?>
            <form action="<?php echo base_url('login') ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <p class="text-center pt-5 mt-4">- OR -</p>

                    <!-- /.col -->
                </div>
            </form>
            <div class="row">
                <!-- /.col -->

                <div class="col-lg-12">
                    <a href="<?php echo base_url('home/v_laporan') ?>"><button class="btn btn-info btn-block btn-flat">Laporan Perpustakaan</button></a>
                </div>
                <!-- /.col -->
            </div>
            <br>
            <p class="text-center">
                &copy; <?= date('Y'); ?> | LP3I Balikpapan
            </p>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
    <script>
        // notifikasi gagal di hide
        //$("#notifikasi").hide();
        var logingagal = function() {
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script>
</body>

</html>