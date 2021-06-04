<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Life Media</title>
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="<?= base_url() ?>assets/chartjs/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/chartjs/utils.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">



    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
    <style>
        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .marker {
            background-image: url('mapbox-icon.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Mapbox -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
    <!-- Mapbox -->

    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partials/navbar'); ?>
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

                                    <h3><?php echo $totalUser["total_user"] ?></h3>
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
                                    <h3><?php echo $totalOnline["online_user"] ?></h3>
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
                        <!-- LINE CHART -->
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h4>Bandwidth(<?= $satuan ?>) </h4>
                                    </center>
                                    <div style="margin-top:-38px" class="d-flex justify-content-end">
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <div class="card-body">
                                    <div style="width:100%;">
                                        <canvas id="canvas"></canvas>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <center>
                                        <h4>User Online </h4>
                                    </center>
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
        <?php $this->load->view('_partials/sidebar'); ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./_partials/wrapper -->

    <?php $this->load->view('_partials/footer'); ?>
    <?php $this->load->view('_partials/js'); ?>
</body>
<script>
    var lineChartData = {
        labels: [<?php echo $bulan ?>],
        datasets: [{
                label: 'Download(<?php echo $satuan ?>)',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [<?php echo $download; ?>],
                yAxisID: 'y-axis-1',
            },
            {
                label: 'Upload(<?php echo $satuan ?>)',
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                fill: false,
                data: [<?php echo $upload; ?>],
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

    mapboxgl.accessToken = 'pk.eyJ1Ijoib2JheWltYW5uaSIsImEiOiJja21hYjJ3dXMxcHZrMnBvajVxYm0yMjkwIn0.FLRtmHNWJu5BVEvbqrGcjg';
    var map = new mapboxgl.Map({
        container: 'map', // container ID
        style: 'mapbox://styles/mapbox/streets-v11', // style URL
        center: [110.37003766882715, -7.795934747465391], // starting position [lng, lat]
        zoom: 12 // starting zoom
    });

    <?php foreach ($wifi as $wf) { ?>
        var <?php echo $wf["id_lifemedia"]  ?> = new mapboxgl.Marker()
            .setLngLat([<?php echo $wf["lng"]  ?>, <?php echo $wf["lat"]  ?>]).setPopup(new mapboxgl.Popup().setHTML("<h6><?php echo  $wf["nama_lokasi"] ?></h6><p>Alamat : <?php echo  $wf["alamat"] ?> <br>RT : <?php echo  $wf["rt"] ?><br>RW : <?php echo  $wf["rw"] ?><br>ID Lifemedia : <?php echo  $wf["id_lifemedia"] ?><br>NAS ID : <?php echo  $wf['nasipaddress'] ?>  <br>Total : <?php echo  $wf['total'] ?> </p>"))
            .addTo(map);
    <?php } ?>
</script>

</html>



<!-- page script -->