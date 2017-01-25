<!DOCTYPE html>
<html>
<head>
	<title>{{$page_title}} | TheMartialArts</title>
	<!-- this is for the website icon -->
	<link rel="shortcut icon" href="{{asset('assets/images/LOGONEW.ico')}}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width:device-width,initial-scale=1">
	<title>Login | The Martial Arts University</title>

	<!-- customized css import -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/unick_login_style.css') }}">

	<!-- jquery import -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
	@yield('content')


	<script type="text/javascript"></script>
	@yield('script')
</body>
</html>




