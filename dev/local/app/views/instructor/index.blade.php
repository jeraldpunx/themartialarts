@extends('instructor.layout')

@section('content')
<input id="sidebar-ancor" class="ancor_sidebar ancor" type="radio" checked="" name="ancor">
<div class="ancor"><p class="fa fa-arrow-left"></p></div>
<div class="sidebar">
	<div class="search-box">
		<input type="text" name="search_name" placeholder="Search">
		<p class="fa-search fa"></p>
	</div>

	<div class="side-bar-settings">
		<div id="filter" data-toggle="modal" data-target=".filter_search" style="background:#999; cursor:pointer; font-size:9px;position:absolute; margin-top:3px; margin-left:3px; padding:3px;"><i class="fa-filter fa"></i> FILTER</div>
		<ul class="custom_radio_input">
			<li>
				<input id="ALL" type="radio" value="2" name="isActive"><label for="ALL">ALL</label>
			</li>
			<li>
				<input id="ACTIVE" type="radio" value="1" name="isActive" checked="checked"><label for="ACTIVE">ACTIVE</label>
			</li>
			<li>
				<input id="INACTIVE" type="radio" value="0" name="isActive"><label for="INACTIVE">INACTIVE</label>
			</li>
		</ul>
		<select name="style">
			<option value="">- Select Style -</option>
			<option value="none">None</option>
			<?php $style_names = [] ?>
			@foreach($styles as $style)
			@if(!in_array($style->name, $style_names))
			<?php array_push($style_names, $style->name) ?>
			<option>{{ $style->name }}</option>
			@endif
			@endforeach
		</select> 
	</div>

	<div class="list-container">
		<ul id="students">
		<?php $student_ids = [] ?>
		@foreach($students as $student)
			@if(!in_array($student->id, $student_ids))
			<?php array_push($student_ids, $student->id) ?>
			<li class="student" 
				data-id="{{ $student->id }}" 
				data-fullname="{{ $student->first_name }} {{ $student->last_name }}" 
				data-firstname="{{ $student->first_name }}" 
				data-lastname="{{ $student->last_name }}" 
				data-isactive="{{ $student->isActive }}" 
				data-style="{{ !empty($student->ranks->first()->style) ? $student->ranks->first()->style->name : "none" }}">
				<img class="picture" src="{{ URL::Route('home') . "/" . $student->picture }}">
				<span class="name">{{ $student->first_name }} {{ $student->last_name }}</span>
				<span class="student_title">{{ !empty($student->ranks->first()->style) ? $student->ranks->first()->style->name : "None" }}</span>
			</li>
			@endif
		@endforeach
		</ul>
	</div>
	<div class="side-bar-footer">
		<ul>
			<li class="num-student">
				<b id="student-count">{{ count($students) }}</b> student
			</li>
			<li class="add-student" style="position:absolute; right:5px; top:15px;">
				<span id="add_student">ADD NEW STUDENT</span>
			</li>
		</ul>
	</div>
</div>

<input class="ancor_basecontainer ancor" type="radio" name="ancor">
<div class="ancor"><p class="fa fa-search"></p></div>
<div class="base-container" id="base-container">

	<div class="main-content" id="landing_page" style="display: none;">
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
						</div>
					</div>
					<div class="col-lg-6">
						<div class="other_content_header">
							Attendance
						</div>
						<div class="content_text ">
							<div id="area-example"></div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="other_content_header">
							Others
						</div>
						<div class="content_text ">
							<div id="morris-area-chart"></div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="other_content_header">
							Donut Chart
						</div>
						<div class="content_text ">
							<div id="morris-donut-chart"></div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="col-lg-12 other_info">
			<div class="other_info_header">
				<div class="content-footer">
					<ul class="nav">
						<li><a href="#"> <img src="{{asset('assets/images/logo.png')}}"> The Martial Arts University </a></li>
						<li style="margin-top:20px;"> | </li>
						<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>



	<div class="main-content" id="view-student-profile" data-student_id="" style="display: none;">
		<div class="content-header">Student Profile</div>
		<div class="profile-view">
			<div class="col-lg-3 profile-pic">
				<img class="picture" src="{{ asset('assets/images/default-user.png') }}">
			</div>
			<div class="col-lg-9 info-field">
				<div class="col-lg-12">
	    			<div class="form-group">
	    				<div class="name"><span class="first_name">first_name</span> <span class="last_name">last_name</span></div>
	    			</div>
	    		</div>
			</div>
			<div class="col-lg-9">
				<div class="col-lg-4">
	    			<label>Contact Number</label>
					<div class="contact_number">contact_number</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>Email</label>
					<div class="email">email</div>
	    		</div>
				<div class="col-lg-4">
    				<label>Birthdate</label>
					<div class="birthdate">birthdate</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>Gender</label>
					<div class="gender">gender</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>Street Address</label>
					<div class="street">street</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>Suburb</label>
					<div class="city">Suburb</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>State</label>
					<div class="state">state</div>
	    		</div>
	    		<div class="col-lg-4">
	    			<label>Country</label>
					<div class="country">country</div>
				</div>
				<div class="col-lg-4">
	    			<label>Zip Code</label>
					<div class="zip">zip</div>
	    		</div>
				<ul class="student-profile-options">
					<li>
						<div class="blue-bttn unick-bttn" id="edit_student" style="float:right">
							<a href="#"> EDIT </a>
						</div>
					</li>
					<li>
						<div class="red-bttn unick-bttn" id="tmau_reset_pass" style="float:right;">
							<a href="#"  data-toggle="modal" data-target="#deleteStudentModal" class="delete_student"><labelname>Delete</labelname> </a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-12 other_info" style="min-height:90%;">
			<div class="other_info_header">Other Info</div>
			<div class="other_content">
				<div class="row">
					<div class="col-lg-12">
						<div class="other_content_header">
							Student Styles and Ranks
						</div>
						<div class="content_text" id="styles-and-ranks">
						</div>
					</div>
					<div class="col-lg-12">
						<div class="other_content_header">
							Relationships
						</div>

						<div class="content_text">
							<div class="student-relationships">				
							</div>

							<div class="col-lg-2 tile">
								<div class="tile_add tile_add_relationship" data-toggle="modal" data-target="#relationshipModal">
									<div class="tile_content">
										<i class="fa fa-plus"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-12">
						<div class="other_content_header">Status Details</div>
						<div class="content_text">
							He has recently joined a <b>Judo</b> class.
						</div>
						<div class="content_text">
							He joined the school on <b>July 18, 2015</b>.
						</div>
					</div>
					<div class="col-lg-12">
						<div class="other_content_header">Recent Activity</div>
						<div class="content_text">
							<div class="col-lg-3"><b>22 july 2016</b></div>
							<div class="col-lg-9">Status changed to Student</div>
							<div class="col-lg-3"><b>22 july 2016</b></div>
							<div class="col-lg-9">Ranked black belter in Judo</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-12 other_info">
			<div class="other_info_header">
				<div class="content-footer">
					<ul class="nav">
						<li><a href="#"> <img src="{{asset('assets/images/logo.png')}}"> The Martial Arts University </a></li>
						<li style="margin-top:20px;"> | </li>
						<li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="main-content" id="edit-student-profile" style="display: none;">
		<div class="content-header">Update Student</div>
		<div class="profile-edit profile-view">
			<form id="edit-student-profile-form" enctype="multipart/form-data" autocomplete="off" action="" method="POST" role="form">
				<input type="hidden" value="" name="id">
				<div class="col-lg-3 profile-pic">
					<div class="image-container">
						<img class="picture" src="images/default-user.png">

						<div class="image-container-footer">
							<ul>
								<li onClick="document.getElementById('picture_upload').click()">Upload Picture <input type="file" id="picture_upload" name="picture_file" style="display:none" /></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="col-lg-12" style="height:30px; margin-top:10px;">
						<div class="col-md-6 col-md-offset-6">
	                        <div class="material-switch pull-right">
	                        	<span class="isActiveLabel">Active: </span>
	                            <input id="isActive" name="isActive" type="checkbox" checked="true" />
	                            <label for="isActive" class="orange-bttn"></label>
	                        </div>
	                    </div>
					</div>
					


					<div class="col-lg-12">
						<div class="form-group col-lg-6">
							<label>First Name *</label>
							<input class="form-control" type="text" placeholder="First Name" name="first_name" />
						</div>
						<div class="form-group col-lg-6">
							<label>Last Name *</label>
							<input class="form-control" type="text" placeholder="Last Name" name="last_name" />
						</div>
						<div class="form-group col-lg-4">
							<label>Birthday *</label>
							<input class="form-control date" type="text" placeholder="MM/DD/YYYY" name="birthdate" />
						</div>
						<div class="form-group col-lg-4">
							<label>Gender *</label>
							<select class="form-control" name="gender">
								<option value="" selected>- Select Gender -</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label>Contact Number *</label>
							<input class="form-control" type="text" placeholder="Contact Number" name="contact_number" />
						</div>
						<div class="form-group col-lg-8">
							<label>Street Address *</label>
							<input class="form-control" type="text" placeholder="Street Address" name="street" />
						</div>
						<div class="form-group col-lg-4">
							<label>Email *</label>
							<input class="form-control" type="text" placeholder="Email" name="email" />
						</div>
						<div class="form-group col-lg-3">
							<label>Country *</label>
							<select class="form-control" name="country">
								<option value="" selected>- Select Country -</option>
								@foreach($countries as $country)
								<option data-id="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-lg-3">
							<label>State *</label>
							<select class="form-control" name="state">
								<option value="" selected>- Select State -</option>
							</select>
						</div>
						<div class="form-group col-lg-4">
							<label>Suburb</label>
							<input class="form-control" type="text" name="city" placeholder="Suburb Name">
						</div>
						<div class="form-group col-lg-2">
							<label>ZIP Code *</label>
							<input class="form-control" type="text" placeholder="ZIP Code" name="zip" />
						</div>
					</div>

				</div>

				<div class="col-lg-12 other_info" style="min-height:50%;">
					<div class="other_info_header">Other Info</div>
					<div class="other_content col-md-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="other_content_header">
									Styles and Ranks
								</div>
							</div>
							<div class="col-lg-12">
								<div class="content_text">
									<div class="student-styles">
										<!-- STUDENT STYLES -->
									</div>

									<div class="col-lg-2 tile">
										<div class="tile_add tile_add_style" data-toggle="modal" data-target="#styleModal">
											<div class="tile_content">
												<i class="fa fa-plus"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12" style="min-height:50px; border-top:1px solid #cecece;">
					<div class="col-md-2 col-md-offset-10">
						<div class="col-lg-6">
							<div id="submit_add_or_edit_student" class="orange-bttn unick-bttn" style="margin:0px; margin-top:5px;">
								<i class="fa"><a href="#"> Save </a></i>
							</div>
						</div>
						<div class="col-lg-6">
							<div data-toggle="modal" data-target="#deleteStudentModal" class="red-bttn unick-bttn delete_student" style="margin:5px 0px;">
								<i class="fa"><a href="#"> Delete </a></i>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- STYLE & RANK DUMMY HTML -->
