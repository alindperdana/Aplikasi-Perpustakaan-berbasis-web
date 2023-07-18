        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Tambah Administration
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
                    <li class="">Data Administration</li>
                    <li class="active">Edit Administration</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('foto') ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <table class="table table-striped">
                                            <tr class="bg-aqua color-palette">
                                                <td colspan="3">Upload Foto User</td>
                                            </tr>
                                            <?php
                                            if ($quser->foto != "") { ?>
                                                <td class="text-center" colspan="3">
                                                    <span class="mailbox-attachment-icon has-img"><img src="<?php echo base_url('images/' . $quser->foto) ?>"></span>
                                                    <div class="text-center">
                                                        <br>
                                                        <code>Hapus foto lama</code>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="<?php echo base_url('home/acthapusfoto/' . $quser->id) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Foto ini?')"><i class="fa fa-trash"></i>
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                            <?php } else { ?>
                                                <form action="<?php echo base_url('home/actuploadfoto/' . $quser->id) ?>" method="POST" enctype="multipart/form-data">
                                                    <tr>
                                                        <td class="text-center" colspan="3">
                                                            <span class="mailbox-attachment-icon has-img"><img id="image-preview"></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="file" name="foto" class="form-control" id="image-source" onchange="previewImage();" required>
                                                            <input type="hidden" name="namalengkap" value="<?php echo $quser->namalengkap ?>" autocomplete="off" required>
                                                            <br>
                                                            <div class="text-center">
                                                                <button type="submit" class="btn btn-primary">Upload Foto</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </form>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <form action="<?php echo base_url('home/actedituser/' . $quser->id) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="col-sm-8">
                                            <table class="table table-striped">
                                                <tr class="bg-aqua color-palette">
                                                    <td colspan=" 3">Data Diri User</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Lengkap</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="namalengkap" value="<?php echo $quser->namalengkap ?>" class="form-control" autocomplete="off" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="username" value="<?php echo $quser->username ?>" class="form-control" autocomplete="off" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe User</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="form-control" name="tipeuser">
                                                            <option value="<?php echo $quser->tipeuser ?>" selected><?php echo $quser->tipeuser ?> (Pilihan Sebelumnya)</option>
                                                            <option value="Superadmin">Superadmin</option>
                                                            <option value="Admin">Admin</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Password</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="password" name="password" value="<?php echo $quser->password ?>" id="showPassword" class="form-control" autocomplete="off" required>
                                                        <input type="checkbox" onclick="pass()"> Tampilkan Password
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-md">Edit</button>
                                    <a href="<?php echo base_url('home/v_admin') ?>" class="btn btn-danger btn-md">Kembali</a>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <script>
            function pass() {
                var x = document.getElementById("showPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <script>
            function previewImage() {
                document.getElementById("image-preview").style.display = "block";
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("image-preview").src = oFREvent.target.result;
                };
            };
        </script>