        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Kategori Buku
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
                    <li class="active">Data Buku</li>
                    <li class="active">Kategori Buku</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Kategori Buku</h3>
                                <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                                    <button type="button" onclick="tambahKategori()" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Kategori</button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Kategori Buku</th>
                                            <th>Kategori Buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($qkategoribuku as $row) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->kodekategori ?></td>
                                                <td><?php echo $row->kategoribuku ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditKategori<?php echo $row->id ?>"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url('home/hapuskategori/' . $row->id) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Data Kategori Buku <?php echo $row->kategoribuku ?> ?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalEditKategori<?php echo $row->id ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="border-radius: 5px;">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Kategori</h4>
                                                        </div>
                                                        <form action="<?php echo base_url('home/updatekategori/' . $row->id) ?>" enctype="multipart/form-data" method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" value="" name="">
                                                                <div class="form-group">
                                                                    <label>Kode Kategori</label>
                                                                    <input type="text" class="form-control" name="kodekategori" required value="<?php echo $row->kodekategori ?>" autocomplete="off" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Kategori <small style="color: red;">* Wajib diisi</small></label>
                                                                    <input type="text" class="form-control" value="<?php echo $row->kategoribuku ?>" name="kategoribuku" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                    </tbody>
                                <?php } ?>
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
            <!-- /.content -->
        </div>
        <form action="<?php echo base_url('home/acttambahkategori') ?>" enctype="multipart/form-data" method="POST">
            <div class="modal fade" id="modalTambahKategori">
                <div class="modal-dialog">
                    <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Tambah Kategori</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Kode Kategori</label>
                                <input type="text" class="form-control" name="kodekategori" required value="<?php echo $kodekategori; ?>" autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori <small style="color: red;">* Wajib diisi</small></label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Kategori" name="kategoribuku" required autocomplete="off">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </form>

        <script>
            function tambahKategori() {
                $('#modalTambahKategori').modal('show');
            }
        </script>