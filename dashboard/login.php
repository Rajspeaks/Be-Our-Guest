<?php session_start(); ?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="" class="logo pull-left">
					<img src="assets/images/logo.png" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="" method="POST">
							<div class="form-group mb-lg">
								<label>Email</label>
								<div class="input-group input-group-icon">
									<input name="email" type="email" class="form-control input-lg" required="" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
									<!-- <a href="pages-recover-password.html" class="pull-right">Lost Password?</a> -->
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" required="" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<!-- <input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label> -->
									</div>
								</div>
								<div class="col-sm-4 text-right">
									
									<input type="submit" class="btn btn-primary btn-block" name="login" value="Sign In">
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div>

							<!-- <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a> -->

						</form>
					</div>
				</div>
				
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="assets/vendor/jquery/jquery.js"></script>
		<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="assets/javascripts/theme.init.js"></script>

	</body>
</html>
<?php 
	
// $password = "123";
// $ecnpassword= md5($password);

// echo $ecnpassword;

	if (isset($_POST['login'])) {
		
	$email = $_POST['email'];
	$password = $_POST['password'];

	//$ecnpassword= md5($password);

	include 'dbCon.php';
	$con = connect();

	$emailSQL = "SELECT * FROM restaurant_info WHERE email = '$email';";

	$passwordSQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$password';";

	$emailResult = $con->query($emailSQL);

	$passwordResult = $con->query($passwordSQL);

	if ($emailResult->num_rows <= 0) {
		echo '<script>alert("This Email Does Not Exist.")</script>';
		echo '<script>window.location="login.php"</script>';
	}else if ($passwordResult->num_rows <= 0) {
		echo '<script>alert("This Password is Incorrect.")</script>';
		echo '<script>window.location="login.php"</script>';
	}else{

		$_SESSION['isLoggedIn'] = TRUE;

		$SQL = "SELECT * FROM restaurant_info WHERE email = '$email' And password = '$password';";

		$result = $con->query($SQL);

		foreach ($result as $r) {
			$_SESSION['id'] = $r['id'];
			$_SESSION['name'] = $r['restaurent_name'];
			$_SESSION['email'] = $r['email'];
			$_SESSION['password'] = $r['password'];
			$_SESSION['role'] = $r['role'];
		}
		if($_SESSION['role'] == 1){
			echo '<script>window.location="index.php"</script>';
		}else{
			echo '<script>window.location="../index.php"</script>';
		}
		
	}

	}
?>
