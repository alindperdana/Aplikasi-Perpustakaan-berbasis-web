        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Tambah Peminjaman
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
                    <li class="">Data Peminjaman</li>
                    <li class="active">Tambah Peminjaman</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="<?php echo base_url('home/acttambahpinjam') ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <table class="table table-striped">
                                                <tr class="bg-aqua color-palette">
                                                    <td colspan="3">Data Transaksi</td>
                                                </tr>
                                                <tr>
                                                    <td>No Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="kodepinjam" value="<?php echo $kodepinjam ?>" readonly class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pinjam</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" value="<?= date('Y-m-d'); ?>" name="tglpinjam" class="form-control" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Anggota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select class="form-control select2" name="idanggota" style="width: 100%;" required>
                                                            <option value="" selected>-- Pilih Anggota --</option>
                                                            <?php
                                                            foreach ($qanggota as $row) { ?>
                                                                <option value="<?php echo $row->idanggota ?>">
                                                                    <?php echo $row->idanggota ?> - <?php echo $row->namalengkap ?> (<?php
                                                                                                                                        if ($row->kelas == "Informatics Computer 13") {
                                                                                                                                            echo "IK 13";
                                                                                                                                        } elseif ($row->kelas == "Computerized Accounting 13") {
                                                                                                                                            echo "KA 13";
                                                                                                                                        } elseif ($row->kelas == "Business Administration 26") {
                                                                                                                                            echo "BA 26";
                                                                                                                                        } else {
                                                                                                                                            echo "BA 25";
                                                                                                                                        }
                                                                                                                                        ?>)
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Kembali</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" name="tglkembali" class="form-control" required>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-7">
                                            <table class="table table-striped">
                                                <tr class="bg-aqua color-palette">
                                                    <td colspan=" 3">Pinjam Buku</td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Buku</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control select2" name="kodebuku" style="width: 100%;" required>
                                                                <option value="" selected>-- Pilih Buku --</option>
                                                                <?php

                                                                foreach ($qbuku as $row) {
                                                                    if ($row->jumlahbuku <= 0) {
                                                                ?>
                                                                        <option value="<?php echo $row->kodebuku ?>" disabled>
                                                                            <?php echo $row->kodebuku ?> - <?php echo $row->judulbuku ?> (<?php echo $row->jumlahbuku ?>)
                                                                        </option>
                                                                    <?php } else { ?>
                                                                        <option value="<?php echo $row->kodebuku ?>">
                                                                            <?php echo $row->kodebuku ?> - <?php echo $row->judulbuku ?> (<?php echo $row->jumlahbuku ?>)
                                                                        </option>
                                                                    <?php } ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary btn-md">Pinjam</button>
                                </form>
                                <a href="<?php echo base_url('home/v_pinjam') ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>