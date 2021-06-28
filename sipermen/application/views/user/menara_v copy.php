<div id="page-loader" class="fade show">
	<span class="spinner"></span>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">


	<!-- begin #content -->
	<div id="content" class="content">
		<h1 class="page-header">Menara <small></small></h1>
		<!-- begin breadcrumb -->
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="javascript:;">Navigation</a></li>
			<li class="breadcrumb-item active">Menara</li>
		</ol>
		<?php if($jmlmenara > 0){ ?>
		<div id="signup" class="col-12" action="somewhere" method="POST">
			<ul id="section-tabs">
				<li id="tabs1" class="tabs current active"><span>1.</span> Pemeriksaan Berkas</li>
				<li id="tabs2" class="tabs active"><span>2.</span> Pengajuan Tempat</li>
				<li id="tabs3" class="tabs active"><span>3.</span> Hasil Survey </li>
				<li id="tabs4" class="tabs active"><span>4.</span> Proses Rekom</li>
				<li id="tabs5" class="tabs active"><span>5.</span> Cetak Rekom</li>
			</ul>
			<div id="fieldsets">
			<a style="margin-left:20px;" href="<?= base_url(); ?>home/tambahmenara" class="btn btn-primary">Tambah Menara</a>
				<fieldset class="col-12 current">
					<?= $this->session->flashdata('form')?>
					<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Tanggal Pengajuan</th>
								<th scope="col">Nomor Surat</th>
								<th scope="col">Tanggal Surat</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($menara as $m){
						?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $m->tgl_pengajuan ?></td>
								<td><?= $m->no_surat ?></td>
								<td><?= $m->tgl_surat ?></td>
								<td><?= $m->status_form ?></td>
							</tr>
						<?php 
						$no++;
						} 
						?>
						</tbody>
					</table>
					</div>
				</fieldset>
				<fieldset class="next">
					<label for="username">Username:</label>
					<input name="username" type="text">
					<label for="bio">Short Bio:</label>
					<textarea name="bio" class="required"></textarea>
				</fieldset>
				<fieldset class="next">
					<label for="interests">Basic Interests:</label>
					<textarea name="bio"></textarea>
					<p>Receive newsletter?<br>
						<input type="radio" name="newsletter" value="yes"><label for="newsletter">yes</label>
						<input type="radio" name="newsletter" value="no"><label for="newsletter">no</label>
					</p>
				</fieldset>
				<fieldset class="next">
					<label for="referrer">Referred by:</label>
					<input type="text" name="referrer">
					<label for="phone">Daytime Phone:</label>
					<input type="tel" name="phone">
				</fieldset>
				<!-- <a class="btns" id="next">Next Section ▷</a> -->
				<input type="submit" class="btn">
			</div>
		</div>
		<?php }else{?>
		<div class="card col-12" style="background-color:#e6e6e6;">
			<div class="card-body">
				<a href="<?= base_url(); ?>home/tambahmenara" class="btn btn-primary">Tambah Menara</a>
				<div class="card col-12" style="background-color:#e6e6e6;margin-top:10px;border:none">
					<div class="card-body">
						Anda belum mengajukan menara silahkan mengajukan terlebih dahulu
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
</div>
<script src="<?= base_url(); ?>/assets/js/app.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/theme/default.min.js"></script>
<script src="<?= base_url(); ?>assets/script.js"></script>
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
<script src="https://cdn.rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/dashboard.js"></script>
<script>
	var handleDashboardGritterNotification = function () {
		$(window).on('load', function () {
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
		setInterval(function () {
			notiftolak();
			jmlNotif();
			cekTolak();
			userOnline();
		}, 500);
	});

	function notiftolak() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('
				email ') ?>'
			},
			url: '<?= base_url()?>akun/notifTolak',
			success: function (rs) {
				$("#notif").html(rs);
			}
		});
	}

	function clickNotif() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('
				email ') ?>'
			},
			url: '<?= base_url()?>akun/kliknotif',
			success: function (rs) {

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
				'email': '<?= $this->session->userdata('
				email ') ?>'
			},
			url: '<?= base_url()?>akun/cektolak',
			success: function (rs) {
				if (rs == '3') {
					$("#ditolaks").html(
						'<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-red"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun Anda Ditolak</b></h4></div></div></a>'
						);
					$('#sidebar').load(document.URL + ' #sidebar');
				} else if (rs == '0') {
					$("#ditolaks").html(
						'<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-orange"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun anda dalam proses verifikasi</b></h4></div></div></a>'
						);
				} else if (rs == '2') {
					$("#ditolaks").html(
						'<a href="#" class="widget-card widget-card-rounded  m-b-20" data-id="widget"><div class="widget-card-cover bg-orange"></div><div class="widget-card-content"><h4 class="m-b-10 text-white"><b>Akun anda dalam proses pengajuan ulang</b></h4></div></div></a>'
						);
				}

			}
		});
	}

	function jmlNotif() {
		$.ajax({
			type: 'POST',
			data: {
				'email': '<?= $this->session->userdata('
				email ') ?>'
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
	// Add the following code if you want the name of the file appear on select
	$(".custom-file-input").on("change", function () {
		var fileName = $(this).val().split("\\").pop();
		$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>
<!-- <script>
	  $(document).ready(function () {
    $('#hehe a').on('click', function () {
      var txt= ($(this).text());
	  $.ajax({
			type:'POST',
			data:{'filter':txt},
			url:'<?= base_url()?>home/akun',
			success:function(rs){
				console.log(rs);
				// $('#table').load(document.URL +  ' #table');
			}
		});
    });
  });
	</script> -->
<!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>