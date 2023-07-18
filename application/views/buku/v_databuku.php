        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Data Buku
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
                    <li class="active">Data Buku</li>
                    <li class="active">Data Buku</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Buku</h3>
                                <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                                    <a href="<?php echo base_url('home/v_tambahbuku') ?>"> <button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Buku</button></a>

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
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
                                            <th>Stok Buku</th>
                                            <th>Aksi</th>
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
                                                <td style="width: 7%;">
                                                    <a href="<?php echo base_url('home/v_editbuku/' . $row->id) ?>" class="btn btn-info btn-sm" x><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo base_url('home/hapusbuku/' . $row->id) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Data Buku <?php echo $row->judulbuku ?> ?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
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
        </div>