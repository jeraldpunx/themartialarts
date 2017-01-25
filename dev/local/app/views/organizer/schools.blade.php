@extends('organizer.layout')
@section('content')

    <input class="ancor_sidebar ancor" id="sidebar_anchor" type="radio" checked="" name="ancor">
    <div class="ancor"><p class="fa fa-arrow-left"></p></div>
    <div class="sidebar">
        <div class="search-box">
            <input type="text" placeholder="Search">
            <p class="fa-search fa"></p>
        </div>


        <div class="list-container">
            <ul id="school_list">
                @foreach($schools as $school)
                    <li class="active" onclick="showSchoolViewProfile(true); showReports(false); showSchoolEditProfile(false);">
                        <div class="student">
                            <img src="{{ asset('assets/images/default-user.png') }}">
                            <input type="hidden" id="school_id" value="{{ $school->id }}">
                            <span class="name">{{ $school->name }}</span>
                        </div>
                    </li>
                @endforeach


            </ul>
        </div>

        <div class="side-bar-footer">
            <ul>
                <li class="num-student"><b>{{ $schools->count() }}</b> schools</li>
                <li class="add-student" data-toggle="modal" data-target=".bs-example-modal-lg3" style="position:absolute; right:5px; top:15px;">
                    <span><a href="#">ADD SCHOOL</a></span>
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
                            <li><a href="#"> <img src="{{ asset('assets/images/initial-logo.png') }}"> The Martial Arts University </a></li>
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
                School Profile
                <div class="close-panel-icon" onclick="showSchoolViewProfile(false); showReports(true);"><i class="fa fa-times"></i></div>
            </div>
            <div class="profile-view">
                <div class="col-lg-3 profile-pic">
                    <img class="picture" src="{{ asset('assets/images/default-user.png') }}">
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
                                <a href="#" style="padding-left:50px;"> <img src="{{ asset('assets/images/logo.png') }}"> <labelname>CREATE TMAU ACCOUNT</labelname> </a>
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
                            <li><a href="#"> <img src="{{ asset('assets/images/initial-logo.png') }}"> The Martial Arts University </a></li>
                            <li style="margin-top:20px;"> | </li>
                            <li style="margin-top:10px;"> <a href="#">Have a feedback?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    <div class="main-content" id="content3" style="display:none; opacity:0;">
        <div class="content-header">
            Update School
            <div class="close-panel-icon" onclick="showStudentViewProfile(false); showReports(true);"><i class="fa fa-times"></i></div>
        </div>
        <div class="profile-edit profile-view">
            <div class="col-lg-3 profile-pic">
                <div class="image-container">
                    <img src="http://localhost/martialarts-development/themartialarts/dev/assets/images/default-user.png">
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
                        <div id="cancel-bttn" class="gray-bttn unick-bttn" onclick="showSchoolViewProfile(true);showSchoolEditProfile(false);" style="float:right">
                            <i class="fa">Cancel</i>
                        </div>
                        <div class="orange-bttn unick-bttn" onclick="showSchoolViewProfile(true);showSchoolEditProfile(false);" style="float:right" id="save_edit">
                            <i class="fa-save fa"> Save </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- modal popup for the adding of school -->
    <div class="modal fade bs-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rs_edit_popup" style="background:#ececec;">
                <div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
                <div class="style_edit_detail_container" id="new_school_modal">

                    <div class="col-lg-12">
                        <div>
                            <h4 class="page-header">School Information</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>School name</label>
                            <input class="form-control" type="text" placeholder="School Name" id="school_name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>School country</label>
                            <input class="form-control" type="text" placeholder="Country" id="school_country">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Birth State</label>
                            <input class="form-control" type="text" placeholder="State" id="school_state">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>School city</label>
                            <input class="form-control" type="text" placeholder="City" id="school_city">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>School street</label>
                            <input class="form-control" type="text" placeholder="Street" id="school_street">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>School contact</label>
                            <input class="form-control" type="text" placeholder="contact number" id="school_contact_no">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div>
                            <h4>School Owner Information</h4>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>first name</label>
                            <input class="form-control" type="text" placeholder="first name" id="owner_fname">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>last name</label>
                            <input class="form-control" type="text" placeholder="last name" id="owner_lname">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>owner country</label>
                            <input class="form-control" type="text" placeholder="Address" id="owner_country">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>owner city</label>
                            <input class="form-control" type="text" placeholder="Address" id="owner_city">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>owner street</label>
                            <input class="form-control" type="text" placeholder="Address" id="owner_street">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>contact number</label>
                            <input class="form-control" type="text" placeholder="Contact Number" id="owner_contact_no">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Birth Date</label>
                            <input type="text" class="form-control" name="birthdate" placeholder="mm/dd/yy" id="owner_birthdate">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" placeholder="Email Address" id="owner_email">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button class="form-control btn btn-md btn-success" type="submit" id="new_school_btn">add school</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of code -->



