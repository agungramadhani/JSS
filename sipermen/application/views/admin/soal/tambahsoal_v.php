<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">


		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Navigation</a></li>
				<li class="breadcrumb-item active">Manajemen</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Manajemen <small></small></h1>

			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body container">
					<h5 class="card-title">Tambah Soal</h5>
					<form action="<?= base_url('auth/tambahSoal')?>" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<?= $this->session->flashdata('soal') ?>
							<label for="exampleInputEmail1">Soal</label>
							<input type="text" class="form-control" name="soal" id="exampleInputEmail1"
								aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Tipe Soal</label>
							<select id="soaltipe" name="tipe_soal" class="custom-select">
								<option selected>-</option>
								<option value="0">Tidak perlu upload File</option>
								<option value="1">Perlu Upload 1 File</option>
								<option value="2">Perlu Upload 2 File</option>
							</select>
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
								else.</small>
						</div>
						<div id="soal1" class="form-group">
							<label for="exampleInputEmail1">Contoh :</label>
							<br>
							<input type="file" name="contoh[]" accept="application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsm" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="Enter email">
						</div>
						<div id="soal2" class="form-group">
							<label for="exampleInputEmail1">Contoh :</label>
							<br>
							<input type="file" name="contoh[]" accept="application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsm" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="Enter email">
							<input type="file" name="contoh[]" accept="application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,.xlsm" id="exampleInputEmail1" aria-describedby="emailHelp"
								placeholder="Enter email">
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<?php
    	$this->load->view('admin/addons/sidebar');
    	?>
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
			data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
