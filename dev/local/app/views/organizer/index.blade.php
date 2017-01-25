@extends('instructor.layout')

@section('content')
    <div class="sidebar">
        <div class="search-box">
            <input type="text" placeholder="Search">
            <p class="fa-search fa"></p>
        </div>

        <div class="side-bar-settings">
            <a style="background:#999; cursor:pointer; font-size:9px;position:absolute; margin-top:3px; margin-left:3px; padding:3px;" data-toggle="modal" data-target="#filter"><i class="fa-filter fa"></i> FILTER</a>
            <ul>
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
        </div>

        <div class="list-container">
            <ul>
                <li>
                    <div class="student">
                        <img src="images/linabo-gate.jpg">
                        <span class="name">Uelmar Ortega</span>
                        <span class="student_title">MILITARY COMPLEX</span>
                    </div>
                </li>
                <li>
                    <div class="student">
                        <img src="images/linabo-gate.jpg">
                        <span class="name">Uelmar Ortega</span>
                        <span class="student_title">MILITARY COMPLEX</span>
                    </div>
                </li>
                <li>
                    <div class="student">
                        <img src="images/linabo-gate.jpg">
                        <span class="name">Uelmar Ortega</span>
                        <span class="student_title">MILITARY COMPLEX</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="side-bar-footer">
            <ul>
                <li class="num-student"><b>1</b> student</li>
                <li class="add-student">
                    <span>ADD NEW STUDENT</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="base-container">
        <div class="main-content" id="view_profile">

            <div class="content-header">Student Profile</div>
            <div class="profile-view">
                <div class="col-lg-4 profile-pic">
                    <img src="images/linabo-gate.jpg">
                </div>
                <div class="col-lg-4 info-field">
                    <div class="name">Uelmar Ortega</div>
                    <div class="field">
                        <div class="field-label">
                            BIRTHDATE
                        </div>
                        <div class="field-value">
                            July 18, 1995
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-label">
                            CONTACT NUMBER
                        </div>
                        <div class="field-value">
                            09072994567
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 info-field">
                    <div class="field" style="margin-top:55px;">
                        <div class="field-label">
                            EMAIL
                        </div>
                        <div class="field-value">
                            uelmar_ortega@yahoo.com
                        </div>
                    </div>
                    <div id="edit-bttn" class="orange-bttn unick-bttn" style="float:right">
                        <i class="fa-edit fa"> Edit </i>
                    </div>
                </div>


            </div>
        </div>
        <div class="main-content" id="edit_profile" style="display:none; opacity:0;">
            <div class="content-header">Update Student</div>
            <div class="profile-edit profile-view">
                <div class="col-lg-4 profile-pic">
                    <img src="images/linabo-gate.jpg">
                </div>
                <div class="col-lg-4 info-field">
                    <div class="field">
                        <div class="field-label">
                            NAME
                        </div>
                        <div class="field-value">
                            <input type="text">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-label">
                            EMAIL
                        </div>
                        <div class="field-value">
                            <input type="text">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-label">
                            Sample Dropdown
                        </div>
                        <div class="field-value">
                            <select>
                                <option value>SELECT CLASS</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 info-field">
                    <div class="field">
                        <div class="field-label">
                            CONTACT NUMBER
                        </div>
                        <div class="field-value">
                            <input type="text">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field-label">
                            Birthdate
                        </div>
                        <div class="field-value">
                            <input type="date" id="datepicker" name="bday">
                        </div>
                    </div>
                    <div id="cancel-bttn" class="gray-bttn unick-bttn" style="float:right">
                        <i class="fa">Cancel</i>
                    </div>
                    <div class="orange-bttn unick-bttn" style="float:right">
                        <i class="fa-save fa"> Save </i>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div id="filter" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Profile Search</h4>
                </div>
                <div class="modal-body profile-search">

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
                    <div class="radio_inputs">
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




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Search</button>
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                </div>
            </div>

        </div>
    </div>


    <!-- this html section is for the notifier -->
    <div class="notifier" id="notifier1">
        <span class="this_icon"></span><span class="text"></span>
    </div>


@endsection



@section('script')
    <script type="text/javascript">


        $("#sample_alert").click(function(){

            // this code is used to trigger the notifier
            // noty.notify("<ul><li>test</li><li>test</li><li>test</li></ul>","danger",0);
            displayNotifit("<ul><li>test</li><li>test</li><li>test</li></ul>", true);
        });


        $("#edit-bttn").click(function(){
            // document.getElementById("view_profile").style.left = "-100%";
            document.getElementById("edit_profile").style.display = "block";
            setTimeout(function(){
                document.getElementById("edit_profile").style.opacity = "1";
                document.getElementById("view_profile").style.opacity = "0";
                // document.getElementById("edit_profile").style.left = "0px";
                setTimeout(function(){
                    document.getElementById("view_profile").style.display="none";
                },500);
            },10);
        });

        $("#cancel-bttn").click(function(){
            // document.getElementById("edit_profile").style.left = "100%";
            document.getElementById("view_profile").style.display = "block";
            setTimeout(function(){
                document.getElementById("view_profile").style.opacity = "1";
                document.getElementById("edit_profile").style.opacity = "0";
                // document.getElementById("view_profile").style.left = "0px";
                setTimeout(function(){
                    document.getElementById("edit_profile").style.display="none";
                },500);
            },10);
        });
    </script>
@endsection