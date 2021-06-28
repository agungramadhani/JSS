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
				<li class="breadcrumb-item active">Verifikasi Berkas</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Verifikasi Berkas<small></small></h1>

			<div class="card text-center">
			
				<div class="card-header">
					<ul class="breadcrumb float-xl-right">
					</ul>
					<ul class="breadcrumb float-xl-left">
						<li class="nav-item">
						</li>
					</ul>
				</div>
				<div id="table" class="card-body">
					<h5 class="card-title"></h5>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama Perusahaan</th>
								<th scope="col">Nama Pengaju</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach ($veriflist as $vl){ ?>
							<tr>
							<td><?= $no ?></td>
							<td><?= $vl->nama_perusahaan ?></td>
							<td><?= $vl->nama_depan.' '.$vl->nama_belakang ?></td>
							<td><?= $vl->status_form ?></td>
							<td>
								<a href="<?= base_url()?>home/aksiverif/<?= $vl->id_form?>"><button
										class="btn btn-primary"><i class="fa fa-check-square"
											aria-hidden="true"></i></button></a>
								<button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
							</td>
							</tr>
							<?php } ?>
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