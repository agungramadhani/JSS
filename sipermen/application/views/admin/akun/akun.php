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
			<h1 class="page-header">Akun <small></small></h1>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<div class="card text-center">
				<div class="card-header">
					<ul class="breadcrumb float-xl-right">
						<li class="nav-item">
							<a class="nav-link active" href="">Data Akun</a>
						</li>
					</ul>
					<ul class="breadcrumb float-xl-left">
						<li class="nav-item">
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Fitler akun
								</button>
								<div id="hehe" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="?filter=google">Google</a>
									<a class="dropdown-item" href="?filter=common">Common</a>
									<a class="dropdown-item" href="?filter=semua">Semua Akun</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div id="table" class="card-body">
					<h5 class="card-title">Data Pengajuan Akun (<?= $filter ?>)</h5>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nama</th>
								<th scope="col">Alamat Email</th>
								<th scope="col">Nomor</th>
								<th scope="col">Nama Perusahaan</th>
								<th scope="col">Status Akun</th>
								<th scope="col">Tipe Akun</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<?php foreach($akuns as $a){
                      $no = 1;
                      ?>
						<tbody>
							<td><?= $no ?></td>
							<td><?= $a->nama_depan.'   '.$a->nama_belakang ?></td>
							<td><?= $a->email ?></td>
							<td><?= $a->no_hp ?></td>
							<td><?= $a->nama_perusahaan ?>(<?= $a->oauth_provider ?>)</td>
							<td><?php $this->db->select('id_user')
                          ->where('id_user', $a->id_user);
                          $data = $this->db->get('tb_pesan')->row_array();

                          $this->db->select('pesan')
                          ->where('id_user', $data['id_user']);
                          $pesan = $this->db->get('tb_pesan')->num_rows();
                          if($a->is_active == 0){
                            echo 'Belum Terverifikasi';
                          }elseif($a->is_active == 3){
                            echo 'Belum Pengajuan Ulang';
                          }else{
                            echo 'Sudah Verifikasi';
                          }
                          ?></td>
							<td><?php
                          if($a->level == 3){
                            echo 'Perusahaan';
                          }elseif($a->level == 4){
                            echo 'Mitra';
                          } ?></td>
							<td class="text-center">
								<?php
                             if($a->is_verif != 1){
                              echo '<a href="'.base_url().'akun/accverif/'.$a->id_user.'"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button></a>
                              <button type="button" data-toggle="modal" data-target="#rejek'.$a->id_user.'" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                              <a href="'.base_url().'upload/surat_kuasa/'.$a->dokumen.'" target="_blank"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button></a>';
                            }elseif($a->is_verif == 2){
                              echo '<a href="'.base_url().'akun/accverif/'.$a->id_user.'"><button type="button" class="btn btn-success btn-sm"><i class="fas fa-check"></i></button></a>
                              <button type="button" data-toggle="modal" data-target="#rejek'.$a->id_user.'" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                              <a href="'.base_url().'upload/pengajuan_ulang/'.$a->dokumen.'" target="_blank"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button></a>';
                            }else{
                              echo '<a href="'.base_url().'upload/surat_kuasa/'.$a->dokumen.'" target="_blank"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button></a>';
                            }
                            ?>
								<div class="modal fade" id="rejek<?= $a->id_user ?>" tabindex="-1" role="dialog"
									aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form action="<?= base_url(); ?>akun/rejekverif" method="post">
													<div class="form-group">
														<input type="hidden" class="form-control"
															value="<?= $a->id_user ?>" name="id_user"
															id="exampleInputEmail1" aria-describedby="emailHelp">
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">Password</label>
														<textarea class="form-control" id="exampleFormControlTextarea1"
															name="pesan" rows="3"></textarea>
													</div>
													<div class="form-group form-check">
														<input type="checkbox" class="form-check-input"
															id="exampleCheck1">
														<label class="form-check-label" for="exampleCheck1">Check me
															out</label>
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div>
									</div>
								</div>
						</tbody>

						<?php
                            $no++;
                            } ?>
					</table>
				</div>
			</div>
		</div>
		<?php $this->load->view('admin/addons/sidebar');?>
	</div>

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
			data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