<div id="student-styles-dummy" style="display: none">
	<div class="col-lg-2 student_style_tile normal">
		<input type="hidden" name="ranks[]" value="">
		<div class="style_close" data-styleid="" data-rankid="" data-toggle="modal" data-target="#removeStyleModal"><i class="fa-times fa"></i></div>
		<div class="style_item edit-style" data-styleid="" data-rankid="" data-toggle="modal" data-target="#styleModal">
			<div class="style_shade">
				<i class="fa-pencil fa-2x fa"></i>
			</div>
			<div class="style_header"><!-- Style Name --></div>
			<div class="style_content">
				<div class="belt belt-xm" id="final_model1">
					<ul>
						<li class="layer1" style="background:black;"></li>
						<li class="layer2" style="background:white;"></li>
						<li class="layer3" style="background:white;"></li>
						<li class="layer4" style="background:black;"></li>
					</ul>
				</div>
			</div>
			<div class="style_footer">
				<i class="fa"><img src="{{ asset('assets/images/karate_icon.png') }}" width="100%;"></i><span class="rank-name"><!-- STYLE RANK --></span>
			</div>
		</div>
	</div>
</div>

<div id="student-relation-dummy" style="display: none">
	<div class="col-lg-2 student_style_tile normal">
		<div class="style_close" data-relationshipid="" data-toggle="modal" data-target="#removeRelationshipModal">
			<i class="fa-times fa"></i>
		</div>
		<div class="style_item edit-relationship" data-relationshipid="" data-toggle="modal" data-target="#editRelationshipModal">
			<div class="style_shade">
				<i class="fa-pencil fa-2x fa"></i>
			</div>
			<div class="style_header"><!-- RELATION TYPE --></div>
			<div class="style_content">
				<div class="belt belt-xm" id="final_model1">
					<i class="fa-dollar fa-2x fa"></i>
				</div>
			</div>
			<div class="style_footer" style="padding: 5px 10px;">
				<!-- RELATION NAME -->
			</div>
		</div>
	</div>
</div>

<!-- DELETE STUDENT Modal -->
<div id="deleteStudentModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to delete this Student?</h4>
			</div>
			<div class="modal-body" >
					<p><span class="text-danger lead">Warning</span>: Deleting <span class="text-primary lead name"></span> is permanent and can't be undone. All records and associated information will be removed. </p>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<button class="btn btn-danger delete" data-id="">
						Delete
					</button>
					<a class="btn btn-default" data-dismiss="modal">
						Cancel
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF DELETE STUDENT MODAL -->


<!-- FILTER Modal -->
<div id="filterSearchModal" class="modal fade filter_search" role="dialog">
	<div class="modal-dialog">
		<form>
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-filter"></i> Profile Search</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" value="{{ Input::get('first_name') }}">
						</div>
						<div class="form-group col-md-6">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" value="{{ Input::get('last_name') }}">
						</div>
						<div class="col-md-6">
							<p><strong>Age</strong></p>
							<div class="row">
								<div class="form-group col-md-5 col-md-1-offset">
									<input type="text" class="form-control" placeholder="From" name="age_start" value="{{ Input::get('age_start') }}">
								</div>
								<div class="col-md-1">
									-
								</div>
								<div class="form-group col-md-5">
									<input type="text" class="form-control" placeholder="To" name="age_end" value="{{ Input::get('age_end') }}">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<p><strong>Gender</strong></p>
						    <div class="btn-group" data-toggle="buttons">
						        <label class="btn btn-default {{ (Input::get('gender') == '' ) ? 'active' : '' }}">
						        	<input type="radio" name="gender" value="" {{ (Input::get('gender') == '' ) ? 'checked="checked"' : '' }}>All
						        </label>
						        <label class="btn btn-default {{ (Input::get('gender') == 'male' ) ? 'active' : '' }}">
						        	<input type="radio" name="gender" value="male" {{ (Input::get('gender') == 'male' ) ? 'checked="checked"' : '' }}>Male
						        </label>
						        <label class="btn btn-default {{ (Input::get('gender') == 'female' ) ? 'active' : '' }}">
						        	<input type="radio" name="gender" value="female" {{ (Input::get('gender') == 'female' ) ? 'checked="checked"' : '' }}>Female
						        </label>
						    </div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="buttons">
						<a href="{{ URL::route('instructor_home') }}" class="btn btn-default">Clear Filters</a>
						<button class="btn btn-success save" data-id="">Search Filters</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- PROMOTE STYLE Modal -->
<div id="promoteStyleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to promote this style?</h4>
			</div>
			<div class="modal-body" >
				<div class="row">
					<div class="panel-rank col-md-12">
						<div class="col-lg-4">
							<div class="belt belt-large" style="width: 100%; box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
								<ul>
									<li class="layer1" style="background:black;"></li>
									<li class="layer2" style="background:white;"></li>
									<li class="layer3" style="background:white;"></li>
									<li class="layer4" style="background:black;"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="form-group">
								<label>Rank</label>
								<select disabled class="style_rank form-control" id="style_rank">
								</select>
							</div>
							<div class="form-group">
								<button class="btn btn-block btn-success promote" data-rankid="">Promote</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF PROMOTE STYLE MODAL -->

