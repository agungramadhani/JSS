<div id="page-loader" class="fade show">
	<span class="spinner"></span>
</div>
<!-- end #page-loader -->

<!-- begin #page-container -->
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">


	<!-- begin #content -->
	<div id="content" class="content">
		<h1 class="page-header">Akun<small></small></h1>
		<!-- begin breadcrumb -->
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="javascript:;">Navigation</a></li>
			<li class="breadcrumb-item active">Akun</li>
		</ol>
		<div class="card col-12">
			<div class="card-body">
				<div style="border:none;" class="card-header text-center">
					<h5>Pengajuan Menara</h5>
				</div>
				<ul class="list-group list-group-flush">
					<form action="<?= base_url('auth/inputform');?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user')?>">

						<?php 
							$no = 1;
							?>
						<div class="row">
							<span style="margin-top:10px"> No Surat : </span>
							<input type="text" style="margin:10px 10px;padding:5px 20px;" class="col-xl-3 col-md-12 "
								name="no_surat">
							<span style="margin-top:10px"> Tanggal Surat : </span>
							<input type="date" style="border: 1px solid #ddd;margin:10px 10px;padding:5px 20px;"
								class="col-xl-3 col-md-12" name="tgl_surat">
						</div>
						<?php
							foreach ($listsoal->result() as $s)
							{
								echo'
								<li class="list-group-item">
								<p style="font-size:20px">'.$s->nama_soal.'</p>';
									$this->db->select('tb_file.id_file,tb_file.nama_file,')->from('tb_file')->where('id_soal',$s->id_soal)->where('is_contoh', 1);
									$query = $this->db->get();
									$file = $query->row_array();
									if($query->num_rows() > 0){
										echo '<p>Silahkan Download Contoh';
									
										foreach ($query->result() as $f)
										{
											echo' <a href="'.base_url().'upload/contoh_soal/'.$f->nama_file.'" target="_blank">Disini</a>';
										}
									}
									echo '<div class="row">';
									if($s->jenis == 1){
										echo '<input type="file" class="col-xl-3 col-sm-6" id="exampleFormControlFile1" name="upload[]" accept="application/pdf,.xlsx">
											  <input type="hidden" name="idsoal[]" value="'.$s->id_soal.'">';
									}elseif($s->jenis == 2){
										echo '<input type="file" class="col-xl-3 col-sm-6" id="exampleFormControlFile1" name="upload[]" accept="application/pdf,.xlsx">
										<input type="hidden" name="idsoal[]" value="'.$s->id_soal.'">';
										echo '<input type="file" class="col-xl-3 col-sm-6" id="exampleFormControlFile1" name="upload[]" accept="application/pdf,.xlsx">
										<input type="hidden" name="idsoal[]" value="'.$s->id_soal.'">';
									}
								echo '
								</div>
								</p>
								</li>';
								$no++;
							}
							?>
						<button id="submit" type="submit" value="submit" class="btn btn-primary">Submit</button>
					</form>
				</ul>
			</div>
		</div>
	</div>
	<?php $this->load->view('admin/addons/sidebar') ?>
</div>

<script src="<?= base_url(); ?>/assets/js/app.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/theme/default.min.js"></script>
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
