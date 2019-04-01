<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">

	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<!-- GOOGLE FONTS -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet"> -->
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?=base_url()?>assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box box-sign-up-admin">
					<div class="left left-sign left-admin ">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?=base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<br>
								<p class="lead">Sign In to your account</p>
							</div>
							<?php 
							if ($this->session->userdata('pesan') !== NULL) {
							?>
							<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<i class="fa fa-warning"></i> <?=$this->session->userdata('pesan')?>
							</div>
							<?php
						}
						else{

					} ?>
					<form action="<?=base_url()?>admin/register" method="POST">
					<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
					<br>
					<input type="text" class="form-control" placeholder="Username" name="username" required>
					<br>
					<input type="password" class="form-control" placeholder="Password" name="password" required>
					<br>
					<select name="level" class="form-control required">
						<?php foreach ($level as $l): ?>
						<option value="<?=$l->id_level?>"><?=$l->level?></option>	
						<?php endforeach ?>
						
					</select>
					<br>
					<div class="row">
									<!-- <div class="col-md-4"></div> -->
									<div class="col-md-9"><span class="helper-text pull-right" style="margin-top:10px;">Have an Account?<a href="<?=base_url()?>admin/signin"> Sign In</a></span></div>
									<!-- <div class="col-md-3"><button type="submit" class="btn btn-primary btn-block">SIGN UP</button></div> -->
									<input type="submit" class="btn btn-primary pull-right" value="SIGN UP">
								</div>
					
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- END WRAPPER -->
</body>
	<script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</html>
