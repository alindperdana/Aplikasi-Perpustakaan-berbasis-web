        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Data Peminjaman
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
                    <li class="active">Data Peminjaman</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">Data Peminjaman Buku</h3>
                                <div class="form-group m-b-2 text-right" style="margin-top: -20px; margin-bottom: -5px;">
                                    <a href="<?php echo base_url('home/v_tambahpinjam') ?>"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Peminjaman</button></a>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Peminjaman</th>
                                            <th>Nama Anggota</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Denda</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($qpinjam as $row) {
                                            $no++;

                                            $tglkembali = new DateTime($row->tglkembali);
                                            $tglsekarang = new DateTime();

                                            $selisih = $tglsekarang->diff($tglkembali)->format("%a");

                                            $denda = $qdenda->harga * $selisih;
                                            $hasil = "Rp" . number_format($denda, 0, ',', '.') . ',-';
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row->kodepinjam ?></td>
                                                <td><?php echo $row->namalengkap ?></td>
                                                <td><?php echo $row->judulbuku ?></td>
                                                <td><?php echo $row->tglpinjam ?></td>
                                                <td><?php echo $row->tglkembali ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($tglkembali >= $tglsekarang or $selisih == 0) {
                                                        echo "<span class='label label-warning' style='font-size:13px;'><i class='fa fa-hourglass-half'></i> Di Pinjam</span>";
                                                    } else {
                                                        echo "<span class='label label-danger' style='font-size:13px;'><i class='fa fa-warning'></i> Belum Dikembalikan</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($tglkembali >= $tglsekarang or $selisih == 0) {
                                                        echo "<p style='color:green;'>Tidak Ada Denda</p>";
                                                    } else {
                                                        echo "Telat $selisih Hari <br>
                                                        <p style='color:red;font-size:18px;'>$hasil</p>";
                                                    }
                                                    ?>
                                                </td>

                                                <td class="text-center">
                                                    <a href="<?php echo base_url('home/kembalibuku/' . $row->kodepinjam) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Yakin Akan Mengembalikan buku <?php echo $row->judulbuku ?> ?')"><i class="fa fa-sign-out"></i>Kembalikan</a>

                                                    <a href="<?php echo base_url('home/detailpinjam/' . $row->kodepinjam) ?>" class="btn btn-info btn-sm fa fa-eye"></i></a>

                                                    <a href="<?php echo base_url('home/hapuspinjam/' . $row->kodepinjam) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus Peminjaman ini ?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <!-- /.modal -->
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