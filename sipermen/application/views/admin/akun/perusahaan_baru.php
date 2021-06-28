<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>SIPERMEN</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../../assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="../../assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
	<link href="../../assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="../../assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand"><span class="navbar-logo"></span> <b>SIPERMEN</b></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header --><!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Cari" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-right">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted f-s-10">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="../../assets/img/user/user-1.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">John Smith</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted f-s-10">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="../../assets/img/user/user-2.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Olivia</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted f-s-10">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-plus media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New User Registered</h6>
								<div class="text-muted f-s-10">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-envelope media-object bg-silver-darker"></i>
								<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New Email From John</h6>
								<div class="text-muted f-s-10">2 hour ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</div>
					</div>
				</li>
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="../../assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="javascript:;" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header-nav -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="../../assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>Birril
								<small>Admin</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav"><li class="nav-header">Navigation</li>
				<li class="has-sub active">
						<a href="index.php">
							<b class=""></b>
							<i class="fa fa-th-large"></i>
							<span>Home</span>
</a>
						</a>
					<li class="has-sub active">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>Akun</span>
                        </a>
                        <ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class="active"><a href="akun.php">Akun Baru</a></li>
							<li class="active"><a href="menunggu_verifikasi.php">Menunggu Verifikasi</a></li>
							<li class="active"><a href="perusahaan_baru.php">Perusahaan Baru</a></li>
							<li class="active"><a href="akun_aktiv.php">Akun Aktiv</a></li>
							
						</ul>
                        <li class="has-sub active">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>Menara</span>
                        </a>
                        <ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class="active"><a href="">Verifikasi Berkas</a></li>
							<li class="active"><a href="">Pengajuan Tempat</a></li>
							<li class="active"><a href="">Proses Survey</a></li>
							<li class="active"><a href="">Proses Rekom</a></li>
							<li class="active"><a href="">Cetak Rekom</a></li>
							
							
						</ul>
                        <li class="has-sub active">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-th-large"></i>
							<span>Fiber Optik</span>
                        </a>
						<ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class="active"><a href="akun.php">Verifikasi Berkas</a></li>
							<li class="active"><a href="menara.php">Pengajuan Tempat</a></li>
							<li class="active"><a href="fiber_optik.php">Proses Survey</a></li>
							<li class="active"><a href="fiber_optik.php">Proses Rekom</a></li>
							<li class="active"><a href="fiber_optik.php">Cetak Rekom</a></li>
						</ul>
						<li class="has-sub active">
						<a href="data_rekap.php">
							<b class=""></b>
							<i class="fa fa-th-large"></i>
							<span>Data Rekap</span>
</a>
					
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
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

            <div class="card text-center">
                <div class="card-header">
                    <ul class="breadcrumb float-xl-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Data Akun</a>
                    </li>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mitra Baru yang belum terverivikasi</h5>
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
  <tbody>
   
  </tbody>
