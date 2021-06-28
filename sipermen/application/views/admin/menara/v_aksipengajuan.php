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
					<h5>Pengajuan Menara</h5>
				</div>
				<div id="table" class="card-body">
					<div style="margin-bottom:50px" class="card">
						<div id="table" class="card-body">
						<?= $this->session->flashdata('verifm')?>
							<table class="table">
								<thead class="thead-dark">
									<tr>
										<th width="3%" class="text-center">#</th>
										<th width="3%" class="text-center">Form</th>
										<th width="3%" class="text-center">Site ID</th>
										<th width="20%" class="text-center">Alamat</th>
                                        <th width="10%" class="text-center">Latitude</th>
                                        <th width="10%" class="text-center">Longtitude</th>
                                        <th width="10%" class="text-center">Tipe Menara</th>
                                        <th width="6%" class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
                                    <?php $no=1; foreach ($aksipl as $apl) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no ?></td>
                                            <td class="text-center"><?= $apl->id_form ?></td>
                                            <td class="text-center"><?= $apl->site_id ?></td>
                                            <td class="text-center"><?= $apl->alamat ?>, <?= $apl->kelurahan ?>, <?= $apl->kecamatan ?></td>
                                            <td class="text-center"><?= $apl->lat ?></td>
                                            <td class="text-center"><?= $apl->lng ?></td>
                                            <td class="text-center"><?= $apl->tipe_menara ?></td>
                                            <td class="text-center">
												<a href="<?= base_url() ?>auth/accpengajuan/<?= $apl->id_tempat ?>"><button class="btn btn-primary"><i class="fa fa-check-square" aria-hidden="true"></i></button></a>
												<button type="button" data-toggle="modal" data-target="#tolak<?= $apl->id_form ?>" class="btn btn-danger "><i class="fa fa-times" aria-hidden="true"></i></button>
											</td>
											<div class="modal fade" id="tolak<?= $apl->id_form ?>" tabindex="-1" role="dialog"
												aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Penolakan Menara</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="<?= base_url(); ?>auth/tolakpengajuan" method="post">
																<div class="form-group">
																	<input type="hiddem" class="form-control" value="<?= $apl->id_tempat ?>" name="id_tempat"
																		id="exampleInputEmail1" aria-describedby="emailHelp">
																</div>
																<div class="form-group">
																	<label for="exampleInputPassword1">Alasan</label>
																	<textarea class="form-control" id="exampleFormControlTextarea1" name="alasan"
																		rows="3"></textarea>
																</div>
																<button type="submit" class="btn btn-primary">Submit</button>
															</form>
														</div>
													</div>
												</div>
											</div>
                                        </tr>
                                    <?php $no++; } ?>
                                </tbody>
							</table>
						</div>
					</div>
					<div class="card text-center">
						<div class="card-header">
							<h5>Lokasi Menara</h5>
						</div>
						<div class="card-body" style="padding:150px 0">
							<div id='map' style='position: absolute; top: 57px; bottom: 0; width: 100%;'></div>
						</div>
					</div>
				</div>
			</div>
		</div>