@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            var activated = false;

            $('#new_school_btn').on('click', function(){

                console.log('clicked new school save!');
                var data = {
                    'owner' : {
                        'first_name' : $('#new_school_modal').find('#owner_fname').val() ,
                        'last_name' : $('#new_school_modal').find('#owner_lname').val() ,
                        'country' : $('#new_school_modal').find('#owner_country').val() ,
                        'city' : $('#new_school_modal').find('#owner_city').val() ,
                        'street' : $('#new_school_modal').find('#owner_street').val() ,
                        'contact_no' : $('#new_school_modal').find('#owner_contact_no').val() ,
                        'email' : $('#new_school_modal').find('#owner_email').val() ,
                        'birthdate' : $('#new_school_modal').find('#owner_birthdate').val()
                    },
                    'school' : {
                        'name' : $('#new_school_modal').find('#school_name').val() ,
                        'country' : $('#new_school_modal').find('#school_country').val() ,
                        'state' : $('#new_school_modal').find('#school_state').val() ,
                        'city' : $('#new_school_modal').find('#school_city').val() ,
                        'street' : $('#new_school_modal').find('#school_street').val() ,
                        'contact_no' : $('#new_school_modal').find('#school_contact_no').val()
                    }
                }

                $.ajax({
                    url : 'http://localhost/martialarts-development/themartialarts/dev/addschool',
                    method : 'POST',
                    data : data,
                    success : function(data)
                    {
                        console.log(data);
                        if(data.status == 200)
                        {
                            var row = "<li onclick='showSchoolViewProfile(true); showReports(false); showSchoolEditProfile(false);'>"+
                                    "<div class='student'>" +
                                    "<img src='http://localhost/martialarts-development/themartialarts/dev/assets/images/default-user.png'>" +
                                    "<span class='name'>"+ data.payload.name +"</span>"+
                                    "<input type='hidden' id='school_id' value='"+ data.payload.id+"'>"
                            "</div>" +
                            "</li>"

                            $('#school_list').append(row);
                            clear_form_elements('style_edit_detail_container');
                        }

                        $('.modal').modal('hide');
                    },
                    error : function()
                    {
                        console.log('error')
                    }
                });
                console.log(data);
            });


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

            $('#dataTables-example').DataTable({
                responsive: true
            });

            $('#1dataTables-example').DataTable({
                responsive: true
            });

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
        function showSchoolViewProfile(bol)
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
        function showSchoolEditProfile(bol)
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

        function clear_form_elements(class_name) {
            jQuery("."+class_name).find(':input').each(function() {
                switch(this.type) {
                    case 'password':
                    case 'text':
                    case 'textarea':
                    case 'file':
                    case 'select-one':
                    case 'select-multiple':
                    case 'date':
                    case 'number':
                    case 'tel':
                    case 'email':
                        jQuery(this).val('');
                        break;
                    case 'checkbox':
                    case 'radio':
                        this.checked = false;
                        break;
                }
            });
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
    </script>
@endsection