<!-- STYLE Modal -->
<div id="styleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Select Style</h4>
			</div>
			<div class="modal-body" >
				<div class="row">
					<div class="panel-style col-md-12">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered style" style="width:100%;">
							<thead>
								<tr>
									<th>Style</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $modal_style_names = [] ?>
								@foreach($styles as $style)
								@if(!in_array($style->name, $modal_style_names))
								<?php array_push($modal_style_names, $style->name) ?>
								<tr>
									<td>{{ $style->name }}</td>
									<td><a href="#" class="btn btn-default select-style" data-id="{{ $style->id }}">Select</a></td>
								</tr>
								@endif
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="panel-rank col-md-12" style="display: none">
						<div class="col-lg-4">
							<div class="belt belt-large" style="width: 100%; box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
								<ul>
									<li class="layer1" style="background:black;"></li>
									<li class="layer2" style="background:white;"></li>
									<li class="layer3" style="background:white;"></li>
									<li class="layer4" style="background:black;"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="form-group">
								<label>Rank</label>
								<select class="style_rank form-control" id="style_rank">
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<a class="btn btn-warning pull-left back">
						<i class="fa fa-arrow-left"></i> Back
					</a>
					<button class="btn btn-success save">
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF STYLE MODAL -->

<!-- REMOVE STYLE Modal -->
<div id="removeStyleModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Are you sure you want to remove this Style?</h4>
			</div>
			<div class="modal-body" >
				<div class="row">
					<div class="panel-rank col-md-12">
						<div class="col-lg-4">
							<div class="belt belt-large" style="width: 100%; box-shadow: 0 6px 12px rgba(0,0,0,.175);" id="final_model2">
								<ul>
									<li class="layer1" style="background:black;"></li>
									<li class="layer2" style="background:white;"></li>
									<li class="layer3" style="background:white;"></li>
									<li class="layer4" style="background:black;"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="form-group">
								<label>Rank</label>
								<select disabled class="style_rank form-control" id="style_rank">
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<button class="btn btn-danger remove">
						Remove
					</button>
					<a class="btn btn-default" data-dismiss="modal">
						Cancel
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF REMOVE STYLE MODAL -->



<!-- RELATIONSHIP Modal -->
<div id="relationshipModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Relationship</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="panel-type col-md-6 col-md-offset-3">
						<center>
							<button class="btn btn-success new">New Guardian</button>
							<p>or</p>
							<input type="text" name="existing_user" class=" exist" placeholder="Search existing user">
						</center>
					</div>
					<form>
						<div class="panel-data col-md-12" style="display: none">
							<div class="form-group col-lg-6">   
								<label>First Name</label>
								<input class="form-control" type="text" placeholder="First Name" name="first_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Last Name</label>
								<input class="form-control" type="text" placeholder="Last Name" name="last_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Contact Number</label>
								<input class="form-control" type="text" placeholder="Contact Number" name="contact_number" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Email</label>
								<input class="form-control" type="email" placeholder="Email" name="email" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Type</label>
								<select name="type" class="form-control" required>
									<option value="">-Select Relationship Type-</option>
									<option>Payer</option>
									<option>Emergency Contact</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<a class="btn btn-warning pull-left back">
						<i class="fa fa-arrow-left"></i> Back
					</a>
					<button class="btn btn-success save" data-id="">
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF RELATIONSHIP MODAL -->

<!-- EDIT RELATIONSHIP Modal -->
<div id="editRelationshipModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Relationship</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form>
						<div class="panel-data col-md-12" style="display: none">
							<div class="form-group col-lg-6">   
								<label>First Name</label>
								<input class="form-control" type="text" placeholder="First Name" name="first_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Last Name</label>
								<input class="form-control" type="text" placeholder="Last Name" name="last_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Contact Number</label>
								<input class="form-control" type="text" placeholder="Contact Number" name="contact_number" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Email</label>
								<input class="form-control" type="email" placeholder="Email" name="email" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Type</label>
								<select name="type" class="form-control" required>
									<option value="">-Select Relationship Type-</option>
									<option>Payer</option>
									<option>Emergency Contact</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<button class="btn btn-success save" data-id="">
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF EDIT RELATIONSHIP MODAL -->

<!-- REMOVE RELATIONSHIP Modal -->
<div id="removeRelationshipModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Relationship</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form>
						<div class="panel-data col-md-12">
							<div class="form-group col-lg-6">   
								<label>First Name</label>
								<input class="form-control" type="text" placeholder="First Name" name="first_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Last Name</label>
								<input class="form-control" type="text" placeholder="Last Name" name="last_name" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Contact Number</label>
								<input class="form-control" type="text" placeholder="Contact Number" name="contact_number" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Email</label>
								<input class="form-control" type="email" placeholder="Email" name="email" required/>
							</div>
							<div class="form-group col-lg-6">
								<label>Type</label>
								<select name="type" class="form-control" required>
									<option value="">-Select Relationship Type-</option>
									<option>Payer</option>
									<option>Emergency Contact</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<div class="buttons">
					<button class="btn btn-success remove" data-id="">
						Delete
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END OF REMOVE RELATIONSHIP MODAL -->







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
							<img src="images/sample_relationship2.jpg">
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
<!-- modal popup for the adding of STUDENT RELATIONSHIP-->
<div class="modal fade bs-example-modal-lg5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content rs_edit_popup" style="background:#ececec;">
			<div class="popup-close" data-dismiss="modal" aria-label="Close">
				<span class="fa fa-times"></span>
			</div>
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
							<img src="images/default-user.png">
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
@endsection



@section('script')
<script type="text/javascript">
	$("#landing_page").show();



var school_country = '{{ $school->country }}';
var school_state = '{{ $school->state }}';

updateFilter();

//FILTER SEARCH
$(document).on('input', 'input[type=text][name=search_name]', updateFilter);
$(document).on('change', 'input[type=radio][name=isActive]', updateFilter);
$(document).on('change', 'select[name=style]', updateFilter);

function updateFilter(){
	var fullname = $('input[type=text][name=search_name').val();
	var isActive = $('input[type=radio][name=isActive]:checked').val();
	var style 	 = $('select[name=style]').val();

	searchStudent(fullname, +isActive, style);
}

function searchStudent(fullname, isActive, style) {
	var student_count = 0;
	$(".list-container ul li").each(function() {
		if ($(this).data('fullname').search(new RegExp(fullname, "i")) < 0 
			|| (isActive !== 2 && +$(this).data('isactive') !== isActive)
			|| (style !== "" && $(this).data('style') !== style)) {
			$(this).hide();
	} else {
		$(this).show();
		student_count++;
	}
});
	$("#student-count").html(student_count);
}
//END OF FILTER SEARCH

// COUNTRIES, STATES AND CITIYES ON CHANGE
$('#edit-student-profile').on('change', 'select[name=country]', function(event, state){
	var country_id = $(this).find(':selected').data('id');
	var $div = $("#edit-student-profile");

	var options = '<option value="" data-id="">- Select State -</option>';

	$.ajax({
		type: "GET",
		url: "{{ URL::route('json/getStateByCountry') }}",
		data: { country_id: country_id }
	}).done(function( result ) {
		$(result).each(function(){
			options += '<option data-id="'+ this.id +'">'+ this.state_name +'</option>';
		});
		$div.find("select[name=state]").html(options);
		
		if(state) {
			$div.find("select[name=state]").val(state);
		}
	});
});

// $('#edit-student-profile').on('change', 'select[name=state]', function(){
// 	var state_id = $(this).find(':selected').data('id');
// 	var $div = $("#edit-student-profile");

// 	var options = '<option value="" data-id="">- Select City -</option>';

