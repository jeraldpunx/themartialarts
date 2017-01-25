@extends('owner.layout')

@section('content')
<input id="sidebar-ancor" class="ancor_sidebar ancor" type="radio" checked="" name="ancor">
<div class="ancor"><p class="fa fa-arrow-left"></p></div>
<div class="sidebar">
	<div class="search-box">
		<input type="text" name="search_name" placeholder="Search">
		<p class="fa-search fa"></p>
	</div>

	<div class="list-container" style="top: 40px;">
		<ul id="students">
		@foreach($teachers as $teacher)
			<li class="student" 
				data-id="{{ $teacher->id }}" 
				data-fullname="{{ $teacher->first_name }} {{ $teacher->last_name }}" 
				data-firstname="{{ $teacher->first_name }}" 
				data-lastname="{{ $teacher->last_name }}" 
				data-isactive="{{ $teacher->isActive }}">
				<img class="picture" src="{{ URL::Route('home') . "/" . $teacher->picture }}">
				<span class="name">{{ $teacher->first_name }} {{ $teacher->last_name }}</span>
			</li>
		@endforeach
		</ul>
	</div>
	<div class="side-bar-footer">
		<ul>
			<li class="num-student">
				<b id="student-count">{{ count($teachers) }}</b> instrutor(s)
			</li>
			<li class="add-student" style="position:absolute; right:5px; top:15px;">
				<span id="add_student" style="font-size:12px;">ADD NEW INSTRUCTOR</span>
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



	<div class="main-content" id="view-instructor-profile" data-instructor_id="" style="display: none;">
		<div class="content-header">Instructor Profile</div>
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
	    		<div class="col-lg-8">
	    			<label>Address</label>
					<div class="address">address</div>
	    		</div>
				<ul class="student-profile-options">
					<li>
						<div class="blue-bttn unick-bttn" id="edit_instructor" style="float:right">
							<a href="#">EDIT</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-lg-12 other_info" style="min-height:90%;">
			<div class="other_info_header">Other Info</div>
			<div class="other_content">
				<div class="col-lg-12">
					<div class="other_content_header">
						Students
						<a class="view_all_students" href="{{ URL::route('owner_students') }}">View all students</a>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="content_text">
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="students_table">
			                <thead>
			                    <tr>
			                    	<th>Name</th>
			                    	<th>Gender</th>
			                    </tr>
			                </thead>
			                <tbody>
				            </tbody>
			            </table>
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
	<div class="main-content" id="edit-instructor-profile" style="display: none;">
		<div class="content-header">Update Instructor</div>
		<div class="profile-edit profile-view">
			<form id="edit-instructor-profile-form" enctype="multipart/form-data" autocomplete="off" action="" method="POST" role="form">
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
						
						<div class="row">
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

							<div class="form-group col-lg-4">
								<label>Username *</label>
								<input class="form-control" type="text" placeholder="Username" name="username" />
							</div>

							<div class="col-md-8 passwords">
								
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12" style="min-height:50px;">
					<div class="col-md-2 col-md-offset-10">
						<div class="col-lg-6">
							<div id="submit_add_or_edit_instructor" class="orange-bttn unick-bttn" style="margin:0px; margin-top:5px;">
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
		<div class="col-lg-12 other_info" style="min-height:90%;">
			<div class="other_info_header">Change Password</div>
			<div class="other_content">
				<div class="passwords_dummy col-md-10">
					<div class="form-group col-lg-6">
						<label>Password *</label>
						<input class="form-control" type="password" placeholder="Password" name="password" />
					</div>
					<div class="form-group col-lg-6">
						<label>Retype Password *</label>
						<input class="form-control" type="password" placeholder="Retype Password" name="password_confirmation" />
					</div>
				</div>
				<div class="col-md-2">
					<div id="submit_changepassword_instructor" class="orange-bttn unick-bttn" style="margin:0px; margin-top:5px;">
						<i class="fa"><a href="#"> Save </a></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('script')
<script type="text/javascript">
$("#landing_page").show();


var school_country = '{{ $school->country }}';
var school_state = '{{ $school->state }}';

updateFilter();

//FILTER SEARCH
$(document).on('input', 'input[type=text][name=search_name]', updateFilter);

function updateFilter(){
	var fullname = $('input[type=text][name=search_name').val();

	searchStudent(fullname);
}

function searchStudent(fullname) {
	var student_count = 0;
	$(".list-container ul li").each(function() {
		if ($(this).data('fullname').search(new RegExp(fullname, "i")) < 0) {
			$(this).hide();
	} else {
		$(this).show();
		student_count++;
	}
});
	$("#student-count").html(student_count);
}

