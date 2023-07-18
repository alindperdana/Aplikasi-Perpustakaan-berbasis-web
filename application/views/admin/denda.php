        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Denda
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
                    <li class="">Data Denda</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Peminjaman Buku</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Harga Denda</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($qdenda as $row) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->harga ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalEditdenda<?php echo $row->id ?>"><i class="fa fa-edit"></i></a>
                                                </td>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalEditdenda<?php echo $row->id ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="border-radius: 5px;">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Edit Data Denda</h4>
                                                        </div>
                                                        <form action="<?php echo base_url('home/updatedenda/' . $row->id) ?>" enctype="multipart/form-data" method="POST">
                                                            <div class="modal-body">
                                                                <input type="hidden" value="" name="">
                                                                <div class="form-group">
                                                                    <label>Harga Denda <small style="color: red;">* Wajib diisi</small></label>
                                                                    <input type="text" class="form-control" value="<?php echo $row->harga ?>" name="harga" autocomplete="off" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>

                                            </div>
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