</table>
            <!--<a href="#" class="btn btn-primary"></a> -->
                </div>
                </div>
			</div>
					<!-- begin panel -->
				
					<!-- end panel -->
					
					<!-- begin tabs -->
					
						<div class="tab-pane fade" id="purchase">
							<div class="height-sm" data-scrollbar="true">
								<table class="table">
									<thead>
										<tr>
											<th>Date</th>
											<th class="hidden-sm text-center">Product</th>
											<th></th>
											<th>Amount</th>
											<th>User</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="f-w-600 text-muted">13/02/2013</td>
											<td class="hidden-sm text-center">
												<a href="javascript:;">
													<img src="../../assets/img/product/product-1.png" alt="" width="32px"  />
												</a>
											</td>
											<td class="text-nowrap">
												<h6><a href="javascript:;" class="text-inverse">Nunc eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a></h6>
											</td>
											<td class="text-blue f-w-600">$349.00</td>
											<td class="text-nowrap"><a href="javascript:;" class="text-inverse">Derick Wong</a></td>
										</tr>
										<tr>
											<td class="f-w-600 text-muted">13/02/2013</td>
											<td class="hidden-sm text-center">
												<a href="javascript:;">
													<img src="../../assets/img/product/product-2.png" alt="" width="32px" />
												</a>
											</td>
											<td class="text-nowrap">
												<h6><a href="javascript:;" class="text-inverse">Nunc eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a></h6>
											</td>
											<td class="text-blue f-w-600">$399.00</td>
											<td class="text-nowrap"><a href="javascript:;" class="text-inverse">Derick Wong</a></td>
										</tr>
										<tr>
											<td class="f-w-600 text-muted">13/02/2013</td>
											<td class="hidden-sm text-center">
												<a href="javascript:;">
													<img src="../../assets/img/product/product-3.png" alt="" width="32px" />
												</a>
											</td>
											<td class="text-nowrap">
												<h6><a href="javascript:;" class="text-inverse">Nunc eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a></h6>
											</td>
											<td class="text-blue f-w-600">$499.00</td>
											<td class="text-nowrap"><a href="javascript:;" class="text-inverse">Derick Wong</a></td>
										</tr>
										<tr>
											<td class="f-w-600 text-muted">13/02/2013</td>
											<td class="hidden-sm text-center">
												<a href="javascript:;">
													<img src="../../assets/img/product/product-4.png" alt="" width="32px" />
												</a>
											</td>
											<td class="text-nowrap">
												<h6><a href="javascript:;" class="text-inverse">Nunc eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a></h6>
											</td>
											<td class="text-blue f-w-600">$230.00</td>
											<td class="text-nowrap"><a href="javascript:;" class="text-inverse">Derick Wong</a></td>
										</tr>
										<tr>
											<td class="f-w-600 text-muted">13/02/2013</td>
											<td class="hidden-sm text-center">
												<a href="javascript:;">
													<img src="../../assets/img/product/product-5.png" alt="" width="32px" />
												</a>
											</td>
											<td class="text-nowrap">
												<h6><a href="javascript:;" class="text-inverse">Nunc eleifend lorem eu velit eleifend, <br />eget faucibus nibh placerat.</a></h6>
											</td>
											<td class="text-blue f-w-600">$500.00</td>
											<td class="text-nowrap"><a href="javascript:;" class="text-inverse">Derick Wong</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="email">
							<div class="height-sm" data-scrollbar="true">
								<ul class="media-list media-list-with-divider">
									<li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="../../assets/img/user/user-1.jpg" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<a href="javascript:;" class="text-inverse"><h5 class="media-heading">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h5></a>
											<p class="m-b-5">
												Aenean mollis arcu sed turpis accumsan dignissim. Etiam vel tortor at risus tristique convallis. Donec adipiscing euismod arcu id euismod. Suspendisse potenti. Aliquam lacinia sapien ac urna placerat, eu interdum mauris viverra.
											</p>
											<span class="text-muted f-s-11 f-w-600">Received on 04/16/2013, 12.39pm</span>
										</div>
									</li>
									<li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="../../assets/img/user/user-2.jpg" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<a href="javascript:;" class="text-inverse"><h5 class="media-heading">Praesent et sem porta leo tempus tincidunt eleifend et arcu.</h5></a>
											<p class="m-b-5">
												Proin adipiscing dui nulla. Duis pharetra vel sem ac adipiscing. Vestibulum ut porta leo. Pellentesque orci neque, tempor ornare purus nec, fringilla venenatis elit. Duis at est non nisl dapibus lacinia.
											</p>
											<span class="text-muted f-s-11 f-w-600">Received on 04/16/2013, 12.39pm</span>
										</div>
									</li>
									<li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="../../assets/img/user/user-3.jpg" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<a href="javascript:;" class="text-inverse"><h5 class="media-heading">Ut mi eros, varius nec mi vel, consectetur convallis diam.</h5></a>
											<p class="m-b-5">
												Ut mi eros, varius nec mi vel, consectetur convallis diam. Nullam eget hendrerit eros. Duis lacinia condimentum justo at ultrices. Phasellus sapien arcu, fringilla eu pulvinar id, mattis quis mauris.
											</p>
											<span class="text-muted f-s-11 f-w-600">Received on 04/16/2013, 12.39pm</span>
										</div>
									</li>
									<li class="media media-sm">
										<a href="javascript:;" class="pull-left">
											<img src="../../assets/img/user/user-4.jpg" alt="" class="media-object rounded-corner" />
										</a>
										<div class="media-body">
											<a href="javascript:;" class="text-inverse"><h5 class="media-heading">Aliquam nec dolor vel nisl dictum ullamcorper.</h5></a>
											<p class="m-b-5">
												Aliquam nec dolor vel nisl dictum ullamcorper. Duis vel magna enim. Aenean volutpat a dui vitae pulvinar. Nullam ligula mauris, dictum eu ullamcorper quis, lacinia nec mauris.
											</p>
											<span class="text-muted f-s-11 f-w-600">Received on 04/16/2013, 12.39pm</span>
										</div>
							
					<!-- end tabs -->
					
					<!-- begin panel -->
					
					
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="../../assets/js/app.min.js"></script>
	<script src="../../assets/js/theme/default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="../../assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.colorhelpers.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.saturated.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.browser.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.time.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.resize.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.pie.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.categories.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.navigate.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.hover.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.touch.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.selection.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.symbol.js"></script>
	<script src="../../assets/plugins/flot/source/jquery.flot.legend.js"></script>
	<script src="../../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap.min.js"></script>
	<script src="../../assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js"></script>
	<script src="../../assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="../../assets/js/demo/dashboard.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>