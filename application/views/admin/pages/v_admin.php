        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Data Administrator
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
                    <li class="active">Data Administrator</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Administrator</h3>
                                <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                                    <a href="<?php echo base_url('home/v_tambahadmin') ?>"><button class="btn btn-info"><i class="fa fa-plus"></i> Tambah Administrator</button></a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-center">Foto Profil</th>
                                            <th>Nama Lengkap</th>
                                            <th>Username</th>
                                            <th>Kata Sandi</th>
                                            <th>Tipe User</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($quser as $row) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($row->foto != "") { ?>
                                                        <img style="height:auto;width:60px;" src="<?php echo base_url('images/' . $row->foto) ?>">
                                                    <?php } else { ?>
                                                        <img style="height:auto;width:100px;" src="<?php echo base_url('images/no_image.png') ?>">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row->namalengkap ?></td>
                                                <td><?php echo $row->username ?></td>
                                                <td><?php echo $row->password ?></td>
                                                <td><?php echo $row->tipeuser ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo base_url('home/v_editadmin/' . $row->id) ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url('home/hapususer/' . $row->id) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Data <?php echo $row->namalengkap ?> ?')"><i class="fa fa-trash"></i></a>
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

        <?php
        $no = 0;
        foreach ($quser as $row) {
            $no++;
        ?>
            <div class="modal fade" id="modalEditAdmin<?php echo $row->id ?>">
                <div class="modal-dialog">
                    <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit User</h4>
                        </div>
                        <form action="<?php echo base_url('home/updateuser/' . $row->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <!-- -->
                                <input type="hidden" name="role" value="Admin">
                                <div class="form-group">
                                    <label>Foto Profil <small style="color: lime;">* optional</small></label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap <small style="color: red;">* Wajib diisi</small></label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="namalengkap" value="<?php echo $row->namalengkap ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Username <small style="color: red;">* Wajib diisi</small></label>
                                    <input type="text" class="form-control" placeholder="Masukan Username" name="username" value="<?php echo $row->username ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Password <small style="color: red;">* Wajib diisi</small></label>
                                    <input type="text" class="form-control" placeholder="Masukan Password" name="password" value="<?php echo $row->password ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label>Tipe User <small style="color: red;">* Wajib diisi</small></label>
                                    <select class="form-control" name="tipeuser">
                                        <option selected value="<?php echo $row->tipeuser ?>"><?php echo $row->tipeuser ?> (Pilihan Sebelumnya)</option>
                                        <option value="superadmin">superadmin</option>
                                        <option value="admin">admin</option>
                                    </select>
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