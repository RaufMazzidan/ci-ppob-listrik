<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link href="<?=base_url()?>assets/vendor/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> 
								<?php 
								if ($this->session->userdata('login') == TRUE) {
									echo $this->session->userdata('nama');
								}
								else{
									echo "Nama User";
								}
								?>
							</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a><i class="lnr lnr-user"></i> <span>
									<?php 
								if ($this->session->userdata('login') == TRUE) {
									echo $this->session->userdata('level');
								}
								else{
									echo "Level";
								}
								?>
								</span></a></li>
								<li><a href="<?=base_url()?>admin/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?=base_url()?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="<?=base_url()?>level"><i class="lnr lnr-code"></i> <span>Level</span></a></li>
						<li><a href="<?=base_url()?>admin"><i class="lnr lnr-code"></i> <span>Admin</span></a></li>
						<li><a href="<?=base_url()?>tarif"><i class="lnr lnr-code"></i> <span>Tarif</span></a></li>
						<li><a href="<?=base_url()?>pelanggan"><i class="lnr lnr-code"></i> <span>Pelanggan</span></a></li>
						<li><a href="<?=base_url()?>penggunaan"><i class="lnr lnr-code"></i> <span>Penggunaan</span></a></li>
						<li><a href="<?=base_url()?>verifikasi"><i class="lnr lnr-code"></i> <span>Verifikasi</span></a></li>
						<li><a href="<?=base_url()?>laporan"><i class="lnr lnr-code"></i> <span>Laporan</span></a></li>
						<li><a href="<?=base_url()?>dashuser"><i class="lnr lnr-code"></i> <span>Detail Tagihan</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<?php $this->load->view($page); ?>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->

	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/jquery-datatable.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/jquery.dataTables.js"></script> 
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/jszip.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/pdfmake.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/vfs_fonts.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script> 
	<script src="<?=base_url()?>assets/scripts/klorofil-common.js"></script>
</body>
<script type="text/javascript"> 
	$(function($) {
		 let url = window.location.href;
		  $('nav ul li a').each(function() {
		   if (this.href === url) {
		   $(this).addClass('active');
		  }
		 });
		});
</script>
</html>
