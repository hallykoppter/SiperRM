<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login SiperRM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<!-- <link rel="icon" type="image/png" href="assets/login-v15/images/icons/favicon.ico"/> -->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login-v15/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login-v15/css/main.css">
	<link rel="stylesheet" type="text/css" href="assets/login-v15/css/custom.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/login-v15/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Login
					</span>
					<br>
					<span class="login100-form-title-1">
						SIPER RM
					</span>
				</div>
				<form class="login100-form validate-form" action="<?php echo base_url('authlogin'); ?>" method="post">
					<?php echo $this->session->flashdata('msg'); ?>
					<!-- <center><span class="tes_waspada"><?php echo $this->session->flashdata('msg'); ?></span></center> -->
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<?php echo form_error('username'); ?>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<?php echo form_error('password'); ?>
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="Login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login-v15/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login-v15/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="assets/login-v15/js/main.js"></script>

</body>

</html>
