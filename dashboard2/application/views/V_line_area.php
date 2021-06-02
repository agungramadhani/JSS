<head>
    <meta charset=utf-8 />
    <title>Morris.js Bar and Stacked Chart With Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
</head>

<body>
    <h3 class="text-primary text-center">
        Morris charts with Codeigniter
    </h3>
    <div class"row">

        <div class="col-sm-12 text-center">
            <label class="label label-success">Line Chart</label>
            <div id="line-chart"></div>
        </div>
        <div class="col-sm-12 text-center">
            <label class="label label-success">Area Chart</label>
            <div id="area-chart"></div>
        </div>

    </div>
</body>

<script>
    var serries = JSON.parse(`<?php echo $chart_data; ?>`);
    console.log(serries);
    var data = serries,
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['Current Month Date Wise Total Registered Users'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors: ['gray', 'red']
        };

    config.element = 'area-chart';
    Morris.Area(config);

    config.element = 'line-chart';
    Morris.Line(config);
</script>