// 	$.ajax({
// 		type: "GET",
// 		url: "{{ URL::route('json/getCityByState') }}",
// 		data: { state_id: state_id }
// 	}).done(function( result ) {
// 		$(result).each(function(){
// 			options += '<option data-id="'+ this.id +'">'+ this.city_name +'</option>';
// 		});
// 		$div.find("select[name=city]").html(options);
// 	});
// });
// END COUNTRIES, STATES AND CITIYES ON CHANGE

// ADD / EDIT STUDENT
$(document).on('change', '#picture_upload', function(e){

	if (this.files && this.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#edit-student-profile .picture').attr('src', e.target.result);
		}

		reader.readAsDataURL(this.files[0]);
	}
});

$("#edit-student-profile").on("change", "#isActive", function(e){	
	$("#edit-student-profile").find(".isActiveLabel").html(($(this).is(":checked")) ? "Active: " : "Inactive: ").hide().fadeIn('fast');
});

var clicked_tr_edit = null;
$(document).on('click', '#add_student', function(e){
	e.preventDefault();
	e.stopPropagation();

	clicked_tr_edit = null;

	$('#sidebar-ancor').click();
	$(".sidebar .student").removeClass("active");

	var $div = $("#edit-student-profile");

	$div.find(".content-header").html("Add New Student");
	$div.find("input[name=id]").val(null);

	$div.find(".picture").attr("src", "{{ asset('assets/images/default-user.png') }}");
	$div.find("input[name=picture_file]").val("");
	$div.find("input[name=first_name]").val("");
	$div.find("input[name=last_name]").val("");
	$div.find("input[name=birthdate]").val("");
	$div.find("select[name=gender]").val("");
	$div.find("input[name=contact_number]").val("");
	$div.find("input[name=email]").val("");
	$div.find("select[name=country]").val(school_country).trigger("change", school_state);
	// $div.find("select[name=country]").val("");
	// $div.find("select[name=state]").html('<option value="" data-id="">- Select State -</option>');
	// $div.find("select[name=city]").html('<option value="" data-id="">- Select City -</option>');
	$div.find("input[name=city]").val("");
	$div.find("input[name=street]").val("");
	$div.find("input[name=zip]").val("");
	$div.find("#isActive").prop('checked', true);
	$div.find(".isActiveLabel").html("Active: ");

	$div.find(".student-styles").html("");
	$(".main-content").hide();
	$div.show();
});

var view_edit_student_request;
$(document).on('click', '#edit_student', function(e){
	e.preventDefault();
	e.stopPropagation();

	var $div = $("#edit-student-profile");
	var target = $("#view-student-profile")[0];
	var spinner = new loader();
	spinner.target(target);

	var id = $(this).data('id');
	$div.find(".content-header").html("Update Student");

	if(view_edit_student_request && view_edit_student_request.readyState != 4){
		view_edit_student_request.abort();
		spinner.close();
	}


	view_edit_student_request = $.get('{{ URL::route('instructor_json_showStudent') }}', {id: id}).done( function(data){
		$div.find(".delete_student").data('id', data.student.id);

		$div.find("input[name=id]").val(data.student.id);
		$div.find(".picture").attr("src", "{{ URL::to('/')  }}/" + data.student.picture);
		$div.find("input[name=picture_file]").val("");
		$div.find("input[name=first_name]").val(data.student.first_name);
		$div.find("input[name=last_name]").val(data.student.last_name);
		var birthdate = new Date(data.student.birthdate);
		birthdate = (birthdate.getMonth() + 1) + '/' + birthdate.getDate() + '/' +  birthdate.getFullYear();
		$div.find("input[name=birthdate]").val(birthdate);
		$div.find("select[name=gender]").val(data.student.gender);
		$div.find("input[name=contact_number]").val(data.student.contact_number);
		$div.find("input[name=email]").val(data.student.email);
		$div.find("select[name=country]").val(data.student.country).trigger("change", data.student.state);
		$div.find("input[name=city]").val(data.student.city);
		$div.find("input[name=street]").val(data.student.street);
		$div.find("input[name=zip]").val(data.student.zip);
		$div.find("#isActive").prop('checked', (data.student.isActive == 1) ? true : false);
		$div.find(".isActiveLabel").html((data.student.isActive) ? "Active: " : "Inactive: ");

		$div.find(".student-styles").html("");
		$.each(data.ranks, function( index, rank ) {
			var $dummy_student_style = $("#student-styles-dummy");

			$dummy_student_style.find('input[name="ranks[]"]').val(rank.id)
			$dummy_student_style.find(".style_header").html(rank.style.name);
			$dummy_student_style.find(".style_close").attr('data-styleid', rank.style.id);
			$dummy_student_style.find(".style_close").attr('data-rankid', rank.id);
			$dummy_student_style.find(".edit-style").attr('data-styleid', rank.style.id);
			$dummy_student_style.find(".edit-style").attr('data-rankid', rank.id);
			$dummy_student_style.find(".rank-name").html(rank.name);

			if(rank.type == "solid") {
				$dummy_student_style.find(".layer1").css('background', rank.primary_color);
				$dummy_student_style.find(".layer2").css('background', rank.primary_color);
				$dummy_student_style.find(".layer3").css('background', rank.primary_color);
				$dummy_student_style.find(".layer4").css('background', rank.primary_color);
			} else if(rank.type == "double") {
				$dummy_student_style.find(".layer1").css('background', rank.primary_color);
				$dummy_student_style.find(".layer2").css('background', rank.primary_color);
				$dummy_student_style.find(".layer3").css('background', rank.secondary_color);
				$dummy_student_style.find(".layer4").css('background', rank.secondary_color);
			} else if(rank.type == "stripe") {
				$dummy_student_style.find(".layer1").css('background', rank.secondary_color);
				$dummy_student_style.find(".layer2").css('background', rank.primary_color);
				$dummy_student_style.find(".layer3").css('background', rank.primary_color);
				$dummy_student_style.find(".layer4").css('background', rank.secondary_color);
			}
			$div.find(".student-styles").append($dummy_student_style.html());
		});

		spinner.close();
		$(".main-content").hide();
		$div.show();
	});


});

$(document).on('click', '#edit-student-profile #submit_add_or_edit_student', function(e){
	e.preventDefault();
	e.stopPropagation();

	var $div = $("#edit-student-profile");

	var target = $("#edit-student-profile")[0];
	var spinner = new loader();
	spinner.target(target);

	var formData = new FormData($("#edit-student-profile-form")[0]);
	$.ajax({
		url: "{{ URL::route('instructor_json_postStudent') }}",  //Server script to process data
		type: 'POST',
		xhr: function() {  // Custom XMLHttpRequest
			var myXhr = $.ajaxSettings.xhr();
			if(myXhr.upload){ // Check if upload property exists
				myXhr.upload.addEventListener('progress', function(e){
					if(e.lengthComputable){
						$('progress').attr({value:e.loaded,max:e.total});
					}
				}, false); // For handling the progress of the upload
			}
			return myXhr;
		},
		//Ajax events
		beforeSend: function(){},
		success: function(obj){
			console.log(obj);
			spinner.close();
			if(obj.flash.type == false) {
				displayNotifit( obj.flash.message , obj.flash.type );
			} else {
				updateViewProfile(obj.data.id);
				if(clicked_tr_edit) {
					clicked_tr_edit.data('fullname', obj.data.first_name + " " + obj.data.last_name);
					clicked_tr_edit.data('firstname', obj.data.first_name);
					clicked_tr_edit.data('lastname', obj.data.last_name);
					clicked_tr_edit.data('isactive', obj.data.isActive);
					clicked_tr_edit.data('style', (obj.data.ranks.length > 0) ? obj.data.ranks[0].style.name : "none")
					clicked_tr_edit.find('.picture').attr('src', "{{ URL::Route('home') }}/" + obj.data.picture);
					clicked_tr_edit.find('.name').html(obj.data.first_name + " " + obj.data.last_name);
					clicked_tr_edit.find('.student_title').html((obj.data.ranks.length > 0) ? obj.data.ranks[0].style.name : "None")
				} else {
					var style_name = (obj.data.ranks.length > 0) ? obj.data.ranks[0].style.name : "none";
					var html = '<li class="student"' +  
									'data-id="'+ obj.data.id +'"'+
									'data-fullname="'+ obj.data.first_name + " " + obj.data.last_name +'"'+
									'data-firstname="'+ obj.data.firstname +'"'+ 
									'data-lastname="'+ obj.data.lastname +'"'+ 
									'data-isactive="'+ obj.data.isActive +'"'+ 
									'data-style="'+ style_name +'"> '+
										'<img class="picture" src="{{ URL::Route('home') }}/'+ obj.data.picture +'"> '+
										'<span class="name">'+ obj.data.first_name + " " + obj.data.last_name +'</span>'+
										'<span class="student_title">'+ style_name +'</span>'+ 
								'</li>';

					$("#students").append(html);
					$("#students").parent().animate({scrollTop:$("#students").parent()[0].scrollHeight }, 1000);
					$("#student-count").html(parseInt($("#student-count").text()) + 1);
				}


				updateFilter();
				displayNotifit( obj.flash.message , obj.flash.type );
			}
		},
  //       error: function(xhr, status, error) {
		//     console.log(status + " : " + error);
		// },
		data: formData,
		cache: false,
		contentType: false,
		processData: false
	});


});


