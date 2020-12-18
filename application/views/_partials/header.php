<?php
if ($this->session->userdata('level') == null) {
	redirect('Authlogin');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<link rel="icon" href="<?= base_url('uploads/favicon.png') ?>" type="image/x-icon">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url() . "assets/sb-admin/dist/" ?>css/styles.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/sb-admin/webcam/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() . "assets/sb-admin/dist/" ?>assets/demo/datatables-demo.js" rel="stylesheet" />
	<link href="<?php echo base_url() . "assets/sb-admin/dist/" ?>js/custom/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
	<!-- font awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.min.css'); ?>">
	<!-- end fontawesome -->
	<!-- <link href="<?php echo base_url() . "assets/font-awesome/css/" ?>font-awesome.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.css') ?>">
	<script src="<?php echo base_url() . "assets/font-awesome/" ?>all.min.js" crossorigin="anonymous"></script> -->
	<link href="<?php echo base_url() . "assets/sb-admin/dist/" ?>css/select2.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . "assets/" ?>bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet">
	<link href="<?php echo base_url() . "assets/sb-admin/dist/" ?>css/custom.css" rel="stylesheet" />
	<!-- webcam -->
	=======
	<script src="<?php echo base_url() . "assets/" ?>scannerjs/scanner.js"></script>

</head>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="index.html">SIPER-RM</a>
		<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
		<!-- Search -->
		<?php $this->load->view("_partials/search"); ?>
		<!-- Navbar-->
		<ul class="navbar-nav ml-auto ml-md-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					<a class="dropdown-item" href="#">Settings</a>
					<a class="dropdown-item" href="#">Activity Log</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?php echo base_url('authlogin/logout'); ?>">Logout</a>
				</div>
			</li>
		</ul>
	</nav>
	<div id="layoutSidenav" style="font-size: 20px;">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav small">
						<div class="sb-sidenav-menu-heading">Menu</div>

						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
						?>
							<a class="nav-link" href="<?php echo base_url() . "dashboard" ?>">
								<div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
								Dashboard
							</a>
						<?php
						} ?>
						<a class="nav-link" href="<?php echo base_url() . "data-rm" ?>">
							<div class="sb-nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
							Data RM
						</a>
						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
						?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
								SI Retensi
								<div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
							</a>
						<?php
						} ?>
						<div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?php echo base_url() . "retensi" ?>">Retensi</a>
								<a class="nav-link" href="<?php echo base_url() . "pelestarian" ?>">Pelestarian</a>
								<a class="nav-link" href="<?php echo base_url() . "pemusnahan" ?>">Pemusnahan</a>
								<a class="nav-link" href="<?php echo base_url() . "alih-media" ?>">Alih Media</a>
							</nav>
						</div>
						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
						?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
								Laporan
								<div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
							</a>
						<?php } ?>
						<div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="<?php echo base_url() . "laporan-retensi" ?>">Laporan Retensi</a>
								<a class="nav-link" href="<?php echo base_url() . "laporan-peminjaman" ?>">Laporan Peminjaman</a>
								<a class="nav-link" href="<?php echo base_url() . "laporan-pelestarian" ?>">Laporan Pelestarian</a>
								<a class="nav-link" href="<?php echo base_url() . "laporan-pemusnahan" ?>">Laporan Pemusnahan</a>
								<a class="nav-link" href="<?php echo base_url() . "bap" ?>">Berita Acara Pemusnahan</a>
							</nav>
						</div>
						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas poli' || $this->session->userdata('level') == 'petugas rm') {
						?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
								SI Peminjaman
								<div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
							</a>
						<?php
						} ?>
						<div class="collapse" id="collapseLayouts4" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav">
								<!-- <a class="nav-link" href="<?php echo base_url() . "klpcm" ?>">KLPCM</a> -->
								<a class="nav-link" href="<?php echo base_url() . "peminjaman" ?>">Peminjaman</a>
								<!-- <a class="nav-link" href="<?php echo base_url() . "pengembalian" ?>">Pengembalian</a> -->
							</nav>
						</div>
						<?php if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas rm') {
						?>
							<div class="collapse" id="collapseLayouts4" aria-labelledby="headingFour" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="<?php echo base_url() . "klpcm" ?>">KLPCM</a>
								</nav>
							</div>
						<?php
						} ?>
						<?php if ($this->session->userdata('level') == 'admin') {
						?>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
								<div class="sb-nav-link-icon"><i class="fa fa-columns"></i></div>
								Data Master
								<div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
							</a>
							<div class="collapse" id="collapseLayouts3" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
								<nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link" href="<?php echo base_url() . "pengguna" ?>">Atur Pengguna</a>
									<a class="nav-link" href="<?php echo base_url() . "data-sosial-pasien" ?>">Data Sosial Pasien</a>
									<a class="nav-link" href="<?php echo base_url() . "jadwal-retensi" ?>">Jadwal Retensi</a>
									<a class="nav-link" href="<?php echo base_url() . "poli" ?>">Data Poli</a>
									<a class="nav-link" href="<?php echo base_url() . "penanggungjawab-poli" ?>">Data Penanggungjawab Poli</a>
								</nav>
							</div>
						<?php
						} ?>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logged in as:</div>
					<?php echo $this->session->userdata("level"); ?>
				</div>
			</nav>
		</div>
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h3 class="mt-4">
						<?php echo $title ?>
					</h3>