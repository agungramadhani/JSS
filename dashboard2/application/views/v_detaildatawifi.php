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
                            <h3 class="card-title">Grafik</h3>
                        </div>

                        <!-- /.card-header -->
                        <canvas id="graph<?php echo $ww->no ?>" width="400" height="200"></canvas>
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
                                        <th>Alamat</th>
                                        <th>PIC</th>
                                        <th>Foto Stiker</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $ww->alamat ?></td>
                                        <td><?php echo $ww->pic ?></td>
                                        <td><?php echo $ww->foto_stiker ?></td>
                                        <td><?php echo $ww->lat ?></td>
                                        <td><?php echo $ww->lng ?></td>
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