var students = $('#students_table').DataTable({
	"order": [[ 0, "asc" ]],
	"oLanguage": { "sEmptyTable": "No students found." }
});

// COUNTRIES ON CHANGE
$('#edit-instructor-profile').on('change', 'select[name=country]', function(event, state){
	var country_id = $(this).find(':selected').data('id');
	var $div = $("#edit-instructor-profile");

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

$(document).on('change', '#picture_upload', function(e){

	if (this.files && this.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#edit-instructor-profile .picture').attr('src', e.target.result);
		}

		reader.readAsDataURL(this.files[0]);
	}
});

$("#edit-instructor-profile").on("change", "#isActive", function(e){	
	$("#edit-instructor-profile").find(".isActiveLabel").html(($(this).is(":checked")) ? "Active: " : "Inactive: ").hide().fadeIn('fast');
});

var clicked_tr_edit = null;
$(document).on('click', '#add_student', function(e){
	e.preventDefault();
	e.stopPropagation();

	clicked_tr_edit = null;

	$('#sidebar-ancor').click();
	$(".sidebar .student").removeClass("active");

	var $div = $("#edit-instructor-profile");

	
	$div.find(".other_info").hide();
	$div.find(".passwords").html($div.find(".passwords_dummy").html());

	$div.find(".content-header").html("Add New Student");
	$div.find("input[name=id]").val(null);

	$div.find(".picture").attr("src", "{{ asset('assets/images/default-user.png') }}");
	$div.find("input[name=picture_file]").val("");
	$div.find("input[name=username]").val("");
	$div.find("input[name=password]").val("");
	$div.find("input[name=password_confirmation]").val("");
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

$(document).on('click', "#submit_changepassword_instructor", function(e){
	e.preventDefault();
	e.stopPropagation();

	var $div = $("#edit-instructor-profile");

	var target = $("#base-container")[0];
	var spinner = new loader();
	spinner.target(target);

	var id = $div.find("input[name=id]").val();
	var password = $div.find("input[name=password]").val();
	var password_confirmation = $div.find("input[name=password_confirmation]").val();

	$.post('{{ URL::route('owner_json_changePasswordInstructor') }}', {id: id, password: password, password_confirmation: password_confirmation}).done( function(obj){

		spinner.close();
		displayNotifit( obj.flash.message , obj.flash.type );
	});
});

var view_edit_instructor_request;
$(document).on('click', '#edit_instructor', function(e){
	e.preventDefault();
	e.stopPropagation();

	var $div = $("#edit-instructor-profile");
	var target = $("#base-container")[0];
	var spinner = new loader();
	spinner.target(target);

	var id = $(this).data('id');
	$div.find(".content-header").html("Update Student");

	if(view_edit_instructor_request && view_edit_instructor_request.readyState != 4){
		view_edit_instructor_request.abort();
		spinner.close();
	}

	view_edit_instructor_request = $.get('{{ URL::route('owner_json_showInstructorProfile') }}', {id: id}).done( function(data){
		$div.find(".other_info").show();
		$div.find(".passwords").html("");
		$div.find(".delete_student").data('id', id);
		$div.find("input[name=id]").val(id);

		$div.find(".picture").attr("src", "{{ URL::to('/')  }}/" + data.picture);
		$div.find("input[name=picture_file]").val("");
		$div.find("input[name=username]").val(data.username);
		$div.find("input[name=first_name]").val(data.first_name);
		$div.find("input[name=last_name]").val(data.last_name);
		var birthdate = new Date(data.birthdate);
		birthdate = (birthdate.getMonth() + 1) + '/' + birthdate.getDate() + '/' +  birthdate.getFullYear();
		$div.find("input[name=birthdate]").val(birthdate);
		$div.find("select[name=gender]").val(data.gender);
		$div.find("input[name=contact_number]").val(data.contact_number);
		$div.find("input[name=email]").val(data.email);
		$div.find("select[name=country]").val(data.country).trigger("change", data.state);
		$div.find("input[name=city]").val(data.city);
		$div.find("input[name=street]").val(data.street);
		$div.find("input[name=zip]").val(data.zip);
		$div.find("#isActive").prop('checked', (data.isActive == 1) ? true : false);
		$div.find(".isActiveLabel").html((data.isActive) ? "Active: " : "Inactive: ");

		spinner.close();
		$(".main-content").hide();
		$div.show();
	});
});

$(document).on('click', '#edit-instructor-profile #submit_add_or_edit_instructor', function(e){
	e.preventDefault();
	e.stopPropagation();

	var $div = $("#edit-instructor-profile");

	var target = $("#base-container")[0];
	var spinner = new loader();
	spinner.target(target);

	var formData = new FormData($("#edit-instructor-profile-form")[0]);
	$.ajax({
		url: "{{ URL::route('owner_json_postInstructor') }}",  //Server script to process data
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
					clicked_tr_edit.data('fullname', obj.data.user.first_name + " " + obj.data.user.last_name);
					clicked_tr_edit.data('firstname', obj.data.user.first_name);
					clicked_tr_edit.data('lastname', obj.data.user.last_name);
					clicked_tr_edit.data('isactive', obj.data.user.isActive);
					clicked_tr_edit.find('.picture').attr('src', "{{ URL::Route('home') }}/" + obj.data.user.picture);
					clicked_tr_edit.find('.name').html(obj.data.user.first_name + " " + obj.data.user.last_name);
				} else {
					var html = '<li class="student"' +  
									'data-id="'+ obj.data.user.id +'"'+
									'data-fullname="'+ obj.data.user.first_name + " " + obj.data.user.last_name +'"'+
									'data-firstname="'+ obj.data.user.firstname +'"'+ 
									'data-lastname="'+ obj.data.user.lastname +'"'+ 
									'data-isactive="'+ obj.data.user.isActive + '">' +
										'<img class="picture" src="{{ URL::Route('home') }}/'+ obj.data.user.picture +'"> '+
										'<span class="name">'+ obj.data.user.first_name + " " + obj.data.user.last_name +'</span>'+
								'</li>';

					$("#students").append(html);
					$("#students").parent().animate({scrollTop:$("#students").parent()[0].scrollHeight }, 1000);
					$("#student-count").html(parseInt($("#student-count").text()) + 1);
				}
				// updateFilter();
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
$(document).on('click', '.sidebar .student', function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $(this).data('id');
	clicked_tr_edit = $(this);

	$('#sidebar-ancor').click();
	$(".sidebar .student").removeClass("active");
	$(this).addClass("active");

	var target = $("#base-container")[0];
	var spinner = new loader();
	spinner.target(target);

	$.when(updateViewProfile(id), updateInstructorStudents(id)).done(function() {
		$(".main-content").hide();
		$("#view-instructor-profile").show();
		spinner.close();
	});
});

var view_instructor_request;
function updateViewProfile(id) {
	if(view_instructor_request && view_instructor_request.readyState != 4){
		view_instructor_request.abort();
	}

	view_instructor_request = $.get('{{ URL::route('owner_json_showInstructorProfile') }}', {id: id}).done( function(data){
		var $div = $("#view-instructor-profile");

		$div.data('student_id', data.id);
		$div.find("#edit_instructor").data('id', id);
		$div.find(".delete_instructor").data('id', id);

		$div.find(".picture").attr("src", "{{ URL::to('/')  }}/" + data.picture);
		$div.find(".first_name").html(data.first_name);
		$div.find(".last_name").html(data.last_name);
		var birthdate = new Date(data.birthdate);
		birthdate = (birthdate.getMonth() + 1) + '/' + birthdate.getDate() + '/' +  birthdate.getFullYear();
		$div.find(".birthdate").html(birthdate);
		$div.find(".gender").html((data.gender) ? data.gender.capitalizeFirstLetter() : "None");
		$div.find(".email").html(data.email);
		$div.find(".contact_number").html(data.contact_number);
		$div.find(".address").html(data.address);

		$div.find(".view_all_students").attr('href', '{{ URL::route('owner_students') }}/' + data.id);

	});
}

var view_inst_stud_request;
function updateInstructorStudents(teacher_id)
{
	if(view_inst_stud_request && view_inst_stud_request.readyState != 4){
		view_inst_stud_request.abort();
	}

	view_inst_stud_request = $.get('{{ URL::route('owner_json_showInstructorStudents') }}', {teacher_id: teacher_id}).done( function(data){
		students.clear();
		$(data).each(function(){
			students.row.add([
		        this.first_name + " " + this.last_name,
		        this.gender
	    	]);
		});
		students.draw();
	});
}

var get_delete_instructor = null;
$(document).on("click", ".delete_instructor", function(e){
	e.preventDefault();
	e.stopPropagation();

	var id = $(this).data('id');

	var $modal = $("#deleteStudentModal");

	var target = $("#deleteStudentModal .modal-body")[0];
	var spinner = new loader();
	spinner.target(target);

	if(get_delete_instructor && get_delete_instructor.readyState != 4){
		get_delete_instructor.abort();
		spinner.close();
	}

	get_delete_instructor = $.get('{{ URL::route('instructor_json_showStudent') }}', {id: id}).done( function(data){
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

</script>		
@endsection