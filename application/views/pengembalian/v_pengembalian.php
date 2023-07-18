        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    History Peminjaman Buku
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
                    <li class="active">History Peminjaman Buku</li>
                </ol>
            </section>
            <section class="content">
                <?= $this->session->flashdata('pesan') ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title" style="font-family: 'Quicksand', sans-serif; font-weight: bold;">History Peminjaman Buku</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th style="width: 5%;">No Peminjaman</th>
                                            <th>Nama Anggota</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th style="width: 5%;">Tanggal Dikembalikan</th>
                                            <th>Status</th>
                                            <th>Denda</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($qkembali as $row) {
                                            $no++;

                                            $tglpinjam = new DateTime($row->tglkembali);
                                            $tglkembali = new DateTime($row->tglkembalikan);

                                            $selisih = $tglkembali->diff($tglpinjam)->format("%a");

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
                                                <td><?php echo $row->tglkembalikan ?></td>
                                                <td><?php echo $row->status ?></td>
                                                <td>
                                                    <?php
                                                    if ($tglpinjam >= $tglkembali or $selisih == 0) {
                                                        echo "<p style='color:green;'>Tidak Ada Denda</p>";
                                                    } else {
                                                        echo "Telat $selisih Hari <br>
                                                        <p style='color:red;font-size:18px;'>$hasil</p>";
                                                    }
                                                    ?>
                                                </td>

                                                <td class=" text-center">
                                                    <a href="<?php echo base_url('home/detailkembali/' . $row->kodepinjam) ?>" class="btn btn-info btn-sm fa fa-eye"></i></a>

                                                    <a href="<?php echo base_url('home/hapuskembali/' . $row->kodepinjam) ?>" class="btn btn-danger btn-sm btn-del" onclick="return confirm('Yakin Akan Menghapus History Peminjaman <?php echo $row->namalengkap ?> ?')"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <!-- /.modal -->
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