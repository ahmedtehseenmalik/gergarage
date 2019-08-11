<?php
// Include the config file
require_once 'admin/functions/config.php' ;
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ger Garage Management</title>
	<!--  Bootstrap Css File -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!--  FontAwesome Css File -->
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<!--  Custom Css File-->
	<link rel="stylesheet" href="assets/style.css">
	<!-- Font CSS -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<!-- Date Picker CSS-->
	<link rel="stylesheet" href="<?= $config['admin_url'] ?>assets/bower_components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

	<link rel="author" href="humans.txt">
</head>
<body>
	<header>
		<div class="header-top-bar center-xs">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="widget no-border m-0">
							<ul class="list-inline font-13 sm-text-center mt-5">
								<li>
									<a class="text-white" href="admin/customer-login.php">Login</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-8 hidden-xs">

						<ul class="social-icons">
							<li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container header-top">
			<div class="row center-xs">
				<div class="col-md-3">
					<a href="<?php echo $config['url'] ?>">
            <img src="logo.png" alt="Logo">
          </a>
				</div>
				<div class="col-md-1 hidden-xs"></div>
				<div class="col-md-8 pxy-10 ">
					<div class="row">
						<div class="col-md-4 info">
							<div class="icon hidden-xs">
								<i class="fa fa-clock-o fa-2x"></i>
							</div>
							<div class="content">
								<p>Mon - Sat: 9:00am - 5:00pm</p>
								<p>Sunday Closed</p>
							</div>
						</div>
						<div class="col-md-4 info">
							<div class="icon icon-2 hidden-xs">
								<i class="fa fa-mobile fa-2x"></i>
							</div>
							<div class="content">
								<p>+353 899675350</p>
								<p>gershop@gmail.com</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<a href="#booking" class="btn btn-success mxy-10">Make a Booking</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="navbar navbar-default navbar-red" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
					Menu
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<nav>
						<ul class="nav navbar-nav">
							<li>
								<a href="<?php echo $config['url'] ?>">Home</a>
							</li>
							<li>
								<a href="<?php echo $config['url'] ?>auto-parts">Auto Parts</a>
							</li>
							<li>
								<a href="<?php echo $config['url'] ?>faq">FAQ</a>
							</li>
							<li>
								<a href="<?php echo $config['url'] ?>contact-us">Contact us</a>
							</li>
						</ul>
					</nav>

				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</div>
	</header>
