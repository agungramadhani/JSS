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
				<li class="breadcrumb-item active">Akun</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Akun <small></small></h1>
			<div class="card">
				<div class="card-header text-center">
					<h5>Verifikasi Berkas</h5>
				</div>
				<div id="table" class="card-body">
					<div style="margin-bottom:50px" class="card">
						<div id="table" style="overflow-x:auto;" class="card-body">
							<table class="table">
								<thead class="thead-dark">
									<tr>
										<th width="3%" class="text-center">#</th>
										<th width="30%" class="text-center">Syarat</th>
										<th width="30%" class="text-center">Status File</th>
										<th width="5%" class="text-center">File</th>
									</tr>
								</thead>
								<tbody>
								<form action="<?= base_url()?>auth/aksiberkas" method="post">
									<?php 
							$no = 1;
							foreach ($veriflist as $vl){ ?>
									<tr>
										<td class="text-center"><?= $no ?></td>
										<td><?= $vl->nama_soal ?></td>
										<input type="hidden" name="kodef" value="<?= $vl->id_form ?>">
										<?php 
							if(!empty($vl->id_file)){
								$query = $this->db->get_where('tb_file', array('id_form' => $idform, 'id_soal' => $vl->id_soal)); 
								if($vl->jenis == "2"){
									if($query->num_rows() == "2"){
										echo'<td><center>
										<div class="form-check form-check-inline">
											<input class="form-check-input example" type="checkbox" name="ada[]" id="ck1" value="1" checked>
											<label class="form-check-label" for="ada[]">Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example" type="checkbox" name="ada[]" id="ck1" value="0">
											<label class="form-check-label" for="ada[]">Tidak Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example" type="checkbox" name="ada[]" id="ck1" value="2">
											<label class="form-check-label" for="ada[]">Tidak Sesuai</label>
										</div>
										<input class="form-check-input" name="soal[]" type="hidden" value="'.$vl->id_soal.'" id="defaultCheck1">
										</center>
										</td>';
									}else{
										echo'<td><center>
										<div class="form-check form-check-inline">
											<input class="form-check-input example1" type="checkbox" name="ada[]" id="ck2" value="1">
											<label class="form-check-label" for="ada[]">Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example1" type="checkbox" name="ada[]" id=" ck2" value="0">
											<label class="form-check-label" for="ada[]">Tidak Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example1" type="checkbox" name="ada[]" id="ck2" value="2">
											<label class="form-check-label" for="ada[]">Tidak Sesuai</label>
										</div>
										<input class="form-check-input" name="soal[]" type="hidden" value="'.$vl->id_soal.'" id="defaultCheck1">
										</center>
										</td>';
									}
								}elseif($vl->jenis == "1"){
									if($query->num_rows() == "1"){
										echo'<td><center>
										<div class="form-check form-check-inline">
											<input class="form-check-input example2" type="checkbox" name="ada[]" id="ck1" value="1" checked>
											<label class="form-check-label" for="ada[]">Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example2" type="checkbox" name="ada[]" id="ck1" value="0">
											<label class="form-check-label" for="ada[]">Tidak Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example2" type="checkbox" name="ada[]" id="ck1" value="2">
											<label class="form-check-label" for="ada[]">Tidak Sesuai</label>
										</div>
										<input class="form-check-input" name="param[]" type="hidden" value="0" id="defaultCheck1">
										<input class="form-check-input" name="soal[]" type="hidden" value="'.$vl->id_soal.'" id="defaultCheck1">
										</center>
										</td>
										</center></td>';
									}else{
										echo'<td><center>
										<div class="form-check form-check-inline">
											<input class="form-check-input example3" type="checkbox" name="ada[]" id="ck1" value="1" >
											<label class="form-check-label" for="ada[]">Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example3" type="checkbox" name="ada[]" id="ck1" value="0">
											<label class="form-check-label" for="ada[]">Tidak Ada</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input example3" type="checkbox" name="ada[]" id="ck1" value="2">
											<label class="form-check-label" for="ada[]">Tidak Sesuai</label>
										</div>
					
										<input class="form-check-input" name="soal[]" type="hidden" value="'.$vl->id_soal.'" id="defaultCheck1">
										</center>
										</td>';
									}
								}	
								?>
										<?php }else{
								echo '<td class="text-center" style="font-size:0.75rem;color:grey"> Tidak ada file </td>';
									} ?>
										<td class="text-center">
											<a target="_blank" onclick="open2tab()"><button
													type="button" class="btn btn-primary"><i class="fas fa-search"></i></button></a>
											<script>
												function open2tab() {
													<?php foreach($query-> result() as $fils) {
														echo 'window.open("'.base_url().'upload/upload_soal/'.$fils->nama_file.'");';
													} ?>
												}
											</script>
										</td>
									</tr>
									<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Submit</button>
				</form>
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