// VIEW PROFILE 
var view_student_request;
$(document).on('click', '.sidebar .student', function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $(this).data('id');
	clicked_tr_edit = $(this);
	$(".sidebar .student").removeClass("active");
	$(this).addClass("active");
	updateViewProfile(id);
});

function updateViewProfile(id) {
	var $div = $("#view-student-profile");
	$("#view-student-profile").show();
	var target = $("#view-student-profile")[0];
	var spinner = new loader();
	spinner.target(target);
	$('#sidebar-ancor').click();
	if(view_student_request && view_student_request.readyState != 4){
		view_student_request.abort();
	}

	view_student_request = $.get('{{ URL::route('instructor_json_showStudent') }}', {id: id}).done( function(data){
		$div.data('student_id', data.student.id);
		$div.find("#edit_student").data('id', data.student.id);
		$div.find(".delete_student").data('id', data.student.id);

		$div.find(".picture").attr("src", "{{ URL::to('/')  }}/" + data.student.picture);
		$div.find(".first_name").html(data.student.first_name);
		$div.find(".last_name").html(data.student.last_name);
		var birthdate = new Date(data.student.birthdate);
		birthdate = (birthdate.getMonth() + 1) + '/' + birthdate.getDate() + '/' +  birthdate.getFullYear();
		$div.find(".birthdate").html(birthdate);
		$div.find(".gender").html(data.student.gender.capitalizeFirstLetter());
		$div.find(".email").html(data.student.email);
		$div.find(".contact_number").html(data.student.contact_number);
		$div.find(".country").html(data.student.country);
		$div.find(".state").html(data.student.state);
		$div.find(".city").html(data.student.city);
		$div.find(".street").html(data.student.street);
		$div.find(".zip").html(data.student.zip);


		var ranks = data.ranks;
		var list_of_styles_and_ranks = "";
		var style_and_rank;
		$.each(data.ranks, function( index, style ) {
			var belt_color = "";

			if(style.type == "solid") {
				belt_color = '<div class="style_content"><div class="belt belt-xm" id="final_model1"><ul><li class="layer1" style="background:'+ style.primary_color +';"></li><li class="layer2" style="background:'+ style.primary_color +';"></li><li class="layer3" style="background:'+ style.primary_color +';"></li><li class="layer4" style="background:'+ style.primary_color +';"></li></ul></div></div>';
			} else if(style.type == "double") {
				belt_color = '<div class="style_content"><div class="belt belt-xm" id="final_model1"><ul><li class="layer1" style="background:'+ style.primary_color +';"></li><li class="layer2" style="background:'+ style.primary_color +';"></li><li class="layer3" style="background:'+ style.secondary_color +';"></li><li class="layer4" style="background:'+ style.secondary_color +';"></li></ul></div></div>';
			} else if(style.type == "stripe") {
				belt_color = '<div class="style_content"><div class="belt belt-xm" id="final_model1"><ul><li class="layer1" style="background:'+ style.secondary_color +';"></li><li class="layer2" style="background:'+ style.primary_color +';"></li><li class="layer3" style="background:'+ style.primary_color +';"></li><li class="layer4" style="background:'+ style.secondary_color +';"></li></ul></div></div>';
			}

			style_and_rank = '<div class="col-lg-2 student_style_tile normal promote" data-toggle="modal" data-target="#promoteStyleModal" data-studentid="'+id+'" data-styleid="'+ style.style_id +'" data-rankid="'+ style.id +'"><div class="style_item"><div class="style_shade"><i class="fa fa-arrow-circle-up fa-4x"></i></div><div class="style_header">'+ style.style.name +'</div>'+belt_color+'<div class="style_footer"><i class="fa"><img src="{{ asset('assets/images/karate_icon.png') }}" width="100%;"></i><span class="rank-name">'+ style.name +'</span></div></div></div>';
			list_of_styles_and_ranks += style_and_rank;
		});
		$("#styles-and-ranks").html((data.ranks.length > 0) ? list_of_styles_and_ranks : "<p>There is no styles</p>");

		updateStudentRelationships(data.student.id, false);

		spinner.close();
		$(".main-content").hide();
		$("#view-student-profile").show();
	}).fail( function(obj){
		spinner.close();
	});
}

var get_delete_student = null;
$(document).on("click", ".delete_student", function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $(this).data('id');

	var $modal = $("#deleteStudentModal");

	var target = $("#deleteStudentModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(get_delete_student && get_delete_student.readyState != 4){
		get_delete_student.abort();
		spinner.close();
	}

	get_delete_student = $.get('{{ URL::route('instructor_json_showStudent') }}', {id: id}).done( function(data){
		$modal.find(".name").html(data.student.first_name + " " + data.student.last_name);
		$modal.find(".delete").data('id', data.student.id);

		spinner.close();
	}).fail( function(obj){
		spinner.close();
	});
});

$(document).on("click", "#deleteStudentModal .delete", function(e){
	e.preventDefault();
	e.stopPropagation();

	var id 			= $(this).data('id');
	var $this 		= $(this);

	var target = $("#deleteStudentModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	$.post('{{ URL::route('instructor_json_deleteStudent') }}', {id: id}).done( function(obj){
		clicked_tr_edit.remove();

		spinner.close();
		$this.closest('.modal').modal('hide');
		$(".main-content").hide();
		$("#landing_page").show();
		displayNotifit( obj.flash.message , obj.flash.type );
	});


});


var styleTable = $('#styleModal .style').DataTable({
	"order": [[ 0, "asc" ]],
	"columnDefs": [
	{ "searchable": false, "orderable": false, "targets": 1, "width": "10%" },
	]
});

var add_or_edit_style = null;
$(document).on('click', "#edit-student-profile .tile_add_style", function(e){
	e.preventDefault();
	e.stopPropagation();

	add_or_edit_style = null;

	$modal = $("#styleModal");

	$modal.find(".modal-title").html('Select Style');
	$modal.find(".modal-footer").hide();
	$modal.find(".panel-style").show();
	$modal.find(".panel-rank").hide();
});


var select_style;
$(document).on("click", ".select-style", function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $(this).data('id');

	var $modal = $("#styleModal");

	var target = $("#styleModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(select_style && select_style.readyState != 4){
		select_style.abort();
		spinner.close();
	}

	select_style = $.get('{{ URL::route('instructor_json_showStyleWithRanks') }}', {id: id}).done( function(data){
		$modal.find(".modal-title").html(data.name);
		$modal.find(".style_rank").children().remove();
		$(data.ranks).each(function(){
			$modal.find(".style_rank").append($('<option>', {
				text: this.name,
				value: this.id,
				'data-type': this.type,
				'data-primary_color': this.primary_color,
				'data-secondary_color': this.secondary_color
			}));
		});

		$modal.find(".style_rank").trigger("change");

		spinner.close();

		$modal.find(".modal-footer").show();
		$modal.find(".panel-style").hide();
		$modal.find(".panel-rank").show();
	}).fail( function(obj){
		spinner.close();
	});
});

