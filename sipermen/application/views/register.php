<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Register Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?= base_url('assets/css/default/app.min.css');?>" rel="stylesheet" />
	<style>
	.form_error span {
	width: 80%;
	height: 35px;
	font-size: 1.1em;
	color: #D83D5A;
	}
	.form_error input {
	border: 1px solid #D83D5A;
	margin-bottom:10px
	}

	/*Styling in case no errors on form*/
	.form_success span {
	width: 80%;
	height: 35px;
	font-size: 1.1em;
	color: green;
	}
	.form_success input {
	border: 1px solid green;
	margin-bottom:10px
	}
	#error_msg {
	color: red;
	text-align: center;
	margin: 10px auto;
	}
	</style>
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
		<!-- begin register -->
		<div class="register register-with-news-feed">
			<!-- begin news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url(<?= base_url(); ?>/assets/img/login-bg/login-bg-15.jpg)"></div>
				<div class="news-caption">
					<h4 class="caption-title"><b>Color</b> Admin App</h4>
					<p>
						As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
					</p>
				</div>
			</div>
			<!-- end news-feed -->
			<!-- begin right-content -->
			<div class="right-content">
				<!-- begin register-header -->
				<h1 class="register-header">
					Sign Up
					<small>Create your Color Admin Account. It’s free and always will be.</small>
				</h1>
				<!-- end register-header -->
				<!-- begin register-content -->
				<div class="register-content">
					<?php
					if(isset($_GET['email'])){ 
						$emails = substr($_GET['email'], 0, strpos($_GET['email'], '@'));
						?>
						<form action="<?= base_url()?>auth/registration/<?= $emails ?>" method="POST">
						<?php echo $this->session->userdata('message') ?>
						<label class="control-label">Perusahaan/Mitra <span class="text-danger">*</span></label>
									<div class="row m-b-15" >
										<div class="col-md-12">
											<select id="list" name="level" class="form-control" required>
												<option selected>-</option>
												<option value="3">Perusahaan</option>
												<option value="4">Mitra</option>
											</select>
										</div>
									</div>
								<div id="mitra">
								<label class="control-label">Nama Mitra <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-15" >
										<div class="col-md-12">
											<input type="text" id="nama_mitra" class="form-control" placeholder="Nama Mitra" name="nama_mitra" required />
										</div>
									</div>
								<label class="control-label">Alamat Mitra <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-20 p-b-30" >
										<div class="col-md-12">
											<input type="text" id="alamat_mitra" class="form-control" placeholder="Alamat Mitra" name="alamat_mitra" required />
										</div>
									</div>
								</div>
								<div id="perusahaan">
								<label class="control-label">Nama Perusahaan <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-15" >
										<div class="col-md-12">
											<input type="text" id="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" required />
										</div>
									</div>
								<label class="control-label">Alamat Perusahaan <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-20 p-b-30" >
										<div class="col-md-12">
											<input type="text" id="alamat_perusahaan" class="form-control" placeholder="Alamat Mitra" name="alamat_perusahaan" required />
										</div>
									</div>
								</div>
								<label class="control-label">Surat Kuasa <span class="text-danger">*</span></label>
									<div class="row m-b-15 p-d-20" >
										<div class="col-md-12" style='input[type="file"] {display: none;}'>
											<input type="file" class="form-control-file" id="exampleFormControlFile1" name="sk">
										</div>
									</div>
								<div class="checkbox checkbox-css m-b-30">
									<input type="checkbox" id="agreement_checkbox" value="">
									<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
									</label>
								</div>
								<div class="register-buttons">
									<div class="row m-b-15">
											<button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
									</div>
								</div>
							</div>
							<div>
					<?php }else{ ?>
						<form action="<?= base_url('auth/registration')?>" method="POST" enctype="multipart/form-data" class="user">
							<div id="page1">
							<label class="control-label">Email <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<div><input type="text" id="email" class="form-control" placeholder="Email address" name="email" required />
									<span></span></div>
								</div>
							</div>
							<label class="control-label">Nama<span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-6">
									<input type="text" id="namadpn" class="form-control" placeholder="Nama Depan" name="nama_depan" required />
								</div>
								<div class="col-md-6">
									<input type="text" id="namablkng"  class="form-control" placeholder="Nama Belakang" name="nama_belakang" required />
								</div>
							</div>
							<!-- <label class="control-label">Nama Belakang <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" required />
								</div>
							</div> -->
							<label class="control-label">Username <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<input type="text" id="username" class="form-control" placeholder="Username" name="username" required />
								</div>
							</div>
							<label class="control-label">Password <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<input type="password" id="password1" class="form-control" placeholder="Password" name="password" required />
								</div>
							</div>
							<label class="control-label">Confirm Password <span class="text-danger">*</span></label>
							<div class="row m-b-15">
								<div class="col-md-12">
									<div><input type="password" id="password2" onChange="cekPw();" class="form-control" placeholder="Confirm Password" name="password" required />
									<span></span></div>
								</div>
							</div>
							<label class="control-label">No HP <span class="text-danger">*</span></label>
							<div id="ataserror" class="row m-b-20 p-b-30" >
								<div class="col-md-12">
									<input type="text" id="nohp" class="form-control" placeholder="No HP" name="no_hp" required />
								</div>
							</div>
							</div>
							</div>
							<span id="error"></span>
							<button type="button" id="next" class="btn btn-primary btn-block btn-lg">Next</button>
							<div id="page2">
							<label class="control-label">Perusahaan/Mitra <span class="text-danger">*</span></label>
									<div class="row m-b-15" >
										<div class="col-md-12">
											<select id="list" name="level" class="form-control" required>
												<option selected>-</option>
												<option value="3">Perusahaan</option>
												<option value="4">Mitra</option>
											</select>
										</div>
									</div>
								<div id="mitra">
								<label class="control-label">Nama Mitra <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-15" >
										<div class="col-md-12">
											<input type="text" id="nama_mitra" class="form-control" placeholder="Nama Mitra" name="nama_mitra" required />
										</div>
									</div>
								<label class="control-label">Alamat Mitra <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-20 p-b-30" >
										<div class="col-md-12">
											<input type="text" id="alamat_mitra" class="form-control" placeholder="Alamat Mitra" name="alamat_mitra" required />
										</div>
									</div>
								</div>
								<div id="perusahaan">
								<label class="control-label">Nama Perusahaan <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-15" >
										<div class="col-md-12">
											<input type="text" id="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" required />
										</div>
									</div>
								<label class="control-label">Alamat Perusahaan <span class="text-danger">*</span></label>
									<div id="ataserror" class="row m-b-20 p-b-30" >
										<div class="col-md-12">
											<input type="text" id="alamat_perusahaan" class="form-control" placeholder="Alamat Mitra" name="alamat_perusahaan" required />
										</div>
									</div>
								</div>
								<label class="control-label">Surat Kuasa <span class="text-danger">*</span></label>
									<div class="row m-b-15 p-d-20" >
										<div class="col-md-12" style='input[type="file"] {display: none;}'>
											<input type="file" class="form-control-file" id="exampleFormControlFile1" name="sk">
										</div>
									</div>
								<div class="checkbox checkbox-css m-b-30">
									<input type="checkbox" id="agreement_checkbox" value="">
									<label for="agreement_checkbox">
									By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
									</label>
								</div>
								<div class="register-buttons">
									<div class="row m-b-15">
										<div class="col-md-6">
											<button id="back" class="btn btn-primary btn-block btn-lg">back</button>
										</div>
										<div class="col-md-6">
											<button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
										</div>
									</div>
								</div>
							</div>
							<div>
								
							<div class="m-t-30 m-b-30 p-b-30">
								Already a member? Click <a href="<?= base_url() ?>home">here</a> to login.
							</div>
							<hr />
							<p class="text-center mb-0">
								&copy; Color Admin All Right Reserved 2020
							</p>
						</form>
					<?php } ?>
				</div>
				<!-- end register-content -->
			</div>
			<!-- end right-content -->
		</div>
		<!-- end register -->
		
		<!-- begin theme-panel -->
		
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url('assets/js/app.min.js');?>"></script>
	<script src="<?= base_url('assets/js/theme/default.min.js');?>"></script>
	<script>
	$(document).ready(function(){
		$("#page2").hide();
		$("#mitra").hide();
		$("#perusahaan").hide();
		$("#password1, #password2").keyup(cekPw);
		$('#email').on('blur', function(){
			var email = $('#email').val();
			if (email == '') {
				email_state = false;
				return;
			}
			$.ajax({
			url: '<?= base_url() ?>auth/cekemail',
			type: 'post',
			data: {
				'email_check' : 1,
				'email' : email,
			},
			success: function(response){
				if (response == 'taken' ) {
				email_state = false;
				$('#email').parent().removeClass();
				$('#email').parent().addClass("form_error");
				$('#email').siblings("span").text('Email already taken');
				}else if (response == 'not_taken') {
				email_state = true;
				$('#email').parent().removeClass();
				$('#email').parent().addClass("form_success");
				$('#email').siblings("span").text('Email available');
				}
			}
			});
		});
	$("#next").click(function(){
		
		var namadpn = $('#namadpn').val();
		var namablkng = $('#namablkng').val();
		var username = $('#username').val();
		var nohp = $('#nohp').val();
			if(email_state != true || pw_state != true || namadpn == '' || namablkng == '' || username == '' || nohp == '' ){
				$('#ataserror').removeClass('p-b-30');
				$('#error').html('<div class="alert alert-danger" role="alert">Harap Periksa Kembali</div>');
			}else{
				next();
			}
	});
	$("#back").click(function(){
		$("#page2").hide();
		$("#page1").show();
		$("#next").show();
	});
	function cekPw() {
    var pw1 = $("#password1").val();
    var pw2 = $("#password2").val();
	pw_state = false;
    if (pw1 != pw2){
		$('#password2').parent().removeClass();
		$('#password2').parent().addClass("form_error");
		$('#password2').siblings("span").text('Password Tidak sama');
		pw_state = false;
    }else{
		$('#password2').parent().removeClass();
		$('#password2').siblings("span").text('');
		pw_state = true;
	}
	}
	$("#list").change(function() {
		var select = $(this).val();
		if(select == 4){
			$("#perusahaan").hide();
			$('#nama_perusahaan').removeAttr('required');
			$('#alamat_perusahaan').removeAttr('required');
			$("#mitra").show();
		}else if(select == 3){
			$("#mitra").hide();
			$('#nama_mitra').removeAttr('required');
			$('#alamat_mitra').removeAttr('required');
			$("#perusahaan").show();
		}else{
			$("#mitra").hide();
			$("#perusahaan").hide();
		}
	});
	function next(){
		$("#page2").show();
		$("#page1").hide();
		$("#next").hide();
	}
	});
	</script>
	<!-- ================== END BASE JS ================== -->
</body>
</html>