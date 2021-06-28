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
							
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="" id="lonceng" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span id="jumlnotif" class="label"></span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-right">
						<div class="dropdown-header">NOTIFICATIONS (<span id="notif2"></span>)</div>
						<div id="notif"></div>
					</div>
				</li>
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?= base_url(); ?>assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline"><?php
						$nama_depan = $this->session->userdata('nama_depan');
						$nama_belakang = $this->session->userdata('nama_belakang');
						echo $nama_depan.' '.$nama_belakang;
						?></span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url() ?>auth/logout" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header-nav -->
		</div>
		<!-- end #header -->