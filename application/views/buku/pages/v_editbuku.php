        <div class="content-wrapper">
            <section class="content-header">
                <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
                    Edit Buku
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
                    <li class="">Data Buku</li>
                    <li class="active">Edit Buku</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <small style="color: red;">* Wajib diisi sesuai Data yang ada di Sampul Buku</small>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="<?php echo base_url('home/acteditbuku/' . $qbuku->id) ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped">
                                                <tr class="bg-aqua color-palette">
                                                    <td colspan="3">Edit Data Buku</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Kode Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="kodebuku" value="<?php echo $qbuku->kodebuku ?>" required readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">ISBN</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="isbn" autocomplete="off" value="<?php echo $qbuku->isbn ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Judul Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="judulbuku" autocomplete="off" value="<?php echo $qbuku->judulbuku ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Pengarang Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="pengarang" autocomplete="off" value="<?php echo $qbuku->pengarang ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Penerbit Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="text" class="form-control" name="penerbit" autocomplete="off" value="<?php echo $qbuku->penerbit ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Kategori Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <select class="form-control" name="kategoribuku">
                                                            <option selected value="<?php echo $qbuku->kategoribuku ?>"><?php echo $qbuku->kategoribuku ?> (Pilihan Sebelumnya)</option>
                                                            <?php
                                                            foreach ($qkategoribuku as $row) { ?>
                                                                <option value="<?php echo $row->kategoribuku ?>">
                                                                    <?php echo $row->kategoribuku ?>
                                                                </option>
                                                            <?php }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Tahun Terbit</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="tahunterbit" autocomplete="off" value="<?php echo $qbuku->tahunterbit ?>" required>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 15%;">Jumlah Buku</td>
                                                    <td style="width: 5%;">:</td>
                                                    <td>
                                                        <input type="number" class="form-control" name="jumlahbuku" autocomplete="off" required value="<?php echo $qbuku->jumlahbuku ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-md">Edit</button>
                                </form>
                                <a href="<?php echo base_url('home/v_databuku') ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>