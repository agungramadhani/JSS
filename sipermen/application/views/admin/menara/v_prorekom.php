<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<script>
	</script>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">


		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Navigation</a></li>
				<li class="breadcrumb-item active">Proses Survey</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Proses Rekom<small></small></h1>

			<div class="card">
			
				<div class="card-header">
				<?= $this->session->flashdata('verifm') ?>
				</div>
				<div id="table" class="card-body">
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Form</th>
								<th scope="col">Nama Pengaju</th>
								<th scope="col">Nama Perusahaan</th>
								<th width="15%" scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach ($pengajuanlist as $pl){ ?>
							<tr>
							<td><?= $no ?></td>
							<td><?= $pl->id_form ?></td>
							<td><?= $pl->nama_depan.' '.$pl->nama_belakang ?></td>
							<td><?= $pl->nama_perusahaan ?></td>
							<td>
								<!-- <a href="https://maps.google.com/?q=<?= $pl->lat ?>,<?= $pl->lng ?>"><button data-toggle="tooltip" data-placement="top" title="Tampilkan Lokasi Menara"  class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i></button></a> -->
								<a href="<?= base_url() ?>home/printba/<?= $pl->id_form ?>"><button class="btn btn-primary"><i class="fas fa-broadcast-tower"></i></button></a>
								<!-- <a href="<?= base_url()?>auth/tolakpengajuan/<?= $pl->id_form ?>"><button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button> -->
							</td>
							</tr>
							<?php $no++; } ?>
							</tbody>
					</table>
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