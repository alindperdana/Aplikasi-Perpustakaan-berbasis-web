<?php
if ($this->session->logged_in != "TRUE") {
    redirect(base_url('login'));
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Perpus</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/select2/dist/css/select2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css">
    <!-- - -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- table data -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="" class="logo">
                <span class="logo-mini"><i class="fa fa-book"></i></span>
                <span class="logo-lg"><b>E</b>-Perpus <i class="fa fa-book"></i></span>
            </a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php
                                $id = $_SESSION['id'];
                                $user = $this->db->query("SELECT * FROM tb_user where id = $id")->row();
                                ?>
                                <?php
                                if ($user->foto != "") { ?>
                                    <img class="user-image" src="<?php echo base_url('images/' . $user->foto) ?>">
                                <?php } else { ?>
                                    <img class="user-image" src="<?php echo base_url('images/no_image.png') ?>">
                                <?php } ?>
                                <span class="hidden-xs"><?php echo $user->namalengkap ?> <i class="fa fa-check-circle"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <?php
                                    if ($user->foto != "") { ?>
                                        <img class="img-circle" src="<?php echo base_url('images/' . $user->foto) ?>">
                                    <?php } else { ?>
                                        <img class="img-circle" src="<?php echo base_url('images/no_image.png') ?>">
                                    <?php } ?>
                                    <p>
                                        <?php echo $user->namalengkap ?> <i class="fa fa-check-circle"></i>
                                        <small>(<?php echo $user->tipeuser ?>)</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <a href="<?php echo base_url('home/logout') ?>" class="btn btn-default btn-flat">Log Out</a>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>