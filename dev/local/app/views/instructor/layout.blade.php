<!DOCTYPE html>
<html>
<head>
	<title>{{$page_title}} | TheMartialArts.University</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/images/LOGONEW.ico') }}" />

	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"/>
	<link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/selectize.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/fileinput.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/notifIt.css') }}" rel="stylesheet"/>
	<link href="{{ asset('assets/css/bootstrap-select.min.css') }}" rel="stylesheet"/>

	<!-- my custom style -->
	<link href="{{ asset('assets/instructor/css/unick_style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/instructor/css/input_style.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/instructor/css/loader.css') }}" rel="stylesheet">



	@yield('style')
</head>
<body>
	<header class="container">
		<div id="menu" class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-header">
				<div class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<i class="fa fa-navicon" style="font-size:20px;"></i>
				</div>

				<div class="logo">
					<ul class="logo-option">
						<li id="sample_alert">The Martial Arts Company</li>
						<li class="user-options">
							<div><p class="fa-tasks fa"></p></div>
							<input type="radio" name="user-option-anchor" style="position: absolute; width: 60px;height: 60px;top: 0px;right: 0px; opacity: 0; cursor:pointer;">
							<input type="radio" class="anchor-user-options" checked="" name="user-option-anchor">
							<p class="fa-arrow-right fa"></p>
							<div class="user-option-div">
								<div class="user-option-header">User Options</div>
								<ul>
					  				<li>
					  					<a href="{{ URL::route('logout') }}">
						  					<p class="fa-sign-out fa" style="font-size:20px;"></p>
						  					Log-out
					  					</a>
					  				</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left" id="nav_bar">
					<li class="nav active"><a href="#">Dashboard</a></li>
				</ul>
			</div>
		</div>
	</header>


	@yield('content')



	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
	<script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
	<script src="http://fgnass.github.io/spin.js/spin.min.js"></script>
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<script src="{{ asset('assets/js/notifIt.min.js') }}"></script>
	<script src="{{ asset('assets/js/selectize.min.js') }}"></script>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script src="{{ asset('assets/js/fileinput.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>

	<script src="{{ asset('assets/instructor/js/jscolor.js') }}"></script>
	<script src="{{ asset('assets/instructor/js/moment.js') }}"></script>
	<script src="{{ asset('assets/instructor/js/raphael-min.js') }}"></script>
	<script src="{{ asset('assets/instructor/js/morris-0.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/instructor/js/loader.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
		var spinner_option = {
							  lines: 9 // The number of lines to draw
							, length: 56 // The length of each line
							, width: 25 // The line thickness
							, radius: 59 // The radius of the inner circle
							, scale: 1 // Scales overall size of the spinner
							, corners: 1 // Corner roundness (0..1)
							, color: '#000' // #rgb or #rrggbb or array of colors
							, opacity: 0 // Opacity of the lines
							, rotate: 44 // The rotation offset
							, direction: 1 // 1: clockwise, -1: counterclockwise
							, speed: 1.8 // Rounds per second
							, trail: 96 // Afterglow percentage
							, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
							, zIndex: 2e9 // The z-index (defaults to 2000000000)
							, className: 'spinner' // The CSS class to assign to the spinner
							, top: '50%' // Top position relative to parent
							, left: '50%' // Left position relative to parent
							, shadow: false // Whether to render a shadow
							, hwaccel: false // Whether to use hardware acceleration
							, position: 'absolute' // Element positioning
					};
		function displayNotifit( msg , errorStatus ) {
			notif({
				msg: msg,
				position: "right",
				color: "#fff",
				bgcolor: errorStatus ? "#4caf50" : "#e51c23",
				multiline: true,
				autohide: true
			});
		}

		$('.selectize').selectize({
			persist: false,
			createOnBlur: true,
		});
		
		var currentdate = new Date();
		$('.date').datetimepicker({
			useCurrent: false, 
			format: 'MM/DD/YYYY',
			viewMode: 'years',
			defaultDate: new Date(currentdate.getFullYear() - 9, currentdate.getMonth(), currentdate.getDate()),
			maxDate : new Date(currentdate.getFullYear() - 3, currentdate.getMonth(), currentdate.getDate())
		});

		$(document).ready(function(){
		    $(".push_menu").click(function(){
		         $(".wrapper").toggleClass("active");
		    });
		});

		String.prototype.capitalizeFirstLetter = function() {
		    return this.charAt(0).toUpperCase() + this.slice(1);
		}
	</script>
	@yield('script')
</body>
</html>