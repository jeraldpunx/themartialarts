<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="../images/logo-icon.ico">

		<title>Student View</title>

		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

		<!-- datatables plugin css -->
		<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/dataTables.responsive.css">

		<!-- datepicker core css -->
		<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css">

		<!-- jQuery -->
		<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
		<!-- jQuery UI js -->
		<script src="../js/jquery-ui.min.js"></script>

		<!-- my custom style -->
		<link rel="stylesheet" type="text/css" href="../css/unick_library/input_style.css">
		<link rel="stylesheet" type="text/css" href="../css/unick_style.css">
		<link rel="stylesheet" type="text/css" href="../css/unick_library/loader.css">

		<!-- js color picker -->
		<!-- important -->
		<script src="../js/jscolor.js"></script>

		<!-- js datepicker picker -->
		<script src="../js/moment.js"></script>
		<script src="../js/daterangepicker.js"></script>

		<!-- custom js -->
		<script type="text/javascript" src="../js/loader.js"></script>
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
					<li id="sample_alert">The Martial Arts University</li>
					<li class="user-options">
						<div><p class="fa-tasks fa"></p></div>
						<input type="radio" name="user-option-anchor" style="position: absolute; width: 50px;height: 50px;top: 0px;right: 0px; opacity: 0; cursor:pointer;">
						<input type="radio" class="anchor-user-options" checked="" name="user-option-anchor">
						<p class="fa-arrow-right fa"></p>
						<div class="user-option-div">
							<div class="user-option-header">User Options</div>
							<ul>
				  				<li>
				  					<a href="#">
					  					<img src="../images/school_icon.png">
				  						Schools
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
					  					<img src="../images/instructor_icon.png">
				  						Instructors
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
					  					<img src="../images/student_icon.png">
				  						Students
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
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
	          <ul class="nav navbar-nav navbar-left">
	            <li class="nav"><a href="#">Dashboard</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </header>

	    <div class="horizontal_content">
	    	<div class="container">
	    		<div class="profile-view">
					<div class="col-lg-3 profile-pic">
						<img class="picture" src="../images/default-user.png">
					</div>
					<div class="col-lg-9 info-field">
						<div class="col-lg-12">
			    			<div class="form-group">
			    				<div class="name"><span class="first_name">Jaden</span> <span class="last_name">Armstrong</span></div>
			    			</div>
			    		</div>
					</div>
					<div class="col-lg-9">
						<div class="col-lg-4">
		    				<label>Birthdate</label>
							<div class="birthdate">6/7/2016</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Gender</label>
							<div class="gender">male</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Contact Number</label>
							<div class="contact_number">1-888-967-1530</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Street Address</label>
							<div class="street">59881 Gleason Ridge Apt. 114</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Zip</label>
							<div class="zip">87218</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Country</label>
							<div class="country">Man (Isle of)</div>
						</div>
			    		<div class="col-lg-4">
			    			<label>State</label>
							<div class="state">Port Saint Mary</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Suburb</label>
							<div class="city"></div>
			    		</div>
					</div>
				</div>
	    	</div>
	    </div>

	    <!-- datatable plugin js -->
		<script src="../js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/dataTables.responsive.js"></script>

		<!-- bootstrap javascript -->
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>

		<script type="text/javascript">
		 $(document).ready(function(){

		 	$('#dataTables-example').DataTable({
		 		responsive: true
       //          responsive: {
			    //     breakpoints: [
			    //         { name: 'screen-xs',  width: 600 }
			    //     ]
			    // },

			    // columnDefs: [
			    //     { className: 'screen-xs', targets: [1,2,3] }
			    // ]
			   });
		 });
		</script>
	</body>
</html>