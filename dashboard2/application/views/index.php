<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <!-- Mapbox -->

    <div class="wrapper">

        <!-- Navbar -->
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- container-fluid -->
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    $query = $this->db->query("SELECT radcheck.username FROM radcheck WHERE Username LIKE '%jss%'")->num_rows();
                                    ?>
                                    <h3><?php echo $query; ?></h3>
                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-man"></i>
                                </div>
                                <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $klo = $this->db->query("SELECT * FROM radacct WHERE (radacct.AcctStopTime) AND (radacct.Username LIKE '%jss%')")->num_rows();
                                    ?>
                                    <h3><?php echo $klo; ?></h3>
                                    <p>Online Users</p>

                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="online-user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row" >
                        <!-- LINE CHART -->
                        <div class="col-lg-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h4>Bandwidth(<?= $satuan ?>) </h4>
                                </center>
                                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                	<i class="fa fa-calendar"></i>&nbsp;
                                	<span></span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="canvas"></canvas>
                                </div>
                                <div style="margin-top:10px"  class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <a class="btn-sm btn-secondary dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Satuan
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="?satuan=Gb">Gb(Gigabyte)</a>
                                            <a class="dropdown-item" href="?satuan=Mb">Mb(Megabyte)</a>
                                            <a class="dropdown-item" href="?satuan=Kb">Kb(Kilobyte)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                        <div class="card" style="padding-bottom:34px;">
                            <div class="card-header">
                                <center>
                                    <h4>User Online </h4>
                                </center>
                                <div id="reportrange1" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                	<i class="fa fa-calendar"></i>&nbsp;
                                	<span></span> <i class="fa fa-caret-down"></i>
                                </div>
                                <div id="cob"></div>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="uo"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- Mapbox -->
                    <div class="row">
                        <div class="card col-12">
                        <div class="card-header">
                                <center>
                                    <h4>Lokasi Menara</h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="margin-left:-30px;padding:300px 10px 300px 10px;width:10%;">
                                    <div id="map" style="margin-top:70px;width:99%;margin-bottom:10px"></div>
                                </div>
                            </div>
                            <script>
                                // TO MAKE THE MAP APPEAR YOU MUST
                                // ADD YOUR ACCESS TOKEN FROM
                                // https://account.mapbox.com
                                mapboxgl.accessToken = 'pk.eyJ1Ijoib2JheWltYW5uaSIsImEiOiJja21hYjJ3dXMxcHZrMnBvajVxYm0yMjkwIn0.FLRtmHNWJu5BVEvbqrGcjg';
                                var map = new mapboxgl.Map({
                                    container: 'map', // container ID
                                    style: 'mapbox://styles/mapbox/streets-v11', // style URL
                                    center: [110.37003766882715, -7.795934747465391], // starting position [lng, lat]
                                    zoom: 12 // starting zoom
                                });
                                map.scrollZoom.disable();
                                map.addControl(new mapboxgl.NavigationControl());
                                // Set options
                                <?php
                                if (!empty($wifi)) {
                                    foreach ($wifi as $apl) {
                                        $rd = $this->db->query("SELECT radacct.radacctid as 'total',ip,nasipaddress,framedipaddress,nama_lokasi,rt,rw,alamat,status,id_lifemedia FROM radacct RIght join data_wifi on radacct.nasipaddress = data_wifi.ip where lat != 0 and lng != 0 and data_wifi.ip ='" . $apl->ip . "'")->row_array(); ?>
                                        var marker = new mapboxgl.Marker({
                                                color: "#f51616",
                                                draggable: false
                                            }).setLngLat([<?= $apl->lng ?>, <?= $apl->lat ?>])
                                            .setPopup(new mapboxgl.Popup().setHTML("<h6><?= $apl->nama_lokasi ?></h6><p>Alamat : <?= $apl->alamat ?> <br>RT : <?= $apl->rt ?><br>RW : <?= $apl->rw ?><br>ID Lifemedia : <?= $apl->id_lifemedia ?><br>NAS ID : <?= $rd['nasipaddress'] ?> <br>Latitude : <?= $apl->lat ?><br>Longitude : <?= $apl->lng ?><br>Total : <?= $rd['total'] ?> </p>"))
                                            .addTo(map);
                                <?php

                                    }
                                }
                                ?>
                            </script>
                            <script>
                                // Add the following code if you want the name of the file appear on select
                                $(".custom-file-input").on("change", function() {
                                    var fileName = $(this).val().split("\\").pop();
                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                });
                            </script>
                        </div>
                    </div>
                    <!-- /.Mapbox -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./_partials/wrapper -->
</body>

</html>

<!-- page script -->