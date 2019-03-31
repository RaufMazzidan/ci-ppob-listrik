<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/css/demo.css">

	<link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<!-- <div id="wrapper"> -->
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?=base_url()?>/assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="navbar-btn navbar-btn-right" style="margin-right: 20px;">
					<span class="btn btn-success" onclick="download()"><i class="fa fa-download"></i> <span> DOWNLOAD</span></span>
				</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content" style="width: 100%; margin-top: 90px">
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
	<!-- </div> -->
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?=base_url()?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?=base_url()?>/assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?=base_url()?>/assets/scripts/klorofil-common.js"></script>

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
</body>

</html>
