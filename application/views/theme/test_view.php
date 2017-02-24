<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>System main</title>
		<link rel="icon" href="<?php echo base_url("public/img/icon/1459414497_target.ico");?>">

		<!-- Bootstrap CSS 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">-->
		<link href="<?php echo base_url("public/bootstrap/css/bootstrap.min.css");?>" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery 
		<script src="//code.jquery.com/jquery.js"></script>-->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

		<!-- Bootstrap JavaScript 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>-->
		<script src="<?php echo base_url("public/bootstrap/js/bootstrap.min.js");?>"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	</head>
	<body>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">System Room</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="#">Home</a></li>
		      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ปวช<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">ปวช.</a></li>
		          <li><a href="#">ปวส.</a></li>
		          <li><a href="#">ตั้งค่า</a></li>
		        </ul>
		      </li>
		      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ปวส<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">ปวช.</a></li>
		          <li><a href="#">ปวส.</a></li>
		          <li><a href="#">ตั้งค่า</a></li>
		        </ul>
		      </li>
		      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Setup<span class="caret"></span></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">User Management</a></li>
		          <li><a href="#">Copyright system</a></li>
		          <li><a href="#">Department</a></li>
		        </ul>
		      </li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
		      <li><a href="<?php echo site_url('login/logout');?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		    </ul>
		  </div>
		</nav>
		  
		<div class="container">
		  <h3>Right Aligned Navbar</h3>
		  <p>The .navbar-right class is used to right-align navigation bar buttons.</p>
		</div>
		
 		
	</body>
</html>