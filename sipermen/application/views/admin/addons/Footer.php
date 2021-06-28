<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?= base_url(); ?>/assets/js/app.min.js"></script>
	<script src="<?= base_url(); ?>/assets/js/theme/default.min.js"></script>
	<script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
	<!-- <script src="<?= base_url(); ?>assets/script.js"></script> -->
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?= base_url(); ?>assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.colorhelpers.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.saturated.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.browser.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.time.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.resize.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.pie.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.categories.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.navigate.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.hover.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.touch.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.selection.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.symbol.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.legend.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="<?= base_url(); ?>assets/js/demo/dashboard.js"></script>
	<script>
	var handleDashboardGritterNotification = function() {
	$(window).on('load', function() {
	// setTimeout(function() {
	// 		$.gritter.add({
	// 			title: 'Welcome back, Admin!',
	// 			text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus lacus ut lectus rutrum placerat.',
	// 			image: '<?= base_url(); ?>/assets/img/user/user-2.jpg',
	// 			sticky: false,
	// 			time: '5000',
	// 			class_name: 'my-sticky-class'
	// 		});
	// 	}, 1000);
	});
	
};
</script>
<script>
	$(document).ready(function () {
		$("#soal1").hide();
		$("#soal2").hide();

		setInterval(function () {
			notiftolak();
			jmlNotif();
			cekTolak();
			userOnline();
		}, 500);


		$("#pj").change(function () {

			var fd = new FormData();
			var files = $('#pj')[0].files;

			// Check file selected or not
			if (files.length > 0) {
				fd.append('skulang', files[0]);
				fd.append('email', $('#email').val());

				$.ajax({
					url: '<?= base_url() ?>akun/skulang',
					type: 'post',
					data: fd,
					contentType: false,
					processData: false,
					success: function (response) {
						if (response != 0) {
							// $("#img").attr("src", response);
							// $(".preview img").show(); // Display image element
							window.location.replace("<?= base_url() ?>home/dashboard");
							alert(response)
						} else {
							alert(response);
						}
					},
				});
			} else {
				alert("Please select a file.");
			}
		});

		
	});
	$('#soaltipe').on('change', function () {
		if (this.value == 1) {
			$("#soal1").show();
			$("#soal2").hide();
		} else if (this.value == 2) {
			$("#soal2").show();
			$("#soal1").hide();
		} else {
			$("#soal1").hide();
			$("#soal2").hide();
		}
	});

	function notiftolak() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('email') ?>'
			},
			url: '<?= base_url()?>akun/notifTolak',
			success: function (rs) {
				$("#notif").html(rs);
			}
		});
	}

	function clickNotif(global1) {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('email') ?>'
			},
			url: '<?= base_url()?>akun/kliknotif/'+global1,
			success: function (rs) {
				console.log(rs);
				console.log(global1);
			}
		});
	}

	function userOnline() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url()?>akun/useronline',
			success: function (rs) {
				$("#useronline").html(rs);
			}
		});
	}

	function cekTolak() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('email') ?>'
			},
			url: '<?= base_url()?>akun/cektolak',
			success: function (rs) {
				if (rs == '3') {
					$("#ditolaks").html('<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-red"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun Anda Ditolak</b></h4></div></div></a>');
					$('#sidebar').load(document.URL + ' #sidebar');
				} else if (rs == '0') {
					$("#ditolaks").html('<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-orange"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun anda dalam proses verifikasi</b></h4></div></div></a>');
				} else if (rs == '2') {
					$("#ditolaks").html('<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-orange"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun anda dalam proses pengajuan ulang</b></h4></div></div></a>');
				}

			}
		});
	}

	function jmlNotif() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('email') ?>'
			},
			url: '<?= base_url()?>akun/jumlahnotif',
			success: function (rs) {
				if (rs == '0') {
					$('#jumlnotif').removeClass('label');
					$("#jumlnotif").html('');
					$("#notif2").html('');
				} else {
					$("#jumlnotif").html(rs);
					$("#notif2").html(rs);
				}
			}
		});
	}
	</script>
	<script>
	// TO MAKE THE MAP APPEAR YOU MUST
	// ADD YOUR ACCESS TOKEN FROM
	// https://account.mapbox.com
	mapboxgl.accessToken = 'pk.eyJ1Ijoib2JheWltYW5uaSIsImEiOiJja21hYjJ3dXMxcHZrMnBvajVxYm0yMjkwIn0.FLRtmHNWJu5BVEvbqrGcjg';
	var map = new mapboxgl.Map({
		container: 'map', // container ID
		style: 'mapbox://styles/mapbox/streets-v11', // style URL
		center: [110.37003766882715, -7.795934747465391], // starting position [lng, lat]
		zoom: 11 // starting zoom
	});
	// Set options
	<?php 
	if(!empty($aksipl)) {
		foreach ($aksipl as $apl){ ?>
	var marker = new mapboxgl.Marker({
			color: "#7c807d",
			draggable: false
		}).setLngLat([<?= $apl->lng ?>, <?= $apl->lat ?>])
		.setPopup(new mapboxgl.Popup().setHTML("<h4><?= $apl->tipe_menara ?></h4> <p>Lat : <?= $apl->lat ?><br>Long : <?= $apl->lng ?></p>"))
		.addTo(map);
	<?php
 		}
	 } ?>
	</script>
	<script language ="javascript" type ="text/javascript">
		$('input.example').on('change', function() {
			$('input.example').not(this).prop('checked', false);
		});
		$('input.example1').on('change', function() {
			$('input.example1').not(this).prop('checked', false);
		});
		$('input.example2').on('change', function() {
			$('input.example2').not(this).prop('checked', false);
		});
		$('input.example3').on('change', function() {
			$('input.example3').not(this).prop('checked', false);
		});
	</script>
	<script>
		// Add the following code if you want the name of the file appear on select
		$(".custom-file-input").on("change", function () {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
</script>
</div>
</body>
</html>