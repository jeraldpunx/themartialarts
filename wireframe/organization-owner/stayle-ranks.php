<html>
	<head>

		<!-- this is for the website icon -->
		<link rel="shortcut icon" href="../images/logo-icon.ico">

		<title>Style and Ranks</title>

		<link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- bootstrap core css -->
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

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
						<input type="radio" name="user-option-anchor" style="position: absolute; width: 60px;height: 60px;top: 0px;right: 0px; opacity: 0; cursor:pointer;">
						<input type="radio" class="anchor-user-options" checked="" name="user-option-anchor">
						<p class="anchor-icon fa-arrow-right fa"></p>
						<div class="user-option-div">
							<div class="user-option-header">User Options</div>
							<ul>
				  				<li>
				  					<a href="dashboard-view-schools.php">
					  					<img src="../images/school_icon.png">
				  						Schools
				  					</a>
				  				</li>
				  				<li>
				  					<a href="dashboard-view-school-owner.php">
					  					<img src="../images/school_owner_icon.png">
				  						Schools Owners
				  					</a>
				  				</li>
				  				<li>
				  					<a href="dashboard-view-instructors.php">
					  					<img src="../images/instructor_icon.png">
				  						Instructors
				  					</a>
				  				</li>
				  				<li class="active">
				  					<a href="stayle-ranks.php">
					  					<img src="../images/sample-logo.png">
				  						Style and Ranks
				  					</a>
				  				</li>
				  				<li>
				  					<a href="dashboard-students.php">
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
	          </ul>
	        </div>
	      </div>
	    </header>

	    <div class="horizontal_content">
	    	<div class="container" id="sample">
	    		<div class="group_content">
	    			<div class="group_header">Styles and Ranks</div>
	    			<div class="group_tile">
	    				<div class="col-lg-2 tile">
	    					<div class="tile_close"><i class="fa-times fa"></i></div>
	    					<div class="tile_item" data-toggle="modal" data-target=".bs-example-modal-lg">
	    						<div class="tile_background">
	    							<i class="fa-pencil fa-2x fa"></i>
	    						</div>
	    						<div class="tile_header">Judo</div>
	    						<div class="tile_footer">1 Student</div>
	    					</div>	
	    				</div>
	    				<div class="col-lg-2 tile">
	    					<div class="tile_add" data-toggle="modal" data-target=".bs-example-modal-lg">
	    						<div class="tile_content">
	    							<i class="fa fa-plus"></i>
	    							<p>ADD NEW STYLE</p>
	    						</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>

	    <!-- popup -->
	    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content rs_edit_popup" style="background:#ececec;">
		    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
				<div class="col-lg-12" style="margin-top:15px;">
					<div class="style_name">
						<input type="text" name="style_name" placeholder="Style Name" value="Judo">
					</div>
				</div>
				<div class="main_container ranks_table">
					<table class="table" id="diagnosis_list">
		                <thead>
		                    <tr><th>Rank</th><th>Name of Rank</th><th>Belt</th></tr>
		                </thead>
		                <tbody>
							<tr onclick="view_rank()">
								<td class='priority'>1</td>
								<td>White Belter</td>
								<td>
									<div class="item_belt">
										<ul>
											<li style="height:33.333%; background:white;"></li>
											<li style="height:33.333%; background:white;"></li>
											<li style="height:33.333%; background:white;"></li>
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td class='priority'>2</td>
								<td>Red Belter</td>
								<td>
									<div class="item_belt">
										<ul>
											<li style="height:33.333%; background:red;"></li>
											<li style="height:33.333%; background:white;"></li>
											<li style="height:33.333%; background:red;"></li>
										</ul>
									</div>
								</td>
							</tr>
							<tr>
								<td class='priority'>3</td>
								<td>Yellow Belter</td>
								<td>
									<div class="item_belt">
										<ul>
											<li style="height:33.333%; background:yellow;"></li>
											<li style="height:33.333%; background:white;"></li>
											<li style="height:33.333%; background:yellow;"></li>
										</ul>
									</div>
								</td>
							</tr>
		                </tbody>
		            </table>
		            <div class="rank_edit_bttn">
						<div onclick="view_rank()" class="orange-bttn unick-bttn" style="float:left">
							<i class="fa-plus fa"> Add Rank </i>
						</div>
						<div onclick="" class="green-bttn unick-bttn" style="float:right">
							<i class="fa-plus fa"> Save Style and Ranks </i>
						</div>
					</div>
				</div>
				<div class="main_container rank_container_view">
					<div class="col-lg-12">
					</div>
					<div class="col-lg-3">
						<div class="belt_container">
							<div class="belt belt-large" id="final_model">
								<ul>
									<li style="height:100%; background:white;" class="primary_color"></li>
								</ul>
							</div>
							<center>Live Preview</center>
						</div>
					</div>
					<div class="col-lg-9">
						<div class="rank_name">
							<input type="text" name="rank_name" placeholder="Rank Name" value="White Belter">
						</div>
						<div class="color_pickers">
							<div class="col-lg-6">
								<span>Primary Color</span>
								<button class="jscolor {valueElement:'chosen-value1', onFineChange:'setTextColor1(this)'}"></button>
								<input type="text" id="chosen-value1" name="primary_color_input" value="FFFFFF">
							</div>
							<div class="col-lg-6">
								<span>Secondary Color</span>
								<button class="jscolor {valueElement:'chosen-value2', onFineChange:'setTextColor2(this)'}"></button>
								<input type="text" id="chosen-value2" name="secondary_color_input" value="FFFFFF">
							</div>
						</div>
						<div class="belt_patterns">
							<div class="row">
								<div class="col-lg-12">
									<div style="font-size:20px; padding:10px; padding-bottom:0px;">Choose Pattern</div>
									<div class="belt_container">
										<div class="belt belt-small active" onclick="chooseSolid(this)">
											<ul>
												<li style="height:100%; background:white;" class="primary_color"></li>
											</ul>
										</div>
										<center>Solid</center>
									</div>
									<div class="belt_container">
										<div class="belt belt-small" onclick="chooseDouble(this)">
											<ul>
												<li style="height:50%; background:white;" class="primary_color"></li>
												<li style="height:50%; background:white;" class="secondary_color"></li>
											</ul>
										</div>
										<center>Double</center>
									</div>
									<div class="belt_container">
										<div class="belt belt-small" onclick="chooseStripe(this)">
											<ul>
												<li style="height:33.333%; background:white;" class="secondary_color"></li>
												<li style="height:33.333%; background:white;" class="primary_color"></li>
												<li style="height:33.333%; background:white;" class="secondary_color"></li>
											</ul>
										</div>
										<center>Stripe</center>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="rank_edit_bttn">
						<div onclick="view_rank_table()" class="gray-bttn unick-bttn" style="float:right">
							<i class="fa">Cancel</i>
						</div>
						<div onclick="view_rank_table()" class="orange-bttn unick-bttn" style="float:right">
							<i class="fa-edit fa"> Save Rank </i>
						</div>
					</div>
				</div>
		    </div>
		  </div>
		</div>
		<!-- end of code -->

		<!-- bootstrap javascript -->
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>

		<!-- inline javascript code -->
		<script type="text/javascript">

			function view_rank()
			{
				document.getElementsByClassName("rank_container_view")[0].style.display="block";
				document.getElementsByClassName("ranks_table")[0].style.opacity="0";
				setTimeout(function(){
					document.getElementsByClassName("rank_container_view")[0].style.opacity="1";
				},10);
				setTimeout(function(){
					document.getElementsByClassName("ranks_table")[0].style.display="none";
				},500);
			}

			function view_rank_table()
			{
				document.getElementsByClassName("ranks_table")[0].style.display="block";
				document.getElementsByClassName("rank_container_view")[0].style.opacity="0";
				setTimeout(function(){
					document.getElementsByClassName("ranks_table")[0].style.opacity="1";
				},10);
				setTimeout(function(){
					document.getElementsByClassName("rank_container_view")[0].style.display="none";
				},500);
			}

			// these variable will contain the colors
			// they values are gray by default
			var primary_color = "#FFFFFF";
			var secondary_color = "#FFFFFF";
			var model_selected = 0;

			// these function will be triggered after the primary color is selected
			function setTextColor1(picker) {
				primary_color_change(picker.toString());
				primary_color = "#"+picker.toString();
			}

			// this function will be triggered after the secondary color is selected
			function setTextColor2(picker) {
				secondary_color_change(picker.toString());
				secondary_color = "#"+picker.toString();
			}

			// this code is used when the secondary color is changed
			function secondary_color_change(hex)
			{
				$(".secondary_color").css("background","#"+hex);
			}

			// this code is used when the primary color is changed
			function primary_color_change(hex)
			{
				$(".primary_color").css("background","#"+hex);
			}




			// this code is when the solid div is clicked
			function chooseSolid(element)
			{
				document.getElementById("final_model").innerHTML = element.innerHTML;
				model_selected = 1;

				$(".belt").removeClass("active");
				element.className="active belt belt-small";
			}

			// this code is when the double div is clicked
			function chooseDouble(element)
			{
				document.getElementById("final_model").innerHTML = element.innerHTML;
				model_selected = 2;
				$(".belt").removeClass("active");
				element.className="active belt belt-small";
			}

			// this code is when the stripe div is clicked
			function chooseStripe(element)
			{
				document.getElementById("final_model").innerHTML = element.innerHTML;
				model_selected = 3;
				$(".belt").removeClass("active");
				element.className="active belt belt-small";
			}


			// 
			// 
			// this code is used to alert the color's hex
			function showValues()
			{
				alert("primary_color:"+primary_color+",secondary_color:"+secondary_color+",selected model:"+model_selected);
			}

			$(document).ready(function(){
				// this code is for the draggable row
				//Helper function to keep table row from collapsing when being sorted
				

				var fixHelperModified = function(e, tr) {
					var $originals = tr.children();
					var $helper = tr.clone();
					$helper.children().each(function(index)
					{
					  $(this).width($originals.eq(index).width())
					});
					return $helper;
				};

				//Make diagnosis table sortable
				$("#diagnosis_list tbody").sortable({
			    	helper: fixHelperModified,
					stop: function(event,ui) {renumber_table('#diagnosis_list')}
				}).disableSelection();


				//Delete button in table rows
				$('table').on('click','.btn-delete',function() {
					tableID = '#' + $(this).closest('table').attr('id');
					r = confirm('Delete this item?');
					if(r) {
						$(this).closest('tr').remove();
						renumber_table(tableID);
						}
				});

				//Renumber table rows
				function renumber_table(tableID) {
					$(tableID + " tr").each(function() {
						count = $(this).parent().children().index($(this)) + 1;
						$(this).find('.priority').html(count);
					});
				}
			});
		</script>
	</body>
</html>