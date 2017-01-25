<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="images/logo-icon.ico">

		<title>Instructor Interface</title>

		<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<!-- datepicker core css -->
		<link rel="stylesheet" type="text/css" href="css/daterangepicker.css">

		<!-- datatables plugin css -->
		<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.responsive.css">

		<!-- jQuery -->
		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>

		<!-- for the charts js -->
		<script type="text/javascript" src="js/raphael-min.js"></script>
		<script type="text/javascript" src="js/morris-0.4.1.min.js"></script>

		<!-- my custom style -->
		<link rel="stylesheet" type="text/css" href="css/unick_style.css">
		<link rel="stylesheet" type="text/css" href="css/unick_library/input_style.css">
		<link rel="stylesheet" type="text/css" href="css/unick_library/loader.css">

		<!-- custom js -->
		<script type="text/javascript" src="js/loader.js"></script>
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
	            <li class="nav"><a href="#">Dashboard</a>
	            </li>
	            <li class="nav"><a href="#">TMAU</a>
	            </li>
	            <li class="nav active"><a href="#">Grades</a>
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
							<img src="images/default-user.png">
							<span class="name">Black Belt</span>
							<span class="student_title">10 STUDENTS</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="images/default-user.png">
							<span class="name">Yellow Belt</span>
							<span class="student_title">15 STUDENTS</span>
						</div>
					</li>
					<li onclick="showStudentViewProfile(true); showReports(false); showStudentEditProfile(false);">
						<div class="student">
							<img src="images/default-user.png">
							<span class="name">White Belt</span>
							<span class="student_title">12 STUDENTS</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="side-bar-footer">
				<ul>
					<li class="num-student" style="margin:0px; width:100%; text-align:center;"><b>3</b> ranks</li>
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
								<li><a href="#"> <img src="images/initial-logo.png"> The Martial Arts University </a></li>
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
					Rank Info
					<div class="close-panel-icon" onclick="showStudentViewProfile(false); showReports(true);"><i class="fa fa-times"></i></div>
				</div>
				<div class="profile-view">
					<div class="col-lg-3 profile-pic">
						<div class="belt belt-large" style="box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
							<ul>
								<li style="background:white;"></li>
								<li style="background:black;"></li>
								<li style="background:black;"></li>
								<li style="background:white;"></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 info-field">
						<div class="col-lg-12">
			    			<div class="form-group">
			    				<div class="name">Black with White Stripe Belt</div>
			    			</div>
			    		</div>
					</div>
					<div class="col-lg-9">
						<div class="col-lg-4">
		    				<label>Instructor</label>
							<div>Jaden Armstrong</div>
			    		</div>
			    		<div class="col-lg-4">
			    			<label>Schedule</label>
							<div>Monday to Friday 09:00am to 11:00pm</div>
			    		</div>
					</div>
				</div>
				<div class="col-lg-12 other_info" style="min-height:90%;">
					<div class="other_info_header">Other Info</div>
					<div class="other_content">
						<div class="row">
							<div class="col-lg-12">
								<div class="other_content_header">
									Students and Grades
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text ">
									<style type="text/css">
										.student_table tbody tr td
										{
											padding: 15px;
										}

										.student_table tbody tr td:first-child
										{
											position: relative;
										}

										.student_table tbody tr td a
										{
											text-decoration: none;
										}

										.student_table tbody tr td img
										{
											background:white;
											width: 50px;
											margin-right: 10px;
										}
									</style>
									<table width="100%" class="table table-striped table-bordered table-hover student_table" id="dataTables-example" style="font-size:12px;">
					                    <thead>
					                        <tr>
					                            <th>Student</th>
					                            <th>Grades</th>
					                            <th>Completed</th>
					                            <th>Score</th>
					                            <th>Calculated Grade</th>
					                            <th>Instructor Comment</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    	<tr>
					                    		<td><a href="#"><img src="images/default-user.png"> Abbott, Kyle</a></td>
					                    		<td style="text-align:center;"><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a></td>
					                    		<td>May 23, 2016 | 5:35pm</td>
					                    		<td>210</td>
					                    		<td>B-70%</td>
					                    		<td>He has a very good performance</td>
					                    	</tr>
					                    	<tr>
					                    		<td><a href="#"><img src="images/default-user.png">Abdala, Anna</a></td>
					                    		<td style="text-align:center;"><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a></td>
					                    		<td>May 23, 2016 | 5:35pm</td>
					                    		<td>210</td>
					                    		<td>B-70%</td>
					                    		<td>He has a very good performance</td>
					                    	</tr>
					                    	<tr>
					                    		<td><a href="#"><img src="images/default-user.png">Adhikari, Sasmit</a></td>
					                    		<td style="text-align:center;"><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a></td>
					                    		<td>May 23, 2016 | 5:35pm</td>
					                    		<td>210</td>
					                    		<td>B-70%</td>
					                    		<td>He has a very good performance</td>
					                    	</tr>
					                    	<tr>
					                    		<td><a href="#"><img src="images/default-user.png">Anderson, Mitch</a></td>
					                    		<td style="text-align:center;"><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-edit"></i></a></td>
					                    		<td>May 23, 2016 | 5:35pm</td>
					                    		<td>210</td>
					                    		<td>B-70%</td>
					                    		<td>He has a very good performance</td>
					                    	</tr>
					                    </tbody>
					                </table>
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
				<div class="content-header">Update Student</div>
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
		<!-- modal popup for the adding of student-->
	    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec; height:600px;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		    	<h3 class="page-header" style="margin-top:10px; padding:10px;">Kyle's Black Belt: Grade</h3>
		    	<div class="style_edit_detail_container" style="margin-top:57px; padding-top:10px;">
		    		<div class="col-lg-12">
		    			<style type="text/css">

		    				/*table grading rubic style*/
		    				.grading_table tbody tr:hover
		    				{
		    					background: none!important;
		    				}

		    				.grading_table tbody tr td:hover
		    				{
		    					background:#A0CAA1;
		    				}

		    				.grading_table tbody tr td:first-child:hover
		    				{
		    					background: none;
		    				}

		    				.grading_table tr > td, .grading_table tr > th
		    				{
		    					padding: 10px!important;
		    					text-align: center;
		    				}

		    				.grading_table tbody tr > td
		    				{
		    					width: 20%;
		    					padding: 10px;
		    					cursor: pointer;
		    				}

		    				.grading_table tbody tr > td
		    				{
		    					background: white;
		    				}

		    				.grading_table tr > td:first-child
		    				{
		    					width: 40%;
		    					cursor: default;
		    					background: none;
		    				}

		    				.grading_table tr > td, .grading_table tr > th
		    				{
		    					border:1px solid #A0A0A0;
		    				}

		    				.grading_table thead tr:first-child > td:first-child
		    				{
		    					border:0px;
		    				}
		    				/*end of table style*/
		    			</style>
		    			<div class="col-lg-4">
		    				<label>Student</label>
		    				<img src="images/default-user.png" style="width:100%; background:white;">
		    				<a href="#" style="text-decoration:none; width:100%; color:white;">
		    					<p style="font-weight:bold; background:#B3ADAD; padding:10px;">
		    						Kyle Abbott
		    					</p>
		    				</a>
		    			</div>
		    			<div class="col-lg-8">
		    				<div class="form-group">
		    					<label>Grade</label>
		    					<input type="text" class="form-control">
		    				</div>
		    				<div class="form-group">
		    					<label>Comment</label>
		    					<textarea  class="form-control" style="min-height:200px;"></textarea>
		    				</div>
		    			</div>
		    			<div class="col-lg-12" style="border-top:1px solid #cecece; margin:10px 0px; padding-top:10px;">
		    				<label>Rubic</label>
		    				<table width="100%" class="grading_table" id="grading_table" style="font-size:12px;">
			                    <thead>
			                    	<tr>
			                    		<td></td>
			                    		<td colspan="3" style="background:white;">Ratings</td>
			                    	</tr>
			                        <tr>
			                            <th style="background:white;">Criteria</th>
			                            <th>
			                            	PASSED
			                            </th>
			                            <th>
			                            	FAILED
			                            </th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	<tr>
			                    		<td>
			                    			Basics
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    	<tr>
			                    		<td>
			                    			Kata
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    	<tr>
			                    		<td>
			                    			Self Defence
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    	<tr>
			                    		<td>
			                    			Sparring
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    	<tr>
			                    		<td>
			                    			Fitness
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    	<tr>
			                    		<td>
			                    			Application
			                    			<center>(50 points)</center>
			                    		</td>
			                    		<td><center>-</center></td>
			                    		<td><center>-</center></td>
			                    	</tr>
			                    </tbody>
			                </table>
		    			</div>
		                <script type="text/javascript">
		                	$(document).ready(function(){

		                		var grading_table = document.getElementById('grading_table').getElementsByTagName('tbody')[0];

		                		var rows = grading_table.getElementsByTagName('tr');

		                		for(var y = 0; y < rows.length; y++)
		                		{
		                			for(var x = 1; x < rows[y].getElementsByTagName('td').length; x++)
		                			{
		                				$(rows[y].getElementsByTagName('td')[x]).click(function()
		                					{
		                						rows1 = this.parentNode.getElementsByTagName('td');
		                						for(var z = 0; z < rows1.length; z++)
		                						{
		                							rows1[z].style.background = "";
		                						}
		                						this.style.background = "#cecece";
		                					}
		                					);
		                			}
		                		}

					         });
		                </script>
		            </div>
		    		<div class="rank_edit_bttn">
						<div class="green-bttn unick-bttn" data-dismiss="modal" aria-label="Close" style="float:right">
							<i class="fa"> Save Grades </i>
						</div>
					</div>
		    	</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

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