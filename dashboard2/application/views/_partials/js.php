<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>


<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
    	$("#example1").DataTable({
    		"responsive": true,
    		"autoWidth": false,
    	});
    	$('#example2').DataTable({
    		"paging": true,
    		"lengthChange": false,
    		"searching": false,
    		"ordering": true,
    		"info": true,
    		"autoWidth": false,
    		"responsive": true,
    	});
    });

    function yakin() {
    	return confirm("Anda Yakin Hapus?");
    }
	// function post(){
	// 	let chartRef = document.getElementById("canvas").getContext('2d');

    // $.ajax({
    //     url: dataEndpoint,
    //     dataType: 'json',
    //     success: function (graphData) {
    //         new Chart(chartRef, {
    //             type: 'bar',
    //             data: {
    //                 labels: Object.keys(graphData),
    //                 datasets: [{
    //                     label: title,
    //                     data: Object.values(graphData),
    //                 }] //end datasets
    //             }, //end data
    //             options: {
    //                 scales: {
    //                     yAxes: [{
    //                         ticks: {
    //                             beginAtZero: true
    //                         }
    //                     }]
    //                 }
    //             }
    //         });
	// 		console.log(graphData)
    //     }
    // })
	// }
    // $(function () {

    //     var start = moment().subtract(29, 'days');
    // 	var end = moment();

    // 	function cb(start, end) {
	// 		let startDate = start.format('YYYY-MM-DD');
	// 		let endDate = end.format('YYYY-MM-DD');
	// 		let date = startDate + '&' + endDate;
	// 		$(this).attr('date', date);
	// 		let today = moment().format('YYYY-MM-DD');
	// 		let dateDiff = moment(today).diff(moment(startDate), 'days');
	// 		if (dateDiff < 6) {
	// 			dataEndpoint = "<?= base_url()?>/auth/weekRange?" + date;
	// 			title = "Week View";
	// 		} else {
	// 			dataEndpoint = "<?= base_url()?>/auth/weekRange?" + date;
	// 			title = "Month View";
	// 		}
    // 		$('#reportrange span').html(start.format('MM D, YYYY') + ' - ' + end.format('MM D, YYYY'));
    //         // var haha = hasil.split("");
    //         console.log(startDate, endDate);
	// 		post();

    // 	}
    // 	$('#reportrange').daterangepicker({
    // 		startDate: start,
    // 		endDate: end,
    // 		ranges: {
    // 			'Today': [moment(), moment()],
    // 			'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    // 			'Last 7 Days': [moment().subtract(6, 'days'), moment()],
    // 			'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    // 			'This Month': [moment().startOf('month'), moment().endOf('month')],
    // 			'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    // 		}
    // 	}, cb);

    // 	cb(start, end);

    // });
</script>
<?php 
if(!isset($_GET['satuan'])){
    $jj ="Gb";
	$bagi = 1073741824;
}else{
    $jj = $_GET['satuan'];
	if($jj == "Mb") {
		$bagi = 1048576;
	}else if($jj == "Kb"){
		$bagi = 1024;
	}else {
		$bagi = 1073741824;
	}
}
?>

<script>
    var lineChartData = {
        labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ],
        datasets: [{
                label: 'Download(<?= $jj ?>)',
                borderColor: window.chartColors.red,
                backgroundColor: window.chartColors.red,
                fill: false,
                data: [<?= $download; ?>],
                yAxisID: 'y-axis-1',
            },
            {
                label: 'Upload(<?= $jj ?>)',
                borderColor: window.chartColors.blue,
                backgroundColor: window.chartColors.blue,
                fill: false,
                data: [<?= $upload; ?>],
                yAxisID: 'y-axis-1'
            }
        ]
    };


    window.onload = function() {

        function rfChart(upload, download, label) {
            //amount = loadChart().amount;
            //timestamp = loadChart().timestamp;

            var ctx = document.getElementById('canvas').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Upload',
                        data: upload, // json value received used in method
                        borderColor: window.chartColors.red,
                		backgroundColor: window.chartColors.red,
                fill: false,
                    }, {
                        label: 'Download',
                        data: download,
                        borderColor: window.chartColors.blue,
                		backgroundColor: window.chartColors.blue,
                fill: false,
                    }, ]
                }
            });
        }

        var start = moment().subtract(29, 'days');
        var end = moment();
        let dateDates = start.format('YYYY-MM-DD') + ',' + end.format('YYYY-MM-DD');
        let defaultUrl = `<?= base_url() ?>api/chart?bagi=<?= $bagi ?>&default=yes`;
        updateValueForUrl(defaultUrl);
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function (start, end) {

            let st = start.format('YYYY-MM-DD');
            let ed = end.format('YYYY-MM-DD');
            let url = `<?= base_url() ?>api/chart?start_date=${st}&end_date=${ed}&bagi=<?= $bagi ?>`;
			$('#reportrange span').html(st + ' - ' + ed);
			console.log(st,ed)
            updateValueForUrl(url);
        });

        function updateValueForUrl(url) {
			let bulanindo = ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ];
			let upload = [],download = [],label = [];
            $.getJSON(url, function(chart) {

                for (i in chart.data) {
					upload.push(chart.data[i]["upload"]);
					download.push(chart.data[i]["download"]);

                    if(chart.data[i]["bulan"] != null){
                        var labell = chart.data[i]["bulan"];
					    label.push(bulanindo[labell]);
                    }else{
                        label.push(chart.data[i]["hari"]);
                    }				
				}
				console.log(chart.data, chart.test);
				rfChart(upload, download, label);
				
            });
        }

        function uoChart(useronline, label) {
            //amount = loadChart().amount;
            //timestamp = loadChart().timestamp;

            var ctx = document.getElementById('uo').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: label,
                    datasets: [{
                        label: 'User Online',
                        data: useronline, // json value received used in method
                        borderColor: window.chartColors.green,
                		backgroundColor: window.chartColors.green,
                    },]
                }
            });
        }

        let defaultUrl1 = `<?= base_url() ?>api/chart/uo?bagi=<?= $bagi ?>&default=yes`;
        updateValueForUrl1(defaultUrl1);
        $('#reportrange1').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, function (start, end) {

            let st = start.format('YYYY-MM-DD');
            let ed = end.format('YYYY-MM-DD');
            let url = `<?= base_url() ?>api/chart/uo?start_date=${st}&end_date=${ed}&bagi=<?= $bagi ?>`;
			$('#reportrange1 span').html(st + ' - ' + ed);
			console.log(st,ed)
            updateValueForUrl1(url);
        });

        function updateValueForUrl1(url) {
			let bulanindo = ['','Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ];
			let useronline = [],label = [];
            $.getJSON(url, function(chart) {

                for (i in chart.data) {
					useronline.push(chart.data[i]["jumlah"]);

                    if(chart.data[i]["bulan"] != null){
                        var labell = chart.data[i]["bulan"];
					    label.push(bulanindo[labell]);
                    }else{
                        label.push(chart.data[i]["hari"]);
                    }				
				}
				console.log(chart.data, chart.test);
				uoChart(useronline, label);
				
            });
        }

    }
</script>