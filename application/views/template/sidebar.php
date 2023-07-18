        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?php
                        $id = $_SESSION['id'];
                        $user = $this->db->query("SELECT * FROM tb_user where id = $id")->row();
                        ?>
                        <?php
                        if ($user->foto != "") { ?>
                            <img class="img-circle" src="<?php echo base_url('images/' . $user->foto) ?>">
                        <?php } else { ?>
                            <img class="img-circle" src="<?php echo base_url('images/no_image.png') ?>">
                        <?php } ?>
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php echo $user->namalengkap ?> <i class="fa fa-check-circle"></i>
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN MENU</li>
                    <li class="<?php if ($this->uri->uri_string() == '') {
                                    echo 'active';
                                } ?>">
                        <a href="<?php echo base_url('') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    <?php
                    if ($_SESSION['tipeuser'] == 'Superadmin') { ?>
                        <li class="treeview 
                        <?php if ($this->uri->uri_string() == 'home/v_admin') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/v_tambahadmin') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/v_editadmin/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/v_anggota') {
                            echo 'active';
                        } ?>
                    ">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Data User</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_admin') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_tambahadmin') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_editadmin/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_admin') ?>"><i class="fa fa-user"></i>Data Administrator</a>
                                </li>
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_anggota') {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_anggota') ?>"><i class="fa fa-user"></i> Data Anggota</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview
                            <?php if ($this->uri->uri_string() == 'home/v_databuku') {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_tambahbuku') {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_editbuku/' . $this->uri->segment('3')) {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_kategoribuku') {
                                echo 'active';
                            } ?>
                            ">
                            <a href="#">
                                <i class="glyphicon glyphicon-book"></i>
                                <span>Master Data Buku</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_databuku') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_tambahbuku') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_editbuku/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_databuku') ?>"><i class="fa fa-book"></i> Data Buku</a>
                                </li>
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_kategoribuku') {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_kategoribuku') ?>"><i class="fa fa-tag"></i> Kategori Buku</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview 
                    <?php if ($this->uri->uri_string() == 'home/v_pinjam') {
                            echo 'active';
                        } ?>
                    <?php if ($this->uri->uri_string() == 'home/v_tambahpinjam') {
                            echo 'active';
                        } ?>
                    <?php if ($this->uri->uri_string() == 'home/detailpinjam/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                    <?php if ($this->uri->uri_string() == 'home/v_kembali') {
                            echo 'active';
                        } ?>
                    <?php if ($this->uri->uri_string() == 'home/detailkembali/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                    ">
                            <a href="#">
                                <i class="glyphicon glyphicon-transfer"></i>
                                <span>Transaksi Buku</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_pinjam') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_tambahpinjam') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/detailpinjam/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>
                                ">
                                    <a href="<?php echo base_url('home/v_pinjam') ?>"><i class="fa fa-upload"></i> Peminjaman Buku</a>
                                </li>
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_kembali') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/detailkembali/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>
                                ">
                                    <a href="<?php echo base_url('home/v_kembali') ?>"><i class="fa fa-download"></i> History Peminjaman Buku</a>
                                </li>

                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->uri_string() == 'home/v_denda') {
                                        echo 'active';
                                    } ?>">
                            <a href="<?php echo base_url('home/v_denda') ?>"><i class="fa fa-money"></i> <span>Harga Denda</span></a>
                        </li>
                    <?php } else { ?>
                        <li class="treeview 
                        <?php if ($this->uri->uri_string() == 'home/v_anggota') {
                            echo 'active';
                        } ?>
                    ">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span>Data User</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_anggota') {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_anggota') ?>"><i class="fa fa-user"></i> Data Anggota</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview
                            <?php if ($this->uri->uri_string() == 'home/v_databuku') {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_tambahbuku') {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_editbuku/' . $this->uri->segment('3')) {
                                echo 'active';
                            } ?>
                            <?php if ($this->uri->uri_string() == 'home/v_kategoribuku') {
                                echo 'active';
                            } ?>
                            ">
                            <a href="#">
                                <i class="glyphicon glyphicon-book"></i>
                                <span>Master Data Buku</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_databuku') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_tambahbuku') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_editbuku/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_databuku') ?>"><i class="fa fa-book"></i> Data Buku</a>
                                </li>
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_kategoribuku') {
                                    echo 'active';
                                } ?>">
                                    <a href="<?php echo base_url('home/v_kategoribuku') ?>"><i class="fa fa-tag"></i> Kategori Buku</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview 
                        <?php if ($this->uri->uri_string() == 'home/v_pinjam') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/v_tambahpinjam') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/detailpinjam/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/v_kembali') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'home/detailkembali/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        ">
                            <a href="#">
                                <i class="glyphicon glyphicon-transfer"></i>
                                <span>Transaksi Buku</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_pinjam') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/v_tambahpinjam') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/detailpinjam/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>
                                ">
                                    <a href="<?php echo base_url('home/v_pinjam') ?>"><i class="fa fa-upload"></i> Peminjaman Buku</a>
                                </li>
                                <li class="
                                <?php if ($this->uri->uri_string() == 'home/v_kembali') {
                                    echo 'active';
                                } ?>
                                <?php if ($this->uri->uri_string() == 'home/detailkembali/' . $this->uri->segment('3')) {
                                    echo 'active';
                                } ?>
                                ">
                                    <a href="<?php echo base_url('home/v_kembali') ?>"><i class="fa fa-download"></i> History Peminjaman Buku</a>
                                </li>

                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>