$(document).on("click", "#edit-student-profile .edit-style", function(e){
	e.preventDefault();
	e.stopPropagation();


	var id = $(this).attr('data-styleid');
	var rankid = $(this).attr('data-rankid');

	add_or_edit_style = $(this).parents('.student_style_tile');

	var $modal = $("#styleModal");

	$modal.find(".back").hide();
	$modal.find(".panel-style").hide();

	var target = $("#styleModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(select_style && select_style.readyState != 4){
		select_style.abort();
		spinner.close();
	}

	select_style = $.get('{{ URL::route('instructor_json_showStyleWithRanks') }}', {id: id}).done( function(data){
		$modal.find(".modal-title").html(data.name);
		$modal.find(".style_rank").children().remove();
		$(data.ranks).each(function(){
			$modal.find(".style_rank").append($('<option>', {
				text: this.name,
				value: this.id,
				'data-type': this.type,
				'data-primary_color': this.primary_color,
				'data-secondary_color': this.secondary_color
			}));
		});

		$modal.find(".style_rank").val(rankid);

		$modal.find(".style_rank").trigger("change");

		spinner.close();
		
		$modal.find(".panel-rank").show();
	}).fail( function(obj){
		spinner.close();
	});
});

$(document).on("click", "#styleModal .back", function(e){
	$modal = $("#styleModal");

	$modal.find(".modal-title").html('Select Style');
	$modal.find(".modal-footer").hide();
	$modal.find(".panel-style").show();
	$modal.find(".panel-rank").hide();

});

$(document).on('change', '.style_rank', function(e){
	$this = $(this).find(':selected');

	$div = $(this).parents(".panel-rank");

	if($this.data('type') == "solid") {
		$div.find(".layer1").css('background', $this.data('primary_color'));
		$div.find(".layer2").css('background', $this.data('primary_color'));
		$div.find(".layer3").css('background', $this.data('primary_color'));
		$div.find(".layer4").css('background', $this.data('primary_color'));
	} else if($this.data('type') == "double") {
		$div.find(".layer1").css('background', $this.data('primary_color'));
		$div.find(".layer2").css('background', $this.data('primary_color'));
		$div.find(".layer3").css('background', $this.data('secondary_color'));
		$div.find(".layer4").css('background', $this.data('secondary_color'));
	} else if($this.data('type') == "stripe") {
		$div.find(".layer1").css('background', $this.data('secondary_color'));
		$div.find(".layer2").css('background', $this.data('primary_color'));
		$div.find(".layer3").css('background', $this.data('primary_color'));
		$div.find(".layer4").css('background', $this.data('secondary_color'));
	}
});

$("#styleModal").on('click', '.save', function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $("#styleModal .panel-rank .style_rank").val();
	var $div = $("#edit-student-profile");
	$this = $(this);
	$this.prop('disabled', true);
	$.get('{{ URL::route('instructor_json_getStyleWithRankByRankID') }}', {id: id}).done( function(data){
		if(add_or_edit_style) {
			$dummy_student_style = add_or_edit_style;
		} else {
			var $dummy_student_style = $("#student-styles-dummy");
		}

		
		$dummy_student_style.find('input[name="ranks[]"]').val(data.id)
		$dummy_student_style.find(".style_header").html(data.style.name);
		$dummy_student_style.find(".style_close").attr('data-styleid', data.style.id);
		$dummy_student_style.find(".style_close").attr('data-rankid', data.id);
		$dummy_student_style.find(".edit-style").attr('data-styleid', data.style.id);
		$dummy_student_style.find(".edit-style").attr('data-rankid', data.id);
		$dummy_student_style.find(".rank-name").html(data.name);

		if(data.type == "solid") {
			$dummy_student_style.find(".layer1").css('background', data.primary_color);
			$dummy_student_style.find(".layer2").css('background', data.primary_color);
			$dummy_student_style.find(".layer3").css('background', data.primary_color);
			$dummy_student_style.find(".layer4").css('background', data.primary_color);
		} else if(data.type == "double") {
			$dummy_student_style.find(".layer1").css('background', data.primary_color);
			$dummy_student_style.find(".layer2").css('background', data.primary_color);
			$dummy_student_style.find(".layer3").css('background', data.secondary_color);
			$dummy_student_style.find(".layer4").css('background', data.secondary_color);
		} else if(data.type == "stripe") {
			$dummy_student_style.find(".layer1").css('background', data.secondary_color);
			$dummy_student_style.find(".layer2").css('background', data.primary_color);
			$dummy_student_style.find(".layer3").css('background', data.primary_color);
			$dummy_student_style.find(".layer4").css('background', data.secondary_color);
		}

		if(!add_or_edit_style) {
			$div.find(".student-styles").append($dummy_student_style.html());
		}
		
		$this.prop('disabled', false);
		$this.closest('.modal').modal('hide');
		// spinner.close();
	}).fail( function(obj){
		// spinner.close();
		$this.prop('disabled', false);
		displayNotifit( "Failed to save style!" , false );
	});
});

var get_select_remove_style = null;
$(document).on("click", "#edit-student-profile .student-styles .style_close", function(e){
	e.preventDefault();
	e.stopPropagation();

	selected_remove_style = $(this).parents('.student_style_tile');

	var id = $(this).attr('data-styleid');
	var rankid = $(this).attr('data-rankid');

	var $modal = $("#removeStyleModal");

	var target = $("#removeStyleModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(get_select_remove_style && get_select_remove_style.readyState != 4){
		get_select_remove_style.abort();
		spinner.close();
	}

	get_select_remove_style = $.get('{{ URL::route('instructor_json_showStyleWithRanks') }}', {id: id}).done( function(data){
		$modal.find(".modal-title").html(data.name);
		$modal.find(".style_rank").children().remove();
		$(data.ranks).each(function(){
			$modal.find(".style_rank").append($('<option>', {
				text: this.name,
				value: this.id,
				'data-type': this.type,
				'data-primary_color': this.primary_color,
				'data-secondary_color': this.secondary_color
			}));
		});
		$modal.find(".style_rank").val(rankid).trigger("change");

		spinner.close();
	}).fail( function(obj){
		spinner.close();
	});

});

$(document).on("click", "#removeStyleModal .remove", function(e){
	e.preventDefault();
	e.stopPropagation();

	selected_remove_style.remove();
	$(this).closest('.modal').modal('hide');
});

//////////////////////////////////////

var get_select_promote_style = null;
var selected_promote_style;
$(document).on("click", "#view-student-profile .promote", function(e){
	e.preventDefault();
	e.stopPropagation();

	selected_promote_style = $(this);
	console.log(selected_promote_style);

	var id = $(this).attr('data-styleid');
	var rankid = $(this).attr('data-rankid');

	var $modal = $("#promoteStyleModal");

	var target = $("#promoteStyleModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(get_select_promote_style && get_select_promote_style.readyState != 4){
		get_select_promote_style.abort();
		spinner.close();
	}

	get_select_promote_style = $.get('{{ URL::route('instructor_json_showStyleWithRanks') }}', {id: id}).done( function(data){
		$modal.find(".modal-title").html(data.name);
		$modal.find(".style_rank").children().remove();
		$(data.ranks).each(function(){
			$modal.find(".style_rank").append($('<option>', {
				text: this.name,
				value: this.id,
				'data-type': this.type,
				'data-primary_color': this.primary_color,
				'data-secondary_color': this.secondary_color
			}));
		});
		$modal.find(".style_rank").val(rankid).trigger("change");
		$modal.find(".promote").attr("data-rankid", rankid);

		spinner.close();
	}).fail( function(obj){
		spinner.close();
	});
});

