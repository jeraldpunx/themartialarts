@extends('organizer.layout')

@section('css')
    <script src="{{ asset('assets/js/jscolor.js') }}"></script>
@endsection

@section('content')


    <div class="horizontal_content">
        <div class="container">
            <div class="group_content col-lg-12">
                <div class="group_header col-lg-12">
                    Organization Details
                    <div class="unick_helptip">
                        <div class="tip_icon">
                            <p>?</p>
                        </div>
                        <div class="tip_message">
                            <div class="pointer"></div>
                            The School Settings portion of these field requirements is where you'll be writing your organizations's name and other important information.
                        </div>
                    </div>
                </div>
                <div class="group_tile">
                    <div class="form-group col-lg-12">
                        <input type="text" placeholder="Organization Name" class="form-control" id="organization_name" name="organization_name">
                    </div>
                </div>
                <div class="group_tile">
                    <div class="form-group col-lg-12">
                        <input type="text" placeholder="organization description" class="form-control" id="organization_desc" name="organization_desc">
                    </div>
                </div>
            </div>
            <div class="group_content col-lg-12">
                <div class="group_header col-lg-12">
                    Organization Owner Information
                    <div class="unick_helptip">
                        <div class="tip_icon">
                            <p>?</p>
                        </div>
                        <div class="tip_message">
                            <div class="pointer"></div>
                            The Account Information portion of these field requirements is where you'll be writing your your first name, surename and other important information.
                        </div>
                    </div>
                </div>
                <div class="group_tile" id="owner_details">
                    <div class="form-group col-lg-6">
                        <input type="text" placeholder="First Name" class="form-control" id="first_name" name="first_name">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="text" placeholder="Last Name" class="form-control" id="last_name" name="last_name">
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="email" placeholder="Email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="password" placeholder="Password" class="form-control" id="owner_password" name="password">

                    </div>

                    <div class="form-group col-lg-6">
                        <input type="password" placeholder="Re-type Password" class="form-control" id="owner_retype_pass" name="retype_pass">
                    </div>

                </div>
            </div>

            <div class="group_content col-lg-12">
                <div class="group_header col-lg-12">
                    Styles and Ranks
                    <div class="unick_helptip">
                        <div class="tip_icon">
                            <p>?</p>
                        </div>
                        <div class="tip_message">
                            <div class="pointer"></div>
                            The Styles and Ranks portion of these field requirements is where you'll be writing your school's default or predefined styles and ranks.
                        </div>
                    </div>
                </div>
                <div class="group_tile">
                    <div class="col-lg-2 tile rank_tiles">
                        <div class="tile_close"><i class="fa-times fa"></i></div>
                        <div class="tile_item" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="tile_background">
                                <i class="fa-pencil fa-2x fa"></i>
                            </div>
                            <div class="tile_header">Judo</div>
                            <div class="tile_footer">1 Student</div>
                        </div>
                    </div>

                    <div class="col-lg-2 tile rank_tiles">
                        <input type="hidden" value="muay thai" id="rank_name" name="rank_name">
                        <div class="tile_close"><i class="fa-times fa"></i></div>
                        <div class="tile_item" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="tile_background">
                                <i class="fa-pencil fa-2x fa"></i>
                            </div>
                            <div class="tile_header">Judo</div>
                            <div class="tile_footer">1 Student</div>
                        </div>
                    </div>

                    <div class="col-lg-2 tile rank_tiles">
                        <input type="hidden" value="MMA" id="rank_name" name="rank_name">
                        <div class="tile_close"><i class="fa-times fa"></i></div>
                        <div class="tile_item" data-toggle="modal" data-target=".bs-example-modal-lg">
                            <div class="tile_background">
                                <i class="fa-pencil fa-2x fa"></i>
                            </div>
                            <div class="tile_header">Judo</div>
                            <div class="tile_footer">1 Student</div>
                        </div>
                    </div>

                    <div class="col-lg-2 tile rank_tiles" id="add_style">
                        <input type="hidden" value="judo" id="rank_name" name="rank_name">
                        <div class="tile_add" data-toggle="modal" data-target="#add_style_modal">
                            <div class="tile_content">
                                <i class="fa fa-plus"></i>
                                <p>ADD NEW STYLE</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="group_content col-lg-12" style="border-top:1px solid #cecece">
                <div class="blue-bttn unick-bttn" style="padding:20px; float:right; font-weight:bold; color:white; font-size:20px; text-align:center; min-width:200px;">
                    <a id="submit_btn" href="#"><labelname>Submit</labelname></a>
                </div>
            </div>
        </div>
    </div>

    <!-- add style modal -->
    <div class="modal fade bs-example-modal-lg" id="add_style_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rs_edit_popup" style="background:#ececec;">
                <div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
                <div class="col-lg-12" style="margin-top:15px;">
                    <div class="style_name">

                        <input type="text" name="style_name" placeholder="type style name here" id="style_name">
                        <textarea placeholder="Description" id="style_desc"></textarea>
                    </div>
                </div>
                <div class="main_container ranks_table">
                    <table class="table" id="diagnosis_list">
                        <thead>
                        <tr><th>Rank</th><th>Name of Rank</th><th>Belt</th></tr>
                        </thead>
                        <tbody id="rank_list">
                        <tr onclick="view_rank()" >
                            <td class='priority'>1</td>
                            <td id="rank_name">White Belter</td>
                            <td>
                                <div class="item_belt">
                                    <ul id='1belt'>
                                        <li class="first" style="height:33.333%; background:white;"></li>
                                        <li class="second" style="height:33.333%; background:white;"></li>
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
    <!-- end add style modal -->

    <!-- popup -->
    <div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rs_edit_popup" style="background:#ececec;">
                <div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
                <div class="col-lg-12" style="margin-top:15px;">
                    <div class="style_name">

                        <input type="text" name="style_name" placeholder="type style name here" id="style_name">
                        <textarea placeholder="Description" id="style_desc"></textarea>
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
                                    <ul id='1belt'>
                                        <li class="first" style="height:33.333%; background:white;"></li>
                                        <li class="second" style="height:33.333%; background:white;"></li>
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
    @endsection
            <!-- bootstrap javascript -->


    <!-- inline javascript code -->
