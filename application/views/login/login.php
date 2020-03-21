<!DOCTYPE HTML>
<html>
<head>
<title>Sistem Informasi Busway Pekanbaru</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Personal Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="<?=base_url();?>/asset/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?=base_url();?>/asset/css/font-awesome.css">
<!--file icon-->
<link rel="icon" type="image/png" href="<?=base_url();?>/asset/images/pro.jpg"/>
<link href="//fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
	<div class="header-w3l">
		<h1>Login Sistem Informasi</h1>
	</div>
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<div class="wthree-pro">
			<img src="<?=base_url();?>/asset/images/pro.jpg" alt="image">
			<h2>SI BUSWAY</h2>
		</div>
		<form action="<?php echo site_url('c_login/index')?>" method="post">
			<input placeholder="Username" name="username" class="user" type="text" required="">
			<input  placeholder="Password" name="password" class="pass" type="password" required="">
			<div class="sub-w3l">
				<div class="right-w3l">
					<input type="submit" value="Login" name="Submit">
				</div>
			</div>
		</form>
	</div>
</div>
<div class="footer">
	<p>&copy; 2019 AWSYSTEK </p>
</div>
</body>
</html>