$(document).on("click", "#promoteStyleModal .promote", function(e){
	e.preventDefault();
	e.stopPropagation();

	$this = $(this);
	$this.prop('disabled', true);
	var studentid = selected_promote_style.attr('data-studentid');
	var rankid = $(this).attr('data-rankid');
	
	var $modal = $("#promoteStyleModal");

	$.post('{{ URL::route('instructor_json_promoteStudentStyle') }}', {studentid: studentid, rankid: rankid}).done( function(obj){
		$this.prop('disabled', false);
		if(obj.flash.type) {
			$modal.find(".style_rank").val(obj.data.id).trigger("change");
			$modal.find(".promote").attr("data-rankid", obj.data.id);


			console.log(selected_promote_style);
			selected_promote_style.attr('data-rankid', obj.data.id);
			selected_promote_style.find(".rank-name").html(obj.data.name);

			if(obj.data.type == "solid") {
				selected_promote_style.find(".layer1").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer2").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer3").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer4").css('background', obj.data.primary_color);
			} else if(obj.data.type == "double") {
				selected_promote_style.find(".layer1").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer2").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer3").css('background', obj.data.secondary_color);
				selected_promote_style.find(".layer4").css('background', obj.data.secondary_color);
			} else if(obj.data.type == "stripe") {
				selected_promote_style.find(".layer1").css('background', obj.data.secondary_color);
				selected_promote_style.find(".layer2").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer3").css('background', obj.data.primary_color);
				selected_promote_style.find(".layer4").css('background', obj.data.secondary_color);
			}
		}
		$(this).closest('.modal').modal('hide');
		displayNotifit( obj.flash.message , obj.flash.type );
	});
});

/////////////////////////////////////////

$('#relationshipModal input[name=existing_user]').selectize({
    valueField: 'id',
    searchField: 'name',
    options: [],
    create: false,
    maxItems: 1,
    createOnBlur: true,
    render: {
        item: function(item, escape) {
            return '<div>' +
                '<span class="name">' + 
                	escape(item.first_name + " " + item.last_name) + 
                '</span>'+
            '</div>';
        },
        option: function(item, escape) {
            var label = item.first_name + " " + item.last_name;
            return '<div>' +
                (label ? '<span class="caption">' + escape(label) + '</span>' : '') +
            '</div>';
        }
    },
    load: function(query, callback) {
        if (!query.length || query.length < 2) return callback();
        $.ajax({
            url: '{{ URL::route('json/searchGuardianAndStudents') }}',
            type: 'GET',
            dataType: 'JSON',
            data: {	name : query },
            error: function() {
                callback();
            },
            success: function(res) {
                callback(res);
            }
        });
    }
});




var relationshipid = null;
$(document).on('click', "#view-student-profile .tile_add_relationship", function(e){
	e.preventDefault();
	e.stopPropagation();

	relationshipid = null;


	$modal = $("#relationshipModal");

	$modal.find(".modal-footer").hide();
	$modal.find(".panel-type").show();
	$modal.find(".panel-data").hide();
});

$("#relationshipModal").on('click', '.new', function(e){
	e.preventDefault();
	e.stopPropagation();

	$modal = $("#relationshipModal");

	$('#relationshipModal input[name=existing_user]')[0].selectize.clear();

	$modal.find(".modal-footer").show();
	$modal.find(".panel-type").hide();
	$modal.find(".panel-data").show();

	$modal.find("input[name=first_name]").val('').prop('disabled', false);
	$modal.find("input[name=last_name]").val('').prop('disabled', false);
	$modal.find("input[name=contact_number]").val('').prop('disabled', false);
	$modal.find("input[name=email]").val('').prop('disabled', false);
	$modal.find("select[name=type]").val('');
	$modal.find(".save").data('guardian_id', '');
});

$("#relationshipModal").on('change', '.exist', function(e){
	e.preventDefault();
	e.stopPropagation();

	var user_id = $(this).val();

	if(user_id) {
		$modal = $("#relationshipModal");

		$.ajax({
			type: "GET",
			url: "{{ URL::route('json/getUserInfo') }}",
			data: { user_id: user_id }
		}).done(function( data ) {
			console.log(data);

			$modal.find(".modal-footer").show();
			$modal.find(".panel-type").hide();
			$modal.find(".panel-data").show();

			$modal.find("input[name=first_name]").val(data.first_name).prop('disabled', true);
			$modal.find("input[name=last_name]").val(data.last_name).prop('disabled', true);
			$modal.find("input[name=contact_number]").val(data.contact_number).prop('disabled', true);
			$modal.find("input[name=email]").val(data.email).prop('disabled', true);
			$modal.find("select[name=type]").val('').prop('disabled', false);
			$modal.find(".save").data('guardian_id', data.id);
		});
	}
});

$("#relationshipModal").on('click', '.back', function(e){
	e.preventDefault();
	e.stopPropagation();

	$modal = $("#relationshipModal");

	$modal.find(".modal-footer").hide();
	$modal.find(".panel-type").show();
	$modal.find(".panel-data").hide();

	$('#relationshipModal input[name=existing_user]')[0].selectize.clear();

	$modal.find(".save").data('guardian_id', '');
    $modal.find(".save").data('student_id', '');
});

$(document).on('click', '#relationshipModal .save', function(e){
	e.preventDefault();
	e.stopPropagation();
	var form = $(this).parents('.modal-content').find('form');
	var $this = $(this);


	if(!form.valid()) {
      displayNotifit( "Please correct all input!" , false );
    } else {
    	var first_name 		= form.find("input[name=first_name]").val();
    	var last_name		= form.find("input[name=last_name]").val();
    	var contact_number 	= form.find("input[name=contact_number]").val();
    	var email 			= form.find("input[name=email]").val();
    	var type 			= form.find("select[name=type]").val();
    	var student_id 		= $("#view-student-profile").data('student_id');
    	var guardian_id		= $(this).data('guardian_id');

		$.ajax({
			type: "GET",
			url: "{{ URL::route('instructor_json_addRelationship') }}",
			data: { student_id: student_id, 
					guardian_id: guardian_id, 
					first_name: first_name,
					last_name: last_name,
					contact_number: contact_number,
					email: email,
					type: type }
		}).done(function( result ) {
			console.log(result);
			updateStudentRelationships(student_id, true);
			$this.closest('.modal').modal('hide');
		});
    }
});



$(document).on("click", "#view-student-profile .edit-relationship", function(e){
	e.preventDefault();
	e.stopPropagation();

	var relationship_id = $(this).data('relationshipid');

	$modal = $("#editRelationshipModal");

	$.ajax({
		type: "GET",
		url: "{{ URL::route('json/getRelationInfo') }}",
		data: { relationship_id: relationship_id }
	}).done(function( data ) {
		$modal.find(".panel-data").show();

		$modal.find("input[name=first_name]").val(data.first_name).prop('disabled', true);
		$modal.find("input[name=last_name]").val(data.last_name).prop('disabled', true);
		$modal.find("input[name=contact_number]").val(data.contact_number).prop('disabled', true);
		$modal.find("input[name=email]").val(data.email).prop('disabled', true);
		$modal.find("select[name=type]").val(data.relationship_type).prop('disabled', false);
		$modal.find(".save").data('relationship_id', relationship_id);
	});
});

$(document).on('click', '#editRelationshipModal .save', function(e){
	e.preventDefault();
	e.stopPropagation();
	var form = $(this).parents('.modal-content').find('form');
	var $this = $(this);

	// var target = $("#view-student-profile");
	// var spinner = new loader();
	// spinner.target(target);

	if(!form.valid()) {
      displayNotifit( "Please correct all input!" , false );
    } else {
    	var type 			= form.find("select[name=type]").val();
    	var relationship_id = $(this).data('relationship_id');


		$.ajax({
			type: "GET",
			url: "{{ URL::route('instructor_json_editRelationship') }}",
			data: { relationship_id: relationship_id,
					type: type }
		}).done(function( result ) {
			console.log(result);
			updateStudentRelationships(result.data.student_id, true);
			$this.closest('.modal').modal('hide');
		});
    }
});