@section('script')
    <script type="text/javascript">




        var styles = {};

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



            $('#submit_btn').on('click', function()
            {
                var org_data = {
                    'name' : $('#organization_name').val(),
                    'description' : $('#organization_desc').val()
                };

                var style_data = {
                    'name' : $('#style_name').val(),
                    'description' : $('#style_desc').val()
                };

                var owner_data = {
                    'first_name' :  $('#owner_details #first_name').val(),
                    'last_name' :  $('#owner_details #last_name').val(),
                    'email' :  $('#owner_details #email').val(),
                    'password' :  $('#owner_details #owner_password').val(),
                };

                console.log(org_data);
                console.log(style_data);
                console.log(owner_data);
            });

            var delay = (function(){
                var timer = 0;
                return function(callback, ms){
                    clearTimeout (timer);
                    timer = setTimeout(callback, ms);
                };
            })();



            $("#owner_retype_pass, #owner_password").keyup(function() {
                delay(function(){
                    checkIfPasswordMatch();
                }, 1000 );
            });

            $("#owner_password").keyup(function() {
                delay(function(){
                    checkPasswordLength();
                }, 1000 );
            });
//        $("#owner_password").on('change',checkIfPasswordMatch);
            function checkPasswordLength()
            {
                console.log($('#owner_password').val().length);
            }

            function checkIfPasswordMatch()
            {
                var password = $("#owner_password").val();
                var confirmPassword = $("#owner_retype_pass").val();

                if (password != confirmPassword)
                    $("#owner_password").css("border-color",'red');
                else
                    $("#owner_password").css("border-color",'#ccc');
            }
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

@endsection
