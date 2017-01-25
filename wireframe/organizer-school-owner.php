<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="images/logo-icon.ico">

		<title>Organizer Interface</title>

		<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- datepicker core css -->
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>

		<!-- for the charts js -->
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/morris-0.4.1.min.js"></script>

		<!-- datatables plugin css -->
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.responsive.css">

		<!-- my custom style -->
		<link rel="stylesheet" type="text/css" href="css/unick_style.css">
		<link rel="stylesheet" type="text/css" href="css/unick_library/input_style.css">

		<!-- custom js -->
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
		<div class="sidebar">
			<div class="search-box">
				<input type="text" placeholder="Search">
				<p class="fa-search fa"></p>
			</div>

			<div class="side-bar-settings">
				<div id="filter" data-toggle="modal" data-target=".bs-example-modal-lg" style="background:#999; cursor:pointer; font-size:9px;position:absolute; margin-top:3px; margin-left:3px; padding:3px;"><i class="fa-filter fa"></i> FILTER</div>
				<ul class="custom_radio_input">
					<li>
						<input id="ALL" type="radio" name="student" value="1" checked="true"><label for="ALL">ALL</label>
					</li>
					<li>
						<input id="INACTIVE" type="radio" name="student" value="2" checked="true"><label for="INACTIVE">INACTIVE</label>
					</li>
					<li>
						<input id="ACTIVE" type="radio" name="student" value="3" checked="true"><label for="ACTIVE">ACTIVE</label>
					</li>
				</ul>
				<select>
				  <option value="2">School Owners</option>
				</select>
			</div>

			<div class="list-container">
				<ul>
					<li class="active" onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="images/default-user.png">
							<span class="name">Uelmar Ortega</span>
							<span class="student_title">MMA</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="images/default-user.png">
							<span class="name">Uelmar Ortega</span>
							<span class="student_title">MMA</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="images/default-user.png">
							<span class="name">Uelmar Ortega</span>
							<span class="student_title">MMA</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="side-bar-footer">
				<ul>
					<li class="num-student" style="width:100%; margin:0px; padding-right: 160px; text-align:center;"><b>3</b> School Owners</li>
					<li class="add-student" data-toggle="modal" data-target=".bs-example-modal-lg3" style="position:absolute; right:5px; top:15px;">
						<span><a href="#" style="font-size:12px;">ADD SCHOOL OWNER</a></span>
					</li>
				</ul>
			</div>
		</div>
		<div class="base-container">
			<div class="main-content" id="content1">
				<div class="content-header">Reports</div>
				<div class="col-lg-12 other_info" style="min-height:90%;">
					<div class="other_content">
						<div class="row">
							<div class="col-lg-6">
								<div class="other_content_header">
									Growth
								</div>
								<div class="content_text ">
									<div id="line-example"></div>
									<script type="text/javascript">
										$(document).ready(function(){
											Morris.Line({
											  element: 'line-example',
											  data: [
											    { y: '2010-4', a: 100},
											    { y: '2010-5', a: 75},
											    { y: '2012-6', a: 50},
											    { y: '2013-7', a: 75},
											    { y: '2014-8', a: 50},
											    { y: '2015-9', a: 75},
											    { y: '2016-10', a: 100},
											  ],
											  xkey: 'y',
											  ykeys: ['a'],
											  labels: ['Students'],
										      resize: true
											});
										});
									</script>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="other_content_header">
									Attendance
								</div>
								<div class="content_text ">
									<div id="area-example"></div>
									<script type="text/javascript">
										$(document).ready(function(){
											Morris.Area({
											  element: 'area-example',
											  data: [
											    { y: '2006', a: 100, b: 90 },
											    { y: '2007', a: 75,  b: 65 },
											    { y: '2008', a: 50,  b: 40 },
											    { y: '2009', a: 75,  b: 65 },
											    { y: '2010', a: 50,  b: 40 },
											    { y: '2011', a: 75,  b: 65 },
											    { y: '2012', a: 100, b: 90 }
											  ],
											  xkey: 'y',
											  ykeys: ['a', 'b'],
											  labels: ['Series A', 'Series B'],
										      resize: true
											});
										});
									</script>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="other_content_header">
									Others
								</div>
								<div class="content_text ">
									<div id="morris-area-chart"></div>
									<script type="text/javascript">
										$(document).ready(function(){
											Morris.Area({
									        element: 'morris-area-chart',
									        data: [{
									            period: '2010 Q1',
									            iphone: 2666,
									            ipad: null,
									            itouch: 2647
									        }, {
									            period: '2010 Q2',
									            iphone: 2778,
									            ipad: 2294,
									            itouch: 2441
									        }, {
									            period: '2010 Q3',
									            iphone: 4912,
									            ipad: 1969,
									            itouch: 2501
									        }, {
									            period: '2010 Q4',
									            iphone: 3767,
									            ipad: 3597,
									            itouch: 5689
									        }, {
									            period: '2011 Q1',
									            iphone: 6810,
									            ipad: 1914,
									            itouch: 2293
									        }, {
									            period: '2011 Q2',
									            iphone: 5670,
									            ipad: 4293,
									            itouch: 1881
									        }, {
									            period: '2011 Q3',
									            iphone: 4820,
									            ipad: 3795,
									            itouch: 1588
									        }, {
									            period: '2011 Q4',
									            iphone: 15073,
									            ipad: 5967,
									            itouch: 5175
									        }, {
									            period: '2012 Q1',
									            iphone: 10687,
									            ipad: 4460,
									            itouch: 2028
									        }, {
									            period: '2012 Q2',
									            iphone: 8432,
									            ipad: 5713,
									            itouch: 1791
									        }],
									        xkey: 'period',
									        ykeys: ['Sample1', 'ipad', 'itouch'],
									        labels: ['Sample2', 'Sample', 'Sample'],
									        resize: true
									    });
										});
									</script>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="other_content_header">
									Donut Chart
								</div>
								<div class="content_text ">
									<div id="morris-donut-chart"></div>
									<script type="text/javascript">
										$(document).ready(function(){
											Morris.Donut({
										        element: 'morris-donut-chart',
										        data: [{
										            label: "MMA",
										            value: 12
										        }, {
										            label: "KMA",
										            value: 30
										        }, {
										            label: "KBM",
										            value: 20
										        }],
										        resize: true
										    });
										});
									</script>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-12 other_info">
					<div class="other_info_header">
						<div class="content-footer">
							<ul class="nav">
								<li><a href="#"> <img src="images/initial-logo.png"> The Martial Arts University </a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Organization Owner Interface</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content" id="content2" style="display:none; opacity:0;">
				<div class="content-header">
					School Owner Profile
					<div class="close-panel-icon" onclick="showStudentViewProfile(false); showReports(true);"><i class="fa fa-times"></i></div>
				</div>
				<div class="profile-view">
					<div class="col-lg-3 profile-pic">
						<img src="images/default-user.png">
					</div>
					<div class="col-lg-9 info-field">
						<div class="name">Uelmar Ortega</div>
					</div>
					<div class="col-lg-9">
						<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>BIRTHDATE</label>
			    				<div>July 18, 1995</div>
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Contact Number</label>
			    				<div>09072994567</div>
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Email Address</label>
			    				<div>uelmar_ortega@yahoo.com</div>
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Address</label>
			    				<div>Lahug Cebu City</div>
			    			</div>
			    		</div>
						<div class="col-lg-6 col-lg-offset-6">
							<div style="height:30px;">
								<div id="edit-bttn" class="orange-bttn unick-bttn edit_bttn" onclick="showStudentViewProfile(false);showStudentEditProfile(true);" style="float:right">
									<i class="fa-edit fa"><a href="#"> Edit </a></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 other_info" style="min-height:90%; width:100%;">
					<div class="other_info_header">Other Info</div>
					<div class="other_content">
						<div class="row">
							<div class="col-lg-12">
								<div class="other_content_header">
									Schools
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text" style="font-size:12px;">
									<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px;">
					                    <thead>
					                        <tr>
					                            <th>School Name</th>
					                            <th>School Description</th>
					                            <th>Date Registered</th>
					                            <th>Number of Instructors</th>
					                            <th>Number of Students</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                        <tr class="odd gradeX">
					                            <td>MMA</td>
					                            <td>A mixed martial arts school.</td>
					                            <td>July 10, 2014</td>
					                            <td class="center">5</td>
					                            <td class="center">10</td>
					                        </tr>
					                        <tr class="odd gradeX">
					                            <td>KMA</td>
					                            <td>A karate martial arts school.</td>
					                            <td>July 13, 2015</td>
					                            <td class="center">11</td>
					                            <td class="center">50</td>
					                        </tr>
					                        <tr class="odd gradeX">
					                            <td>MMAX</td>
					                            <td>A mixed martial arts school.</td>
					                            <td>July 10, 2014</td>
					                            <td class="center">5</td>
					                            <td class="center">10</td>
					                        </tr>
					                        <tr class="odd gradeX">
					                            <td>MMA</td>
					                            <td>A mixed martial arts school.</td>
					                            <td>July 10, 2016</td>
					                            <td class="center">5</td>
					                            <td class="center">10</td>
					                        </tr>
					                    </tbody>
					                </table>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="other_content_header">
									Students
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text ">
									<div class="color">
										<div class="col-lg-2 student_style_tile">
				    						<div class="style_item">
				    							<div class="style_shade">
				    								<i class="fa-eye fa-2x fa"></i>
				    							</div>
				    							<div class="style_header">Judo</div>
				    							<div class="style_content">
				    								<div class="tile_image_container">
				    									<img src="images/sample_relationship1.jpg">
				    								</div>
				    							</div>
				    							<div class="style_footer"><i class="fa-user fa-2x fa"></i>Anna</div>
				    						</div>
					    				</div>
					    				<div class="col-lg-2 student_style_tile">
				    						<div class="style_item">
				    							<div class="style_shade">
				    								<i class="fa-eye fa-2x fa"></i>
				    							</div>
				    							<div class="style_header">Muaiti</div>
				    							<div class="style_content">
				    								<div class="tile_image_container">
				    									<img src="images/sample_relationship2.jpg">
				    								</div>
				    							</div>
				    							<div class="style_footer"><i class="fa-user fa-2x fa"></i>Sarrah</div>
				    						</div>
					    				</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="other_content_header">Status Details</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text">
									He has recently added a new student on his <b>Judo</b> class.
								</div>
							</div>
							<div class="col-lg-12">
								<div class="other_content_header">Notes</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text">
									<textarea></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="other_content_header">Recent Activity</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text">
									<div class="col-lg-3"><b>22 july 2016</b></div>
									<div class="col-lg-9">Added 10 students</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col-lg-12 other_info">
					<div class="other_info_header">
						<div class="content-footer">
							<ul class="nav">
								<li><a href="#"> <img src="images/initial-logo.png"> The Martial Arts University </a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content" id="content3" style="display:none; opacity:0;">
				<div class="content-header">Update Instructor</div>
				<div class="profile-edit profile-view">
					<div class="col-lg-3 profile-pic">
						<div class="image-container">
							<img src="images/default-user.png">
							<div class="image-container-footer">
								<ul>
									<li>Change Photo</li>
									<li>Delete Photo</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Name</label>
			    				<input class="form-control" type="text" placeholder="Name">
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Birth Date</label>
			    				<input type="text" class="form-control" name="birthdate" placeholder="mm/dd/yy">
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Contact Number</label>
			    				<input class="form-control" type="text" placeholder="Contact Number">
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Email Address</label>
			    				<input class="form-control" type="text" placeholder="Email Address">
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<label>Address</label>
			    				<input class="form-control" type="text" placeholder="Address">
			    			</div>
			    		</div>
			    		<div class="col-lg-6 info-field col-lg-offset-6">
							<div style="height:30px;">
								<div id="cancel-bttn" class="gray-bttn unick-bttn" onclick="showStudentViewProfile(true);showStudentEditProfile(false);" style="float:right">
									<i class="fa">Cancel</i>
								</div>
								<div class="orange-bttn unick-bttn" onclick="showStudentViewProfile(true);showStudentEditProfile(false);" style="float:right">
									<i class="fa-save fa"> Save </i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- modal popup for the search profile popup-->
	    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="profile-search ">
					<div class="col-lg-12">
		    			<h3 class="page-header">Profile Search</h3>
		    		</div>
					<div class="col-lg-12">
						<input type="text" placeholder="FIRST NAME">
					</div>
					<div class="col-lg-12">
						<input type="text" placeholder="LAST NAME">
					</div>
					<div class="multi_input">
						<div class="input_header">Age</div>
						<div class="col-lg-6">
							<input type="text" placeholder="FROM">
						</div>
						<div class="col-lg-6">
							<input type="text" placeholder="TO">
						</div>
					</div>
					<div class="radio_inputs custom_radio_input">
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input id="radio1" type="radio" name="gender" value="1" checked="true"><label for="radio1">All</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input id="radio2" type="radio" name="gender" value="1"><label for="radio2">Male</label>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4">
							<input id="radio3" type="radio" name="gender" value="1"><label for="radio3">Female</label>
						</div>
					</div>
					<div class="multi_input">
						<div class="input_header">School Related</div>
						<div class="col-lg-12">
							<select>
							  <option value>SELECT CLASS</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12" style="padding-top:20px; height:70px;">
						<div class="orange-bttn unick-bttn" style="float:right">
							OK
						</div>
					</div>
				</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- modal popup for the adding of instructor-->
	    <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="style_edit_detail_container">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Add Student</h3>
		    		</div>
		    		<div class="col-lg-12">
		    			<div>
		    				<h4>Basic Information</h4>
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Name">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Address">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Contact Number">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Email Address">
		    			</div>
		    		</div>
		    		<div class="col-lg-12">
		    			<div>
		    				<h4>Emergency Contact Information</h4>
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Name">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Address">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Contact Number">
		    			</div>
		    		</div>
		    		<div class="col-lg-6">
		    			<div class="form-group">
		    				<input class="form-control" type="text" placeholder="Email Address">
		    			</div>
		    		</div>
		    		<div class="rank_edit_bttn">
						<div class="green-bttn unick-bttn" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Instructor </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

		<!-- bootstrap javascript -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<!-- js datepicker picker -->
		<script src="js/moment.js"></script>
		<script src="js/daterangepicker.js"></script>

		<!-- datatable plugin js -->
		<script src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="js/dataTables.responsive.js"></script>

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

		 	// this code is for the date picker

		 	$('input[name="birthdate"]').daterangepicker({
		        singleDatePicker: true,
		        showDropdowns: true
		    }, 
		    function(start, end, label) {
		        // var years = moment().diff(start, 'years');
		        // alert("You are " + years + " years old.");
		    });
		 });

		// these are my custom js function

		// this code is used to show the edit student profile view
		function showReports(bol)
		{
		    if(bol)
			{
				document.getElementById("content1").style.display = "block";
				setTimeout(function(){
			      document.getElementById("content1").style.opacity = "1";
			    },10);
			}
			else
			{
				document.getElementById("content1").style.opacity = "0";
				setTimeout(function(){
				document.getElementById("content1").style.display="none";
				},500);
			}
		}

		// this code is used to show the student profile view
		function showStudentViewProfile(bol)
		{
			if(bol)
			{
				document.getElementById("content2").style.display = "block";
				setTimeout(function(){
			      document.getElementById("content2").style.opacity = "1";
			    },10);
			}
			else
			{
				document.getElementById("content2").style.opacity = "0";
				setTimeout(function(){
				document.getElementById("content2").style.display="none";
				},500);
			}
		}

		// this code is used to show the edit student profile view
		function showStudentEditProfile(bol)
		{
		    if(bol)
			{
				document.getElementById("content3").style.display = "block";
				setTimeout(function(){
			      document.getElementById("content3").style.opacity = "1";
			    },10);
			}
			else
			{
				document.getElementById("content3").style.opacity = "0";
				setTimeout(function(){
				document.getElementById("content3").style.display="none";
				},500);
			}
		}
		</script>
	</body>
</html>