function updateStudentRelationships(student_id, spinner) {
	var $div = $("#view-student-profile");

	$div.find(".student-relationships").html("");

	if(spinner) {
		var target = $("#view-student-profile");
		var spinner = new loader();
		spinner.target(target);
	}

	$.get('{{ URL::route('json/studentRelationships') }}', {student_id: student_id}).done( function(data){

		if(data.length < 0) {
			$div.find(".student-relationships").html("<p>There is no relationships</p>");
		} else {

			$.each(data, function( index, relation ) {
				console.log(relation);
				var $dummy_student_relation = $("#student-relation-dummy");

				$dummy_student_relation.find(".style_close").attr("data-relationshipid", relation.id);
				$dummy_student_relation.find(".edit-relationship").attr("data-relationshipid", relation.id);
				$dummy_student_relation.find(".style_header").html(relation.relationship_type);
				$dummy_student_relation.find(".style_footer").html(relation.first_name + " " + relation.last_name);
				$div.find(".student-relationships").append($dummy_student_relation.html());
			
			});
		}
		if(spinner) { spinner.close(); }
	});
}


var get_select_remove_relationship = null;
$(document).on("click", "#view-student-profile .student-relationships .style_close", function(e){
	e.preventDefault();
	e.stopPropagation();

	selected_remove_relationship = $(this).parents('.student_style_tile');

	var id = $(this).attr('data-styleid');
	var rankid = $(this).attr('data-rankid');

	var $modal = $("#removeRelationshipModal");

	var target = $("#removeRelationshipModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(get_select_remove_relationship && get_select_remove_relationship.readyState != 4){
		get_select_remove_relationship.abort();
		spinner.close();
	}

	var relationship_id = $(this).data('relationshipid');

	get_select_remove_style = $.get('{{ URL::route('json/getRelationInfo') }}', {relationship_id: relationship_id}).done( function(data){

		$modal.find("input[name=first_name]").val(data.first_name).prop('disabled', true);
		$modal.find("input[name=last_name]").val(data.last_name).prop('disabled', true);
		$modal.find("input[name=contact_number]").val(data.contact_number).prop('disabled', true);
		$modal.find("input[name=email]").val(data.email).prop('disabled', true);
		$modal.find("select[name=type]").val(data.relationship_type).prop('disabled', true);
		$modal.find(".remove").data('relationship_id', data.id);

		spinner.close();
	}).fail( function(obj){
		spinner.close();
	});
});

$(document).on("click", "#removeRelationshipModal .remove", function(e){
	e.preventDefault();
	e.stopPropagation();

	var id 			= $(this).data('relationship_id');
	var $this 		= $(this);

	var target = $("#removeRelationshipModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);
	$.post('{{ URL::route('json/deleteRelationship') }}', {id: id}).done( function(obj){
		selected_remove_relationship.remove();
		spinner.close();
		$this.closest('.modal').modal('hide');
		displayNotifit( obj.flash.message , obj.flash.type );
	});
});













$(document).on('click', '.test', function(e){
	e.preventDefault();
	e.stopPropagation();

	console.log(add_or_edit_relationship);
	add_or_edit_relationship.find();

	console.log(add_or_edit_relationship.find("input[name='relationship[3][guardian_id]']"));
	// console.log(add_or_edit_relationship.find("input[name=relationship]").val());
	// console.log(add_or_edit_relationship.find("input[name=relationship]").val());
	// console.log(add_or_edit_relationship.find("input[name=relationship]").val());
	// console.log(add_or_edit_relationship.find("input[name=relationship]").val());
	// console.log(add_or_edit_relationship.find("input[name=relationship]").val());
});
// $(document).on('click', '#add_student', function(e){
// 	e.preventDefault();
// 	e.stopPropagation();

	// $("#add_new_student_wrapper .maintitle").html("New <span>Profile</span>");
	// $("#add_new_student_wrapper .form-title").html("Add new student");
	// $("#add_new_student_wrapper .profile_pic").attr('src', null);
	// $("#add_new_student_wrapper .user_id").val(null);
	// $("#add_new_student_wrapper .first-name").val(null);
	// $("#add_new_student_wrapper .last-name").val(null);
	// $("#add_new_student_wrapper .birthdate").val(null);
	// $("#add_new_student_wrapper .phonenumber").val(null);
	// $("#add_new_student_wrapper .email").val(null);
	// $("#add_new_student_wrapper .address").val(null);
	// $("#add_new_student_wrapper .city").val(null);
	// $("#add_new_student_wrapper .state").val(null);
	// $("#add_new_student_wrapper .country").val(null);
	// $("#add_new_student_wrapper .zip").val(null);
	// $("#add_new_student_wrapper .delete").hide();

// 	$(".main-content").hide();
// 	$("#edit-student-profile").show();
// });






// this code is code is for the simulation of the changing of style ranks
// $("#style_rank").change(function(){
// 	var value = document.getElementById("style_rank").value;
// 	var final_model1 = document.getElementById("final_model1");
// 	var final_model2 = document.getElementById("final_model2");

// 	if(value == 1)
// 	{
// 		final_model1.innerHTML = '<ul><li style="height:33.333%; background:black;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:black;"></li></ul>';
// 		final_model2.innerHTML = '<ul><li style="height:33.333%; background:black;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:black;"></li></ul>';
// 	}
// 	else if(value == 2)
// 	{
// 		final_model1.innerHTML = '<ul><li style="height:33.333%; background:#fdf78c;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#fdf78c;"></li></ul>';
// 		final_model2.innerHTML = '<ul><li style="height:33.333%; background:#fdf78c;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#fdf78c;"></li></ul>';
// 	}
// 	if(value == 3)
// 	{
// 		final_model1.innerHTML = '<ul><li style="height:33.333%; background:#c69c6d;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#c69c6d;"></li></ul>';
// 		final_model2.innerHTML = '<ul><li style="height:33.333%; background:#c69c6d;"></li><li style="height:33.333%; background:white;"></li><li style="height:33.333%; background:#c69c6d;"></li></ul>';
// 	}
// });
// //end of code

// $("#edit-bttn").click(function(){
// // document.getElementById("content1").style.left = "-100%";
// document.getElementById("edit-student-profile").style.display = "block";
// setTimeout(function(){
// 	document.getElementById("edit-student-profile").style.opacity = "1";
// 	document.getElementById("view-student-profile").style.opacity = "0";
// // document.getElementById("content2").style.left = "0px";
// setTimeout(function(){
// 	document.getElementById("view-student-profile").style.display="none";
// },500);
// },10);
// });

// $("#cancel-bttn").click(function(){
// // document.getElementById("content2").style.left = "100%";
// document.getElementById("view-student-profile").style.display = "block";
// setTimeout(function(){
// 	document.getElementById("view-student-profile").style.opacity = "1";
// 	document.getElementById("edit-student-profile").style.opacity = "0";
// // document.getElementById("content1").style.left = "0px";
// setTimeout(function(){
// 	document.getElementById("edit-student-profile").style.display="none";
// },500);
// },10);
// });


// function chooseRank()
// {
// 	var choose_style_panel = document.getElementById("choose_style_panel");
// 	var choose_rank_panel = document.getElementById("choose_rank_panel");

// 	choose_style_panel.style.opacity = 0;
// 	choose_rank_panel.style.display = "block";

// 	setTimeout(function(){
// 		choose_rank_panel.style.opacity = 1;
// 		setTimeout(function(){
// 			choose_style_panel.style.display = "none";
// 		},500);
// 	},10);
// }

// function cancelChooseRank()
// {
// 	var choose_style_panel = document.getElementById("choose_style_panel");
// 	var choose_rank_panel = document.getElementById("choose_rank_panel");

// 	choose_rank_panel.style.opacity = 0;
// 	choose_style_panel.style.display = "block";

// 	setTimeout(function(){
// 		choose_style_panel.style.opacity = 1;
// 		setTimeout(function(){
// 			choose_rank_panel.style.display = "none";
// 		},500);
// 	},10);
// }
// end of code

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

Morris.Line({
	element: 'line-example',
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
</script>
@endsection
