        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Dashboard
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
                    <li><a href="dashboard"><i class="fa fa-home"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            <section class="content">
                <div class="alert alert-secondary" style="color: #383d41; background-color: #e2e3e5; border-color: #d6d8db;">
                    Selamat Datang, di Perpustakaan E-Perpus.
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $count_anggota ?></h3>
                                <p>Anggota</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="<?php echo base_url('home/v_anggota') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $count_buku ?></h3>
                                <p>Buku</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="<?php echo base_url('home/v_databuku') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $count_pinjam ?></h3>
                                <p>Peminjaman</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-upload"></i>
                            </div>
                            <a href="<?php echo base_url('home/v_pinjam') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $count_kembali ?></h3>
                                <p>Pengembalian</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-download"></i>
                            </div>
                            <a href="<?php echo base_url('home/v_kembali') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </section>
        </div>