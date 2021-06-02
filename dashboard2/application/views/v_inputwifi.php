<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><strong>
                                    <h4>Input Data Wifi</h4>
                                </strong></div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url() ?>home/tambah_aksi" method="post" enctype="multipart/form-data">

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_lokasi" placeholder="Nama Lokasi" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kemantren" placeholder="Kecamatan" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kelurahan" placeholder="Kelurahan" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">RT</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="rt" placeholder="RT" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">RW</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="rw" placeholder="RW" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="status" placeholder="Status" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">ID Lifemedia</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_lifemedia" placeholder="ID Lifemedia" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">IP </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="ip" placeholder="IP" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Hasil Survey</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="hasil_survey" placeholder="Hasil Survey" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="alamat" placeholder="Alamat" size="4" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">PIC</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pic" placeholder="PIC" size="4" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Foto Stiker</label>
                                    <div class="col-md-4">
                                        <input class="form-control form-white" placeholder="Foto Stiker" type="file" name="foto_stiker" id="foto_stiker" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Latitude</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lat" placeholder="Latitude" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Longitude</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="lng" placeholder="Longitude" size="4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">&nbsp;</label>
                                    <div class="col-sm-10">
                                        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                                        <a class="btn btn-danger" onclick="goBack()">
                                            <font color="white">Kembali</font>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
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

<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>