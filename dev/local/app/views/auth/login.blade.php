@extends('auth.layout')

@section('content')

<a name="backtoTop" style="position:absolute; top:0px;"></a>
<div class="background_image">
	<img src="{{asset('assets/images/login_photos/header_image.jpg')}}">
</div>
<div class="body-shade"></div>
<div class="header-nav wow bounceInDown" id="movable_header">
	<div class="container">
		<div class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="cursor:pointer; z-index:1;">
			<i class="glyphicon glyphicon-align-justify" style="font-size:20px;"></i>
		</div>
		<div class="navbar-header">
			<a href="#backtoTop" class="smoothScroll">
				<span>
					<img src="{{asset('assets/images/login_photos/logo.png')}}">
					
				</span>
				The Martial Arts University
			</a>
		</div>
		<div class="navigator" role="navigation">
			<ul class="navbar-collapse collapse">
				<li>
					<a href="{{ route('register') }}" class="smoothScroll">
						Sign Up
					</a>
				</li>
				<li>
					<a href="#contact" class="smoothScroll">
						Contact Us
					</a>
				</li>
				<li>
					<a href="#about" class="smoothScroll">
						About
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="container" style="z-index:1; margin-top:100px;">
	<div class="col-lg-8" style="margin:100px 0px;">
		<h1 class="wow flipInX" data-wow-delay="1s" style="color:white; text-shadow: 0 1px 6px #969696; text-align:center;">Welcome to the Martial Arts University</h1>
		<p class="wow flipInY" data-wow-delay="2s" style="color:white; text-shadow: 0 1px 6px #969696; text-align:center;">
			This website is built to provide you easy access to your martial arts school informations.
		</p>	
	</div>
	<div class="col-lg-4 wow zoomIn">
		<div class="panel panel-default">
			<div class="panel-heading">Sign in</div>
			<div class="panel-body">
				<form role="form" method="POST" action="{{ URL::route('login') }}">
					<div class="form-group">
						<label>E-Mail Address</label>
						{{ Form::text('email', Input::old('email'), ['class'=>'form-control', 'required'=>'']) }}
					</div>
					<div class="form-group">
						<label>Password</label>
						{{ Form::password('password', ['class'=>'form-control', 'required'=>'']) }}
					</div>
					<div class="form-group">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div>
					<a href="{{ url('/password/email') }}" class="alert-link">Forgot your password?</a>.
					<div class="form-group" style="text-align:right;">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</form>
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if (Session::has('flash.message'))
					<div class="alert alert-{{Session::get('flash.type')}}">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						{{ Session::get('flash.message') }}
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-section testimonials violet_bg">
	<div class="container">
		<div class="col-lg-12">
			<div class="testimonials-header wow bounceInDown">Here's what some of our happy customers have to say...</div>
		</div>
		<div class="col-lg-4">
			<div class="testimonials-item wow bounceInDown">
				<div class="testimonials-image">
					<img src="{{asset('assets/images/login_photos/1.jpg')}}" style="width:100%; height:initial;">
				</div>
				<div class="testimonials-title">
					John Miller, <span class="title-label">School Owner</span>
				</div>
				<div class="testimonials-text">
					"Excited to see the Martial Arts industry finally get some easy to use, robust business software. Really helps me manage my school."
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="testimonials-item wow bounceInDown" data-wow-delay="0.25s">
				<div class="testimonials-image">
					<img src="{{asset('assets/images/login_photos/2.jpg')}}" style="width:100%; height:initial;">
				</div>
				<div class="testimonials-title">
					Jerald Anderson, <span class="title-label">KB Instructor</span>
				</div>
				<div class="testimonials-text">
					"Excited to see the Martial Arts industry finally get some easy to use, robust business software. Really helps me manage my school."
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="testimonials-item wow bounceInDown" data-wow-delay="0.25s">
				<div class="testimonials-image">
					<img src="{{asset('assets/images/login_photos/3.png')}}">
				</div>
				<div class="testimonials-title">
					Bryan Ortega, <span class="title-label">Judo Instructor</span>
				</div>
				<div class="testimonials-text">
					"Excited to see the Martial Arts industry finally get some easy to use, robust business software. Really helps me manage my school."
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-section transparent_bg">
	<div class="container">
		<div class="col-lg-6">
			<div class="text_panel">
				<div class="text_panel_header wow bounceInLeft">Mobile Responsive</div>
				<div class="text_panel_message wow bounceInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="wide_image_container wow bounceInDown">
				<img src="{{asset('assets/images/login_photos/mobile_reposive_image.png')}}">
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-section orange_bg">
	<div class="ghost_image">
		<img src="{{asset('assets/images/login_photos/belter.jpg')}}">
	</div>
	<div class="container">
		<div class="col-lg-6">
			<div class="text_panel">
				<div class="text_panel_header wow bounceInLeft">Design Your Own Belt</div>
				<div class="text_panel_message wow bounceInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
			</div>
		</div>
		<div class="col-lg-6 col-lg-offset-6">
			<div class="long-belt wow bounceInRight">
				<ul>
					<li style="background:#337AB7;"></li>
					<li style="background:yellow;"></li>
					<li style="background:yellow;"></li>
					<li style="background:#337AB7;"></li>
				</ul>
			</div>
			<div class="long-belt wow bounceInRight">
				<ul>
					<li style="background:yellow;"></li>
					<li style="background:yellow;"></li>
					<li style="background:#337AB7;"></li>
					<li style="background:#337AB7;"></li>
				</ul>
			</div>
			<div class="long-belt wow bounceInRight">
				<ul>
					<li style="background:yellow;"></li>
					<li style="background:yellow;"></li>
					<li style="background:yellow;"></li>
					<li style="background:yellow;"></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-section red_bg" style="min-height:500px;">
	<a name="about" style="position:absolute; top:-85px;"></a>
	<div class="ghost_image">
		<img src="{{asset('assets/images/login_photos/about_img.jpeg')}}">
	</div>
	<div class="container">
		<div class="col-lg-12">
			<div class="text_panel">
				<div class="text_panel_header wow bounceInLeft">About The Martial Arts University</div>
				<div class="text_panel_message wow bounceInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-12 content-section gray_bg" style="min-height:300px;">
	<a name="contact"style="position:absolute; top:-85px;"></a>
	<div class="ghost_image">
		<img src="{{asset('assets/images/login_photos/contact_icon.png')}}" style="min-width:0px; width:600px;">
	</div>
	<div class="container">
		<div class="col-lg-12">
			<div class="text_panel">
				<div class="text_panel_header wow bounceInLeft">Contact Us</div>
			</div>
		</div>
		<form class="form-group wow bounceInRight" style="color:white;">
			<div class="col-lg-6">
				<label>Name</label>
				<input class="form-control" type="text">
			</div>
			<div class="col-lg-6">
				<label>Email</label>
				<input class="form-control" type="text">
			</div>
			<div class="col-lg-6">
				<label>Phone</label>
				<input class="form-control" type="text">
			</div>
			<div class="col-lg-12">
				<label>Subject</label>
				<input class="form-control" type="text">
			</div>
			<div class="col-lg-12">
				<label>Message</label>
				<textarea class="form-control" style="min-height:200px;"></textarea>
			</div>
			<div class="col-lg-12" style="padding:30px 0px;">
				<button class="btn btn-success pull-right">Send</button>
			</div>
		</form>
	</div>
</div>
<div class="col-lg-12 content-section footer-section">
	<div class="container">
		<div class="col-lg-6">
			<ul class="horizontal_links">
				<li><a href="#">Have feedback?</a></li>
				<li>|</li>
				<li><a href="#">The Matial Arts University</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- custom js import -->
<script src="{{ asset('assets/js/wow.js') }}"></script>
<script src="{{ asset('assets/js/smoothscroll.js') }}"></script>

<script>

window.onscroll = function(e)
{
	var header = document.getElementById("movable_header");

	if($(document).scrollTop() > 40)
	{
		header.style.background = "#160a47";	
	}
	else
	{
		header.style.background = "transparent";
	}
}

wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);
@if (!Session::has('flash.message'))
	wow.init();
@endif
</script>

<!-- bootstrap javascript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@endsection