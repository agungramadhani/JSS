<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- <h1 class="h3 mb-0 text-gray-800">&nbsp;Dashboard</h1> -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ranking WiFi</h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Upload</th>
                                        <th>Download</th>
                                        <th>Ip</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ranking as $rw) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $rw->nama_lokasi ?></td>
                                            <td><?= $rw->upload ?></td>
                                            <td><?= $rw->upload ?></td>
                                            <td><?= $rw->ip ?> </td>


                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data WiFi</h3>
                            <div class="card-tools">
                                <a href="<?= base_url() ?>home/input_wifi">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus"></i>Tambah Data Wifi</button>

                                </a>
                                <a><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah_excel">
                                        <i class="fas fa-plus"></i>Import Excel </button></a>
                                <div class="modal fade" id="tambah_excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pilih File Excel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url() ?>Exel_import/fetch" method="post" enctype="multipart/form-data">
                                                    <input type="file" name="file" />
                                                    <input type="submit" value="Upload file" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Lokasi</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>RT</th>
                                        <th>RW</th>
                                        <th>Status</th>
                                        <th>ID Lifemedia</th>
                                        <th>IP</th>
                                        <th>Hasil Survey</th>
                                        <th>Alamat</th>
                                        <th>PIC</th>
                                        <th>Foto Stiker</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($wifi as $tyy) {
                                    ?>
                                        <tr>
                                            <td><?php echo $tyy->no ?></td>
                                            <td><?php echo $tyy->nama_lokasi ?></td>
                                            <td><?php echo $tyy->kemantren ?></td>
                                            <td><?php echo $tyy->kelurahan ?></td>
                                            <td><?php echo $tyy->rt ?></td>
                                            <td><?php echo $tyy->rw ?></td>
                                            <td><?php echo $tyy->status ?></td>
                                            <td><?php echo $tyy->id_lifemedia ?></td>
                                            <td><?php echo $tyy->ip ?></td>
                                            <td><?php echo $tyy->hasil_survey ?></td>
                                            <td><?php echo $tyy->alamat ?></td>
                                            <td><?php echo $tyy->pic ?></td>
                                            <td><?php echo $tyy->foto_stiker ?></td>
                                            <td><?php echo $tyy->lat ?></td>
                                            <td><?php echo $tyy->lng ?></td>
                                            <td><a href="<?php echo base_url() . 'home/v_editwifi/' . $tyy->no ?>"><button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></button></a>

                                                <?php
                                                echo anchor(base_url('home/hapus/' . $tyy->no), '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>', 'onclick="javasciprt: return confirm(\'Anda Yakin Hapus ?\')"'); ?>

                                                <?php echo anchor(base_url('home/detaildata_wifi/' . $tyy->no), '<div class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i></div></button></a>'); ?>
                                            </td>


                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.container-fluid -->

            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./_partials/wrapper -->

</body>

</html>
<div>


</div>