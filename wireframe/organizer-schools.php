<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="images/logo-icon.ico">

		<title>Schools | The Martial Arts University</title>

		<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- datatables plugin css -->
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.responsive.css">

		<!-- datepicker core css -->
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<!-- jQuery UI js -->
		<script src="js/jquery-ui.min.js"></script>

		<!-- my custom style -->
		<link rel="stylesheet" type="text/css" href="css/unick_library/input_style.css">
		<link rel="stylesheet" type="text/css" href="css/unick_style.css">
		<link rel="stylesheet" type="text/css" href="css/unick_library/loader.css">

		<!-- js color picker -->
		<!-- important -->
		<script src="js/jscolor.js"></script>

		<!-- js datepicker picker -->
		<script src="js/moment.js"></script>
		<script src="js/daterangepicker.js"></script>

		<!-- custom js -->
		<script type="text/javascript" src="js/loader.js"></script>
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
							<p class="fa-tasks fa"></p>
							<ul class="user-options-ul">
				  				<li>
				  					<a href="#">
					  					<img src="images/school_icon.png">
				  						Schools
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
					  					<img src="images/school_owner_icon.png">
				  						Schools Owners
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
					  					<img src="images/instructor_icon.png">
				  						Instructors
				  					</a>
				  				</li>
				  				<li>
				  					<a href="#">
					  					<img src="images/student_icon.png">
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
						</li>
					</ul>
	          </div>
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-left">
	            <li class="nav active"><a href="#">Dashboard</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </header>

	    <div class="horizontal_content">
	    	<div class="container">
	    		<div class="group_content">
	    			<div class="group_header" style="margin-bottom:20px;">Schools</div>
	    			<table width="100%" class="responsive table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px;">
		                <thead>
		                    <tr>
		                        <th>School Name</th>
		                        <th>School Description</th>
		                        <th>Date Registered</th>
		                        <th>School Owner</th>
		                        <th>Number of Instructors</th>
		                        <th>Number of Students</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <tr class="odd gradeX">
		                        <td>MMA</td>
		                        <td>A mixed martial arts school.</td>
		                        <td>July 10, 2014</td>
		                        <td>Belly Winslit</td>
		                        <td>5</td>
		                        <td>10</td>
		                    </tr>
		                    <tr class="odd gradeX">
		                        <td>KMA</td>
		                        <td>A mixed martial arts school.</td>
		                        <td>July 10, 2014</td>
		                        <td>Rick Rhymes</td>
		                        <td>5</td>
		                        <td>10</td>
		                    </tr>
		                    <tr class="odd gradeX">
		                        <td>kMMA</td>
		                        <td>A mixed martial arts school.</td>
		                        <td>July 10, 2014</td>
		                        <td>Bryan Hariot</td>
		                        <td>5</td>
		                        <td>10</td>
		                    </tr>
		                </tbody>
		            </table>
	    		</div>
	    	</div>
	    </div>

	    <!-- datatable plugin js -->
		<script src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="js/dataTables.responsive.js"></script>

		<!-- bootstrap javascript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

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