<!DOCTYPE html>
<html>
<head>
	<!-- this is for the website icon -->
	<link rel="shortcut icon" href="../images/logo-icon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login | The Martial Arts University</title>

	<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- bootstrap core css -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<style type="text/css">
		body{
			margin:0px;
			font-family: 'Montserrat', sans-serif;
		}
		.ghost_image img
		{
			top:0px;
			z-index:-1;
			position:fixed;
			width: 100%;
			min-width:1000px;
			-webkit-filter:blur(5px);
			filter:blur(5px;);
		}

		.login_panel
		{
			width: 100%;
			max-width:400px;
			margin:20% auto 0;
			background:rgba(255,255,255,0.5);
			padding:40px;
			text-align:right;
		}

		.login_panel .log_in_header
		{
			font-size:20px;
			text-align:left;
			font-weight:bold;
			margin-bottom: 20px;
		}

		.login_panel .login_input
		{
			padding:5px 0px;
		}

		.login_panel .login_input input
		{
			font-size: 12px;
			border:0px;
			padding:15px;
			width: 100%;
		}

		.login_panel .submit input
		{
			border:0px;
			text-transform:uppercase;
			color: white;
			background:#160a47;
			transition:0.3s ease all;
			width:50%;
			text-align:center;
			padding:15px;
			margin-top:10px;
			font-weight: bold;
		}
	</style>

</head>
<body>
	<div class="ghost_image">
		<img src="../images/header_image.jpg">
	</div>
	<div class="login_panel">
		<div class="log_in_header">Login</div>
		<div class="login_input">
			<input type="text" name="username">
		</div>
		<div class="login_input">
			<input type="password" name="password">
		</div>
		<div class="submit">
			<input type="submit" value="login">
		</div>
	</div>
</body>
</html>