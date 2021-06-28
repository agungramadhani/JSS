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
            	<!-- begin col-6 -->
                <div class="row">
					<div class="col-xl-12">
					<!-- begin panel -->
						<div class="panel panel-inverse" data-sortable-id="form-dropzone-1">
							<div class="panel-heading">
								<h4 class="panel-title">Dropzone</h4>
									<div class="panel-heading-btn">
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
										<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
									</div>
							</div>
							<div class="panel-body text-center container">
							<small class="form-text text-muted">Pengajuan akun anda ditolak, disebabkan oleh : 	
                             			<h4><?= nl2br($pesantolak);?></h4></small>
								<div class="row">
								<?= $this->session->flashdata('pesan') ?>
									<form  method="post"  enctype="multipart/form-data" class="col-xl-12">
									
										<div class="custom-file">
											<input type="file" name="skulang" class="custom-file-input" id="pj">
											<label class="custom-file-label" for="customFile">Choose file</label>
										</div>
										<!-- <button type="submit" class="btn btn-info">Button</button> -->
										<input type="text" id="email" name="email" hidden value="<?= $this->session->userdata('email')?>">
									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
		<?php $this->load->view('admin/addons/sidebar'); ?>
	</div>
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
