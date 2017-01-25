<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="../images/logo-icon.ico">

		<title>Instructors</title>

		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

		<!-- datepicker core css -->
		<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css">

		<!-- jQuery -->
		<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

		<!-- for the charts js -->
		<script type="text/javascript" src="../js/raphael-min.js"></script>
		<script type="text/javascript" src="../js/morris-0.4.1.min.js"></script>

		<!-- my custom style -->
		<link rel="stylesheet" type="text/css" href="../css/unick_style.css">
		<link rel="stylesheet" type="text/css" href="../css/unick_library/input_style.css">
		<link rel="stylesheet" type="text/css" href="../css/unick_library/loader.css">

		<!-- datatables plugin css -->
		<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/dataTables.responsive.css">

		<!-- datatable plugin js -->
		<script src="../js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/dataTables.responsive.js"></script>

		<!-- custom js -->
		<script type="text/javascript" src="../js/loader.js"></script>
	</head>
	<body>
		<header>
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
						<p class="anchor-icon fa-arrow-right fa"></p>
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
				  					<img src="../images/school_owner_icon.png">
			  						Schools Owners
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
	            <li class="nav active"><a href="#">Dashboard</a>
	            </li>
	            <li class="nav"><a href="#">TMAU</a>
	            </li>
	            <li class="nav"><a href="#">Grades</a>
	            </li>
	          </ul>
	        </div>
	      </div>
	    </header>
	    <input class="ancor_sidebar ancor" id="sidebar_anchor" type="radio" checked="" name="ancor">
	    <div class="ancor"><p class="fa fa-arrow-left"></p></div>
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
				  <option value="volvo">Select Style</option>
				  <option value="saab">Judo</option>
				  <option value="mercedes">Karate</option>
				  <option value="audi">Free Style</option>
				</select>
			</div>

			<div class="list-container">
				<ul>
					<li class="active" onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="../images/default-user.png">
							<span class="name">Samuel Tarley</span>
							<span class="student_title">Judo</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="../images/default-user.png">
							<span class="name">Samuel Tarley</span>
							<span class="student_title">Judo</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="../images/default-user.png">
							<span class="name">Samuel Tarley</span>
							<span class="student_title">Judo</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="side-bar-footer">
				<ul>
					<li class="num-student"><b>1</b> student</li>
					<li class="add-student" data-toggle="modal" data-target=".bs-example-modal-lg3" style="position:absolute; right:5px; top:15px;">
						<span><a href="#">ADD INSTRUCTOR</a></span>
					</li>
				</ul>
			</div>
		</div>
		<input class="ancor_basecontainer ancor" type="radio" name="ancor">
	    <div class="ancor"><p class="fa fa-search"></p></div>
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
									        ykeys: ['iphone', 'ipad', 'itouch'],
									        labels: ['iPhone', 'iPad', 'iPod Touch'],
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
										            label: "Download Sales",
										            value: 12
										        }, {
										            label: "In-Store Sales",
										            value: 30
										        }, {
										            label: "Mail-Order Sales",
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
								<li><a href="#"> <img src="../images/initial-logo.png"> The Martial Arts University </a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Instructor Interface</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content" id="content2" style="display:none; opacity:0;">
				<div class="content-header">
					Student Profile
				</div>
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
						<div class="col-lg-4 info-field">
		    				<label>Birthdate</label>
							<div class="birthdate">6/7/2016</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Gender</label>
							<div class="gender">male</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Contact Number</label>
							<div class="contact_number">1-888-967-1530</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Street Address</label>
							<div class="street">59881 Gleason Ridge Apt. 114</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Zip</label>
							<div class="zip">87218</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Country</label>
							<div class="country">Man (Isle of)</div>
						</div>
			    		<div class="col-lg-4 info-field">
			    			<label>State</label>
							<div class="state">Port Saint Mary</div>
			    		</div>
			    		<div class="col-lg-4 info-field">
			    			<label>Suburb</label>
							<div class="city"></div>
			    		</div>
						<ul class="student-profile-options">
							<li>
								<div class="blue-bttn unick-bttn" id="tmau_create_acc" style="float:right">
									<a href="#" style="padding-left:50px;"> <img src="../images/logo.png"> <labelname>CREATE TMAU ACCOUNT</labelname> </a>
								</div>
							</li>
							<li>
								<div class="blue-bttn unick-bttn" id="tmau_reset_pass" style="float:right; display:none;">
									<a href="#" style="padding-left:30px;"><i class="fa fa-lock fa-2x"></i> <labelname>RESET TMAU PASSWORD</labelname> </a>
								</div>
							</li>
							<li>
								<div class="orange-bttn unick-bttn" onclick="showStudentEditProfile(true); showStudentViewProfile(false);" id="edit_student" style="float:right">
									<a href="#"> EDIT </a>
								</div>
							</li>
						</ul>
							<script type="text/javascript">
							$(document).ready(function(){
								var activated = false;

								$('#tmau_create_acc').click(function(){
									if(!activated)
									{
										this.getElementsByTagName('labelname')[0].innerHTML = "DEACTIVATE TMAU ACCOUNT";
										document.getElementById('tmau_reset_pass').style.display="block";
										this.className="red-bttn unick-bttn";
										activated = true;
									}
									else
									{
										this.getElementsByTagName('labelname')[0].innerHTML = "CREATE TMAU ACCOUNT";
										document.getElementById('tmau_reset_pass').style.display="none";
										this.className="blue-bttn unick-bttn";
										activated = false;
									}
								});
							});
							</script>
					</div>
				</div>
				<div class="col-lg-12 other_info" style="min-height:90%;">
					<div class="other_info_header">Other Info</div>
					<div class="other_content">
						<div class="row">
							<div class="col-lg-12">
								<div class="other_content_header">
									Classes
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text ">
									<table width="100%" class="responsive table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:12px;">
						                <thead>
						                    <tr>
						                        <th>Name</th>
						                        <th>Description</th>
						                        <th>Date Registered</th>
						                        <th>Number of Students</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr class="odd gradeX">
						                        <td>MMA</td>
						                        <td>A mixed martial arts school.</td>
						                        <td>July 10, 2014</td>
						                        <td>5</td>
						                    </tr>
						                    <tr class="odd gradeX">
						                        <td>KMA</td>
						                        <td>A mixed martial arts school.</td>
						                        <td>July 10, 2014</td>
						                        <td>5</td>
						                    </tr>
						                    <tr class="odd gradeX">
						                        <td>kMMA</td>
						                        <td>A mixed martial arts school.</td>
						                        <td>July 10, 2014</td>
						                        <td>5</td>
						                    </tr>
						                </tbody>
						            </table>
						            <script type="text/javascript">
						            	$('#dataTables-example').DataTable({
								 		responsive: true
									   });
						            </script>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="other_content_header">
									Students
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text ">
									<table width="100%" class="responsive table table-striped table-bordered table-hover" id="1dataTables-example" style="font-size:12px;">
						                <thead>
						                    <tr>
						                        <th>Name</th>
						                        <th>Age</th>
						                        <th>Date Registered</th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr class="odd gradeX">
						                        <td>Sam Tarly</td>
						                        <td>15</td>
						                        <td>July 12, 2011</td>
						                    </tr>
						                    <tr class="odd gradeX">
						                        <td>Sam Tarly</td>
						                        <td>15</td>
						                        <td>July 12, 2011</td>
						                    </tr>
						                    <tr class="odd gradeX">
						                        <td>Sam Tarly</td>
						                        <td>15</td>
						                        <td>July 12, 2011</td>
						                    </tr>
						                </tbody>
						            </table>
						            <script type="text/javascript">
						            	$('#1dataTables-example').DataTable({
								 		responsive: true
									   });
						            </script>
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
						</div>
					</div>
				</div>
				<div class="col-lg-12 other_info">
					<div class="other_info_header">
						<div class="content-footer">
							<ul class="nav">
								<li><a href="#"> <img src="../images/initial-logo.png"> The Martial Arts University </a></li>
								<li style="margin-top:20px;"> | </li>
								<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content" id="content3" style="display:none; opacity:0;">
				<div class="content-header">Update Student</div>
				<div class="profile-edit profile-view">
					<div class="col-lg-3 profile-pic">
						<div class="image-container">
							<img src="../images/default-user.png">
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

		<!-- modal popup for the updating student style-->
	    <div class="modal fade bs-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="style_edit_detail_container">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Update the rank of John</h3>
		    		</div>
		    		<div class="col-lg-4">
		    			<div class="belt belt-large" style="box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
							<ul>
								<li style="background:black;"></li>
								<li style="background:white;"></li>
								<li style="background:white;"></li>
								<li style="background:black;"></li>
							</ul>
						</div>
		    		</div>
		    		<div class="col-lg-8">
		    			<div class="form-group">
		    				<label>Style Name</label>
		    				<div class="style_name">
		    					Judo
		    				</div>
		    			</div>
		    			<div class="form-group">
		    				<label>Rank</label>
		    				<div class="style_name">
		    					White Belter
		    				</div>
		    				<div class="row">
			    				<div class="col-lg-6">
			    					<a class="unick-bttn bttn-w-icon orange-bttn">
					                    <i class="fa fa-arrow-circle-up"></i> Promote
					                </a>
			    				</div>
			    				<div class="col-lg-6">
			    					<a class="unick-bttn bttn-w-icon gray-bttn">
					                    <i class="fa fa-arrow-circle-down"></i> Demote
					                </a>
			    				</div>
			    			</div>
		    			</div>
		    		</div>
		    		<div class="rank_edit_bttn">
						<div class="green-bttn unick-bttn" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Changes </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- modal popup for the adding student style-->
	    <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" onclick="cancelChooseRank()" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="style_edit_detail_container" id="choose_style_panel">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Add a style for John</h3>
		    		</div>
		    		<div class="col-lg-12">
		    			<table class="table">
			                <thead>
			                    <tr>
			                    	<th style="text-align:left;">
			                    		Name of Style
			                    		<div class="form-group" style="float:right; margin-bottom:0px; vertical-align:top;">
			                    			<input class="form-control" type="text" placeholder="Search Style">
			                    		</div>
			                    	</th>
			                    </tr>
			                </thead>
			                <tbody>
								<tr onclick="chooseRank()">
									<td>Judo</td>
								</tr>
			                </tbody>
			            </table>
		    		</div>
		    	</div>
		    	<div class="style_edit_detail_container" id="choose_rank_panel" style="opacity:0px; display:none;">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Add a style for John</h3>
		    		</div>
		    		<div class="col-lg-4">
		    			<div class="belt belt-large" style="box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
							<ul>
								<li style="background:black;"></li>
								<li style="background:white;"></li>
								<li style="background:white;"></li>
								<li style="background:black;"></li>
							</ul>
						</div>
		    		</div>
		    		<div class="col-lg-8">
		    			<div class="form-group">
		    				<label>Style Name</label>
		    				<div class="style_name">
		    					Judo
		    				</div>
		    			</div>
		    			<div class="form-group">
		    				<label>Rank</label>
		    				<select class="style_rank" id="style_rank">
							  <option value="1">
							  	Black Belter
							  </option>
							  <option value="2">
							  	Yellow Belter
							  </option>
							  <option value="3">
							  	Brown Belter
							  </option>
							</select>
		    			</div>
		    		</div>
		    		<div class="rank_edit_bttn">
		    			<div class="gray-bttn unick-bttn" onclick="cancelChooseRank()" style="float:right">
							<i class="fa"> Cancel </i>
						</div>
						<div class="green-bttn unick-bttn" onclick="cancelChooseRank()" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Style </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- modal popup for the adding of student-->
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
							<i class="fa"> Save Student </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- modal popup for the updating of STUDENT RELATIONSHIP-->
	    <div class="modal fade bs-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="style_edit_detail_container">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Add Relationship</h3>
		    		</div>
		    		<div class="col-lg-4">
		    			<div class="col-lg-12">
			    			<div>
			    				<h4>Photo</h4>
			    			</div>
			    			<div class="image-container">
			    				<img src="../images/sample_relationship2.jpg">
			    				<div class="image-container-footer">
			    					<ul>
			    						<li>Change Photo</li>
			    					</ul>
			    				</div>
			    			</div>
			    		</div>
		    		</div>
		    		<div class="col-lg-8">
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
			    			<div class="form-group has-success has-feedback">
						          <input type="text" class="form-control" id="inputSuccess">
        						  <span class="glyphicon glyphicon-ok form-control-feedback"></span>
						    </div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group has-warning has-feedback">
						          <input type="text" class="form-control" id="inputWarning">
        						  <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
						    </div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group has-error  has-feedback">
						          <input type="text" class="form-control" id="inputError">
        						  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
						    </div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<input class="form-control" type="text" placeholder="Relationship">
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
			    				<h4>Set as:</h4>
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<select class="form-control">
			    					<option value="1">Emergency Contact</option>
			    					<option value="2">Bill Payer</option>
			    				</select>
			    			</div>
			    		</div>
		    		</div>
		    		<div class="rank_edit_bttn">
						<div class="green-bttn unick-bttn" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Relationship </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->
		<!-- modal popup for the adding of STUDENT RELATIONSHIP-->
	    <div class="modal fade bs-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<div class="style_edit_detail_container">
		    		<div class="col-lg-12">
		    			<h3 class="page-header">Add Relationship</h3>
		    		</div>
		    		<div class="col-lg-4">
		    			<div class="col-lg-12">
			    			<div>
			    				<h4>Photo</h4>
			    			</div>
			    			<div class="image-container">
			    				<img src="../images/default-user.png">
			    				<div class="image-container-footer">
			    					<ul>
			    						<li>Change Photo</li>
			    					</ul>
			    				</div>
			    			</div>
			    		</div>
		    		</div>
		    		<div class="col-lg-8">
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
			    				<input class="form-control" type="text" placeholder="Relationship">
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
			    				<h4>Set as:</h4>
			    			</div>
			    		</div>
			    		<div class="col-lg-6">
			    			<div class="form-group">
			    				<select class="form-control">
			    					<option value="1">Emergency Contact</option>
			    					<option value="2">Bill Payer</option>
			    				</select>
			    			</div>
			    		</div>
		    		</div>
		    		<div class="rank_edit_bttn">
						<div class="green-bttn unick-bttn" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Relationship </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- bootstrap javascript -->
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>

		<!-- js datepicker picker -->
		<script src="../js/moment.js"></script>
		<script src="../js/daterangepicker.js"></script>

		<script type="text/javascript">
		 $(document).ready(function(){

		 	var spinner = new loader();
			spinner.target("content1");

			$("#sample_alert").click(function(){
					spinner.open();
				});

				$("#sample_alert2").click(function(){
					spinner.close();
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


		 	// this code is code is for the simulation of the changing of style ranks
		 	$("#style_rank").change(function(){
		 		var value = document.getElementById("style_rank").value;
		 		var final_model1 = document.getElementById("final_model1");
		 		var final_model2 = document.getElementById("final_model2");

		 		if(value == 1)
		 		{
		 			final_model1.innerHTML = '<ul><li style="height:33.333%; background:black;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:black;"></li></ul>';
		 			final_model2.innerHTML = '<ul><li style="height:33.333%; background:black;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:black;"></li></ul>';
		 		}
		 		else if(value == 2)
		 		{
		 			final_model1.innerHTML = '<ul><li style="height:33.333%; background:#fdf78c;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#fdf78c;"></li></ul>';
		 			final_model2.innerHTML = '<ul><li style="height:33.333%; background:#fdf78c;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#fdf78c;"></li></ul>';
		 		}
		 		if(value == 3)
		 		{
		 			final_model1.innerHTML = '<ul><li style="height:33.333%; background:#c69c6d;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#c69c6d;"></li></ul>';
		 			final_model2.innerHTML = '<ul><li style="height:33.333%; background:#c69c6d;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#c69c6d;"></li></ul>';
		 		}
		 	});
			//end of code
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
				$('#sidebar_anchor').click();
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

		// this code is for the simulation for the adding of style
			function chooseRank()
			{
				var choose_style_panel = document.getElementById("choose_style_panel");
				var choose_rank_panel = document.getElementById("choose_rank_panel");

				choose_style_panel.style.opacity = 0;
				choose_rank_panel.style.display = "block";

				setTimeout(function(){
					choose_rank_panel.style.opacity = 1;
					setTimeout(function(){
						choose_style_panel.style.display = "none";
					},500);
				},10);
			}

			function cancelChooseRank()
			{
				var choose_style_panel = document.getElementById("choose_style_panel");
				var choose_rank_panel = document.getElementById("choose_rank_panel");

				choose_rank_panel.style.opacity = 0;
				choose_style_panel.style.display = "block";

				setTimeout(function(){
					choose_style_panel.style.opacity = 1;
					setTimeout(function(){
						choose_rank_panel.style.display = "none";
					},500);
				},10);
			}
			// end of code
		</script>
	</body>
</html>