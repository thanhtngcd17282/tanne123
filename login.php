<?php
if(!isset($_SESSION)) session_start();
include_once('model/database.php');
include_once('model/m_users.php');

if(isset($_COOKIE['email'])&&isset($_COOKIE['password'])){
	$email=$_COOKIE['email'];
	$password=$_COOKIE['password'];
}
else{
	$email=filter_input(INPUT_POST, 'email');
	$password=filter_input(INPUT_POST, 'password');
	$message="";
	$remember=filter_input(INPUT_POST, 'remember');
}

if (check_login($email,$password)) {
	if($remember=='remember'){
		$name='email';
		$value=$email;
		$expire=time()+5*24*60*60;
		$path='/';
		setcookie($name,$value,$expire,$path);

		$name='password';
		$value=$password;
		setcookie($name,$value,$expire,$path);
	}
	$_SESSION["isLogin"] = true;
	$_SESSION["user"] = get_user_by_email($email);
	header('Location: index.php');
}elseif(!empty($email)){
	echo '<script language="javascript">';
	echo 'alert("Invalid username or password")';
	echo '</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login - Tran Ngoc Thanh</title>
	<link rel="shortcut icon" href="images/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Today's special Offers !</button></a>
		<form class="form-inline mr-auto">
			<input class="header_search form-control" type="search" placeholder="Search" aria-label="Search" size=70>
			<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div class="form-inline my-2 my-lg-0 header_rightt">
			<div class="dropdown">
				<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login\SignUp</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="login.php">Login</a>
					<a class="dropdown-item" href="register.php">SignUp</a>
				</div>
			</div>
		</div>
		<div class="form-inline my-2 my-lg-0">
			<button class="btn btn-outline-danger" type="submit">Contact Us</button>
		</div>
	</nav>


	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.html"><span>Grocery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="events.html">Events</a><i>/</i></li>
					<li><a href="about.html">About Us</a><i>/</i></li>
					<li><a href="products.html">Best Deals</a><i>/</i></li>
					<li><a href="services.html">Services</a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="container">
		<div class="login_form text-center"> 
			<h1 class="text-center">Login</h1><br><form action="" method="POST" role="form">
				<div class="form-group">
					<label class="inputacc text-left" for="">Email</label>
					<input type="text" name="email" class="form-control" id="" placeholder="">
					<label class="inputacc text-left" for="">Password</label>
					<input type="password" name="password" class="form-control" id="" placeholder=""><br>
					<label class="rememberme" for="">Remember me</label>
					<input class="checkbox" name="remember" type="checkbox"><br><br>
				</div>
				<button type="submit" class="btn btn-primary">Log In</button>
				
			</form>
		</div>
	</div>

	<div class="newsletter">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-5 col-md-5 text-center">
					<p class="h3 text-white">Sign up for our newsletter</p>
				</div>
				<div class="col-xs-12 col-sm-5 col-md-7">
					<div class="input-group">
						<input type="email" class="form-control" name="Email" value="Input your Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<div class="input-group-append">
							<button class="btn btn-danger" type="submit">Submit</button> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<h5>INFORMATION</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Events</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About Us</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Best Deals</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Services</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Short Codes</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<h5>POLICY INFO</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Privacy Policy</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Teams Of Use</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<h5>WHAT IN STORES</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Pet Food</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Prozen Snacks</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Kitchen</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Braned Foods</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>House Holds</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<h5>TWITTER POSTS</h5>
					<ul class="list-unstyled quick-links">
						<li><p class="text-success">01 day ago</p>
							<p><a href="#" class="text-secondary">Non numquam http://sd.ds/13jklf# eius modi tempora incidunt ut labore et http://sd.ds/1389kjklf#quo nulla.</a></p>
						</li>
						<li><p class="text-success">02 day ago</p>
							<p><a href="#" class="text-secondary">Con numquam http://fd.uf/56hfg# eius modi tempora incidunt ut labore et http://fd.uf/56hfg#quo nulla.</a></p>
						</li>
					</ul>
				</div>
			</div>
			<div class="row border-top border-white">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
					<br>
					<p class="h6">&2018 Grocery Store. All rights reserved</p>
				</div>
			</div>	
		</div>
	</section>

	<!-- ./Footer -->
	<script src="js/jquery-3.2.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>	