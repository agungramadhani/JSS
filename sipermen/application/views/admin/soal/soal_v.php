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

			<div class="card text-center">
				<div class="card-header">
					<ul class="breadcrumb float-xl-left">
						<li class="nav-item">
							<a href="<?= base_url(); ?>home/tambahsoal"><button class="btn btn-md btn-secondary"> Tambah Soal
								</button></a>
						</li>
					</ul>
				</div>
				<div class="card-body">
					<h5 class="card-title">Manajemen Persyaratan</h5>
					<table class="table">

						<thead class="thead-dark">
							<tr>
								<th class="text-center" scope="col">#</th>
								<th class="text-center" scope="col">Soal</th>
								<th class="text-center" scope="col">Jenis</th>
								<th class="text-center" scope="col">File Contoh</th>
							</tr>
						</thead>
						<?php foreach($soal as $a){
                      $nomor = $a->id_soal;
                      $var = ltrim($nomor, 'SOL');
                      $no = ltrim($var, '0');
                  ?>
						</tbody>
						<td class="text-center" width="5%"><?= $no?></td>
						<td class="text-center" width="50%"><?= $a->nama_soal?></td>
						<td class="text-center" width="20%"><?= $a->jenis ?></td>
						<?php 
              if($a->nama_file == null){
                echo '<td class="text-center" width="70%">tidak ada file contoh</td>';
              }else{
                echo '<td class="text-center" width="70%">'.$a->nama_file.'</td>';
              }
              
          } ?>
					</table>
				</div>
			</div>
		</div>
    <?php
    $this->load->view('admin/addons/sidebar');
    ?>
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i
				class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
