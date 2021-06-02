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
                    <div class="row">
                        <!-- query grafik -->


                        <!-- LINE CHART -->
                        <div class="card col-12">
                            <div class="card-header">
                                <center>
                                    <h4>Bandwidth(Gigabyte) </h4>
                                </center>
                            </div>
                            <div class="card-body">
                                <div style="width:100%;">
                                    <canvas id="canvas"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- Mapbox -->
                    <div class="row">
                        <div class="card col-12">
                            <div id='map' style='height: 500px; width: 1080px'></div>
                            <script>
                                // TO MAKE THE MAP APPEAR YOU MUST
                                // ADD YOUR ACCESS TOKEN FROM
                                // https://account.mapbox.com
                                mapboxgl.accessToken = 'pk.eyJ1Ijoib2JheWltYW5uaSIsImEiOiJja21hYjJ3dXMxcHZrMnBvajVxYm0yMjkwIn0.FLRtmHNWJu5BVEvbqrGcjg';
                                var map = new mapboxgl.Map({
                                    container: 'map', // container ID
                                    style: 'mapbox://styles/mapbox/streets-v11', // style URL
                                    center: [110.37003766882715, -7.795934747465391], // starting position [lng, lat]
                                    zoom: 10 // starting zoom
                                });
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


<script>
    var lineChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ],
        datasets: [{
                label: 'Download(Gb)',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [<?php echo formatBytes($download); ?>],
                yAxisID: 'y-axis-1',
            },
            {
                label: 'Upload(Gb)',
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                fill: false,
                data: [<?php echo $download ?>],
                yAxisID: 'y-axis-1'
            }
        ]
    };

    window.onload = function() {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = Chart.Line(ctx, {
            data: lineChartData,
            options: {
                responsive: true,
                hoverMode: 'index',
                stacked: true,
                scales: {
                    yAxes: [{
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: 'left',
                        id: 'y-axis-1',
                    }, {
                        type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: false,
                        position: 'right',
                        id: 'y-axis-2',

                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
                }
            }
        });
    };
</script>
<!-- page script -->