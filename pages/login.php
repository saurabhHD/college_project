<?php

if(!empty($_COOKIE['_aid_']))
{
	header('Location:../index.php');
	exit;
}
require_once("../common_files/database/database.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.svg" type="image/svg" sizes="16x16">
	<title>Smart Learning Point- Login | Signup</title>
	<link rel="stylesheet" href="../common_files/css/bootstrap.min.css">
	<link rel="stylesheet" href="../common_files/css/animate.css">
	<link rel="stylesheet" href="common_files/css/fontawesome.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="../common_files/js/jquery.js"></script>
	<script src="../common_files/js/popper.js"></script>
	<script src="../common_files/js/bootstrap.min.js"></script>
	<style type="text/css">
		*:focus{
			box-shadow: none !important;

		}
		.product:hover{
			cursor: pointer;
		}
		.nav-tabs {
    		border-bottom: 1px solid #00D07E !important;
		}
		.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    		color: #00D07E !important;
    		background-color: #fff;
    		border-color: #00D07E #00D07E #fff !important;
			}
	</style>
</head>
<body>

<?php
require_once("../assist/nav.php");
?>
<div class="container">
	<div class=" p-3 mt-3 rounded-0 shadow-lg" style="border-left: 5px solid #00D07E">
		<ul class="nav nav-tabs">
			<li class="nav-item"><a href="#signup" data-toggle="tab" class="nav-link active text-secondary">SINGUP</a></li>
			<li class="nav-item"><a href="#login" data-toggle="tab" class="nav-link text-secondary">LOGIN</a></li>
		</ul>
		<div class="row">
		<div class="col-md-6">
			<img src="../images/login.png" width="100%">
		</div>
		<div class="col-md-6">
		<div class="tab-content">
			<div id="signup" class="tab-pane active">
				<form class="signup-form my-3 was-validated">
					<div class="form-group">
						<label for="#firstname">Full Name<sup class="text-danger"> *</sup></label>
						<input type="text" name="fullname" class="form-control" placeholder="Saurabh Kumar" required id="firstname">
						<div class="valid-feedback">
							Good
						</div>
						<div class="invalid-feedback">
							Please enter your fullname
						</div>
					</div>
					<div class="form-group">
						<label for="#city">City Name<sup class="text-danger"> *</sup></label>
						<input type="text" name="city" class="form-control" placeholder="bijnor" required id="city">
						<div class="invalid-feedback">
							Please enter your city name
						</div>
					</div>
					
					<div class="form-group">
						<label for="#email">Email<sup class="text-danger"> *</sup></label>
						<input type="email" name="email" class="form-control" placeholder="example@gmail.com" required id="email">
						<div class="valid-feedback">
							Well done
						</div>
						<div class="invalid-feedback">
							Please enter your email address 
						</div>
					</div>
					<div class="form-group">
						<label for="#password">Password<sup class="text-danger"> *</sup></label>
						<input type="password" name="password" class="form-control" required id="password">
						<div class="valid-feedback">
							Good
						</div>
						<div class="invalid-feedback">
							Please make your password strong must include 123,ABC,abc,@#$ etc.
						</div>
					</div>
					<div class="custom-control custom-checkbox">

						<input type="checkbox" name="term" class="custom-control-input" required id="#terms">
						<label class="custom-control-label" for="#terms">Accept <a href="#" style="color: #00D07E">Terms</a> and <a href="#" style="color: #00D07E">Conditions</a></label>
						<div class="invalid-feedback">
							Please accept terms and conditions
						</div>
					</div>
					<div class="form-group mt-3">
						<button type="submit" class="btn font-weight-bold signup-btn px-4 py-2" style="background:#00D07E;color: white;">SINGUP NOW</button>
					</div>
				</form>
			</div>
			<div id="login" class="tab-pane">
				<form class="login-form my-3 was-validated">
					
					<div class="form-group">
						<label for="#log-email">Email<sup class="text-danger"> *</sup></label>
						<input type="email" name="log-email" class="form-control" placeholder="example@gmail.com" required id="log-email">
						<div class="valid-feedback">
							Good
						</div>
						<div class="invalid-feedback">
							Please enter Your email address
						</div>

					</div>
					<div class="form-group">
						<label for="#log-password">Password<sup class="text-danger"> *</sup></label>
						<input type="password" name="log-password" class="form-control" required id="log-password">
						<div class="valid-feedback">
							Good
						</div>
						<div class="invalid-feedback">
							Please enter Your password 
						</div>
					</div>
					<div class="form-check">
						<input type="checkbox" name="remember" class="form-check-input">
						<label for="#remember">Remember</label>
					</div>
					<div class="form-group mt-3">
						<button type="submit" class="btn font-weight-bold login-btn px-4 py-2" style="background:#00D07E;color: white;">LOGIN NOW</button> <br class="d-lg-none"><br class="d-lg-none">
						<span class="text-capitalize">&nbsp;&nbsp;&nbsp;<a href="#" style="color: #00D07E">forgot password ?</a></span>
					</div>
				</form>
			</div>
		</div>
		</div>
		
</div>

	</div>
</div>
<?php
require_once("../assist/footer.php");

?>

<script src="../script/login.js"></script>
</body>
</html>