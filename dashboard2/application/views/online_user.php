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
                            <h3 class="card-title">Online Users</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Framed IP Address</th>
                                        <th>Calling Station ID</th>
                                        <th>Start Time</th>
                                        <th>Session Time</th>
                                        <th>NAS IP Address</th>
                                        <th>Called Station ID</th>
                                        <th>Session ID</th>
                                        <th>Upload</th>
                                        <th>Download</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($yyy as $ty) { ?>
                                        <tr>

                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $ty->username ?></td>
                                            <td><?php echo $ty->FramedIPAddress ?></td>
                                            <td><?php echo $ty->CallingStationId ?></td>
                                            <td><?php echo $ty->AcctStartTime ?></td>
                                            <td><?php echo $ty->AcctSessionTime ?></td>
                                            <td><?php echo $ty->NASIPAddress ?></td>
                                            <td><?php echo $ty->CalledStationId ?></td>
                                            <td><?php echo $ty->AcctSessionId ?></td>
                                            <td><?php echo formatBytes($ty->Upload, 2) ?></td>
                                            <td><?php echo formatBytes($ty->Download, 2) ?></td>
                                            <td><a href="<?= base_url() ?>home/v_editwifi"><button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i></button></a>
                                                <a href="<?= base_url() ?>home/hapus"><button onclick="yakin()" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i></button></a>
                                            </td>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Framed IP Address</th>
                                        <th>Calling Station ID</th>
                                        <th>Start Time</th>
                                        <th>Session Time</th>
                                        <th>NAS IP Address</th>
                                        <th>Called Station ID</th>
                                        <th>Session ID</th>
                                        <th>Upload</th>
                                        <th>Download</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
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