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
								<img src="<?= base_url(); ?>assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b><?php
								$nama_depan = $this->session->userdata('nama_depan');
								$nama_belakang = $this->session->userdata('nama_belakang');
								echo $nama_depan.' '.$nama_belakang; ?>
								<small><?php
								if($this->session->userdata('level') == '1'){
									echo 'Superadmin';
								}elseif($this->session->userdata('level') == '2'){
									echo 'Admin';
								}elseif($this->session->userdata('level') == '3'){
									echo 'Perusahaan';
								}elseif($this->session->userdata('level') == '4'){
									echo 'Mitra';
								}
								?></small>
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
				<li class="has-sub <?php if ($_SERVER['REQUEST_URI'] == '/ci3/home/dashboard'){ echo 'active';}else { echo ''; } ?>">
						<a href="<?= base_url(); ?>home/dashboard">
							<b class=""></b>
							<i class="fas fa-home fa-fw"></i>
							<span>Home</span>
						</a>
				</li>
				<?php
				$this->db->select('id_user,is_verif')
				->where('email', $this->session->userdata('email'));
				$data = $this->db->get('user')->row_array();
				if($data['is_verif'] == '1'){
					if($this->session->userdata('level') == '4' || $this->session->userdata('level') == '3' ){ ?>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-user"></i>
							<span>Perusahaan</span>
                        </a>
                        <ul class="sub-menu">
							<li class="has-sub"><a href="javascript:;"><?= $this->session->userdata('nama_perusahaan') ?></a>
								<ul class="sub-menu">
									<li class="active"><a href="<?= base_url()?>home/riwayatmenara">Riwayat Menara</a></li>
									<li class="active"><a href="akun/akun.php">Riwayat Fiber Optic</a></li>
									<li class="active"><a href="akun/akun.php">Riwayat Pengauan</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-sub <?php if ($_SERVER['REQUEST_URI'] == '/ci3/home/datarekap'){ echo 'active';}else { echo ''; } ?>">
						<a href="data_rekap.php">
							<b class=""></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-file"></i>
							<span>Data Rekap</span>
						</a>
						</li>
                     <?php

					}elseif($this->session->userdata('level') == '2' || $this->session->userdata('level') == '1'){
				?>
					<li class="has-sub <?php if (strpos($_SERVER['REQUEST_URI'], "akun") !== false){ echo 'active';}else { echo ''; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-user"></i>
							<span>Akun</span>
                        </a>
                        <ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class="has-sub <?php if (strpos($_SERVER['REQUEST_URI'], "akunbaru") !== false || strpos($_SERVER['REQUEST_URI'], "ditolak") !== false  ){ echo 'active';}else { echo ''; } ?>"><a href="javascript:;">Akun<b class="caret"></b></a>
							<ul class="sub-menu">
								<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "akunbaru") !== false){ echo 'active';}else { echo ''; } ?>"><a href="<?= base_url() ?>home/akun/akunbaru">Akun Baru</a></li>
								<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "ditolak") !== false){ echo 'active';}else { echo ''; } ?>"><a href="<?= base_url() ?>home/akun/ditolak">Akun Ditolak</a></li>
							</ul>
							</li>
							<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "pengajuanulang") !== false){ echo 'active';}else { echo '';} ?>"><a href="<?= base_url() ?>home/akun/pengajuanulang">Pengajuan Ulang</a></li>
							<li class=""><a href="#">Perusahaan Baru</a></li>
							<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "akunaktif") !== false){ echo 'active';}else { echo ''; } ?>"><a href="<?= base_url() ?>home/akun/akunaktif">Akun Aktif</a></li>

						</ul>
						</li>
						
                        <li class="has-sub <?php if (strpos($_SERVER['REQUEST_URI'], "aksiverif") !== false || strpos($_SERVER['REQUEST_URI'], "pengajuantempat") !== false  ){ echo 'active';}else { echo ''; } ?> ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fas fa-broadcast-tower"></i>
							<span>Menara</span>
                        </a>

                        <ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "aksiverif") !== false ){ echo 'active';}else { echo ''; } ?>"><a href="<?= base_url(); ?>home/verifberkas">Verifikasi Berkas</a></li>
							<li class=""><a href="<?= base_url() ?>home/pengajuanberkas">Pengajuan Tempat</a></li>
							<li class=""><a href="<?= base_url() ?>home/prosessurvey">Proses Survey</a></li>
							<li class=""><a href="<?= base_url() ?>home/prosesrekom">Proses Rekom</a></li>
							<li class=""><a href="">Cetak Rekom</a></li>
						</ul>
						</li>
                        <li class="has-sub <?php if ($_SERVER['REQUEST_URI'] == '/ci3/home/fiberoptik'){ echo 'active';}else { echo ''; } ?>">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-wave-square fa-w-20"></i>
							<span>Fiber Optik</span>
                        </a>

						<ul class="sub-menu">
							<!--<li class="active"><a href="pengajuan.php">Pengajuan</a></li> -->
							<li class=""><a href="akun.php">Verifikasi Berkas</a></li>
							<li class=""><a href="menara.php">Pengajuan Tempat</a></li>
							<li class=""><a href="fiber_optik.php">Proses Survey</a></li>
							<li class=""><a href="fiber_optik.php">Proses Rekom</a></li>
							<li class=""><a href="fiber_optik.php">Cetak Rekom</a></li>
						</ul>
						</li>
						<li class="has-sub <?php if (strpos($_SERVER['REQUEST_URI'], "manajemen") !== false){ echo 'active';}else { echo ''; } ?>">
						<a href="<?= base_url(); ?>home/manajemen">
							<b class=""></b>
							<i class="fas fa-cog"></i>
							<span>Manajemen</span>
						</a>
						</li>
						<li class="has-sub <?php if ($_SERVER['REQUEST_URI'] == '/ci3/home/datarekap'){ echo 'active';}else { echo ''; } ?>">
						<a href="data_rekap.php">
							<b class=""></b>
							<i class="fas fa-lg fa-fw m-r-10 fa-file"></i>
							<span>Data Rekap</span>
						</a>
						</li>
						<?php  }}
						elseif($data['is_verif'] == "2" ){ ?>
							<li class="has-sub <?php if (strpos($_SERVER['REQUEST_URI'], "pengajuanulang") !== false){ echo 'active';}else { echo ''; } ?>">
						<a href="<?= base_url(); ?>home/pengajuanulang">
							<b class=""></b>
							<i class="fa fa-th-large"></i>
							<span>Pengajuan Ulang</span>
							<?php } ?>
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
