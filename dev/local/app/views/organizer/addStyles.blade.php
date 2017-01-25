@extends('organizer.layout')
@section('content')


<div class="horizontal_content">
    <div class="container" id="sample">
        <div class="group_content">
            <div class="group_header">Styles and Ranks</div>
            <div class="group_tile" id="style_list">
                @if(!$styles)
                    <h2> no styles yet!.</h2>
                @endif
                @foreach($styles as $style)
                    <div class="col-lg-2 tile styles_list">
                        <div class="tile_close"><i class="fa-times fa"></i></div>
                        <div class="tile_item styles" data-toggle="modal" data-id="{{ $style->id }}" data-target=".bs-example-modal-lg">
                            <input type="hidden" value="{{ $style->name  }}" id="style_id_hidden" data-id="{{ $style->id }}">
                            <div class="tile_background">
                                <i class="fa-pencil fa-2x fa"></i>
                            </div>
                            <div class="tile_header" id='style_name_header'>{{ $style->name }}</div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-2 tile" id="addStyle">
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="style_modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rs_edit_popup" style="background:#ececec;">
            <div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
            <div class="col-lg-12" style="margin-top:15px;">
                <div class="style_name">
                    <input type="text" name="style_name" placeholder="Style Name" value="" id="style_name">
                    <textarea placeholder="Description" class="style_description" id="style_desc"></textarea>
                </div>
            </div>
            <div class="main_container ranks_table">
                <input type="hidden" value="" id="style_id_modal">
                <table class="table" id="diagnosis_list">
                    <thead>
                    <tr><th>Rank</th><th>Name of Rank</th><th>Belt</th></tr>
                    </thead>
                    <tbody id="rank_list">



                    {{--<tr onclick="view_rank()">--}}
                        {{--<td class='priority'>1</td>--}}
                        {{--<td>White Belter</td>--}}
                        {{--<td>--}}
                            {{--<div class="item_belt">--}}
                                {{--<ul>--}}
                                    {{--<li style="height:33.333%; background:white;"></li>--}}
                                    {{--<li style="height:33.333%; background:white;"></li>--}}
                                    {{--<li style="height:33.333%; background:white;"></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td class='priority'>2</td>--}}
                        {{--<td>Red Belter</td>--}}
                        {{--<td>--}}
                            {{--<div class="item_belt">--}}
                                {{--<ul>--}}
                                    {{--<li style="height:33.333%; background:red;"></li>--}}
                                    {{--<li style="height:33.333%; background:white;"></li>--}}
                                    {{--<li style="height:33.333%; background:red;"></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td class='priority'>3</td>--}}
                        {{--<td>Yellow Belter</td>--}}
                        {{--<td>--}}
                            {{--<div class="item_belt">--}}
                                {{--<ul>--}}
                                    {{--<li style="height:33.333%; background:yellow;"></li>--}}
                                    {{--<li style="height:33.333%; background:white;"></li>--}}
                                    {{--<li style="height:33.333%; background:yellow;"></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
                <div class="rank_edit_bttn">
                    <div onclick="view_rank()" class="orange-bttn unick-bttn" style="float:left">
                        <i class="fa-plus fa"> Add Rank </i>
                    </div>
                    <div id="save_style" class="green-bttn unick-bttn" style="float:right">
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
                        <input type="text" name="rank_name" placeholder="Rank Name" id="rank_name">
                    </div>
                    <div class="color_pickers">
                        <div class="col-lg-6">
                            <span>Primary Color</span>
                            <button id="secondary_color_btn" class="jscolor {valueElement:'chosen-value1', onFineChange:'setTextColor1(this)'}"></button>
                            <input type="text" id="chosen-value1" name="primary_color_input" value="FFFFFF">
                        </div>
                        <div class="col-lg-6">
                            <span>Secondary Color</span>
                            <button id="secondary_color_btn" class="jscolor {valueElement:'chosen-value2', onFineChange:'setTextColor2(this)'}"></button>
                            <input type="text" id="chosen-value2" name="secondary_color_input" value="FFFFFF">
                        </div>
                    </div>
                    <div class="belt_patterns">
                        <div class="row">
                            <div class="col-lg-12" id="belt_type">
                                <div style="font-size:20px; padding:10px; padding-bottom:0px;">Choose Pattern</div>
                                <div class="belt_container">
                                    <div class="belt belt-small active" onclick="chooseSolid(this)" data-value="solid">
                                        <ul>
                                            <li style="height:100%; background:white;" class="primary_color"></li>
                                        </ul>
                                    </div>
                                    <center>Solid</center>
                                </div>
                                <div class="belt_container">
                                    <div class="belt belt-small" onclick="chooseDouble(this)" data-value="double">
                                        <ul>
                                            <li style="height:50%; background:white;" class="primary_color"></li>
                                            <li style="height:50%; background:white;" class="secondary_color"></li>
                                        </ul>
                                    </div>
                                    <center>Double</center>
                                </div>
                                <div class="belt_container">
                                    <div class="belt belt-small" onclick="chooseStripe(this)" data-value="stripe">
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
                    <div onclick="view_rank_table()" class="orange-bttn unick-bttn" id="save_rank" style="float:right">
                        <i class="fa-edit fa"> Save Rank </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
        <!-- end of code -->
<!-- bootstrap javascript -->

@section('script')

<script src="{{ asset('assets/js/jscolor.js') }}"></script>
<!-- inline javascript code -->
<script type="text/javascript">

    //global object scope variables
    var style = JSON.parse('{{ $styles }}');
    var isChanged = false;
    var modal_opened = false;
    var selected_element = '';
    var requestQueue = false;
    var style_selected = '';
    var selected_style = {
        'ranks' : {},
        'style' : {}
    };

    //end global object scope variables


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
        primary_color = picker.toString();
    }

    // this function will be triggered after the secondary color is selected
    function setTextColor2(picker) {
        secondary_color_change(picker.toString());
        secondary_color = picker.toString();
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
        //global styles
         var save_rank_queue = false;
        $('#chosen-value1').on('keyup',function() {

            setTimeout(function () {
                $(this).focus();

                setTimeout(function () {
                    $('#chosen-value2').focus();
                    $('#rank_name').focus();
                }, 80);
                console.log('naay nabag.o');
            },1000);
        });

        $('#save_rank').on('click', function()
        {

            console.log('save clicked');
            var primary_color = $('#chosen-value1').val();
            var secondary_color = $('#chosen-value2').val();
            var name = $('#rank_name').val();
            var type = $('#belt_type').find('.active').attr('data-value');

            console.log(save_rank_queue);
            if(!save_rank_queue)
            {
                save_rank_queue = true;
                console.log(save_rank_queue);
                addToRankList(name,primary_color,secondary_color,type);
            }

            setTimeout(function(){
                save_rank_queue = false;
            }, 2000);

            disableBtnTemp($(this),3);
            console.log(primary_color,secondary_color,'color');
        });

        $('#save_style').on('click', function()
        {
            if(modal_opened == 'add')
            {
                saveStyle();
            }
            if(modal_opened ==='update')
            {
                console.log('update');
                updateStyle(style_selected);
            }

        });

        $('.styles_list').on('click',function()
        {
            console.log('tile ko');
            var val = $(this).find('#style_id_hidden').val();
            console.log($(this).find('#style_id_hidden').val());
            console.log(val);
        });

        $('#style_modal').on('shown.bs.modal', function() {
            console.log('hello');

            var val = $(this).find('#style_id_modal').val();
            style_selected = val;
            if(val === "")
            {
                modal_opened = 'add';
            }
            else
            {
                modal_opened = 'update';
            }

        });

        $('#style_modal').on('hidden.bs.modal', function () {
            // do something…
            console.log('modal closed');
            modal_opened = false;
            selected_style['style'] = {};
            selected_style['ranks'] = {};
            selected_element = '';
            style_selected = '';
            $('#style_name').val('');
            $('#style_desc').val('');
            $('#rank_list').empty();
            $('#style_id_modal').val('');
        });
        // this code is for the draggable row
        //Helper function to keep table row from collapsing when being sorted
        $('#addStyle').on('click', function()
        {
            $('#rank_list').empty();
            $('#style_name').val('');
            $('#style_desc').val('');
        });

        function saveStyle()
        {
            var ranks = getRanksFromModal();
            var style = {
                'name' : $('#style_name').val(),
                'description' : $('#style_desc').val()
            };
            if(!requestQueue) {

                requestQueue = true;

                $.ajax({
                    method: 'POST',
                    url: "{{ URL::to('org/addstyle') }}",
                    data: {
                        'style': style,
                        'ranks': ranks
                    },
                    success: function (data) {
                        console.log(data);
                        $('#style_modal').modal('hide');

                        addToStyleList(data.data.id, data.data.name);
                        requestQueue = false; // clear request queue
                    },
                    error: function(e) {
                        requestQueue = false; // clear request queue
                    }

                });
            }

        }

        function updateStyle()
        {
            var ranks = getRanksFromModal();
            var style = {
                'id' : selected_style['style'].id,
                'name' : $('#style_name').val(),
                'description' : $('#style_desc').val()
            };

            if(!requestQueue) {

                requestQueue = true;

                $.ajax({
                    method: 'POST',
                    url: "{{ URL::to('org/style/edit') }}",
                    data: {
                        'style': style,
                        'ranks': ranks
                    },
                    success: function (data) {
                        console.log(data);
                        $('#style_modal').modal('hide');
                        $(selected_element).find('#style_name_header').html(style.name);
                        requestQueue = false; // clear request queue
                    },
                    error : function () {
                        requestQueue = false; // clear request queue
                    },

                });
            }

        }


        function addToRankList(name,first_color,second_color,type)
        {

            var level = $('#rank_list >tbody >tr').length+1;
            if(type == 'solid')
            {
                console.log('solid row');
                var row = "<tr id=''>"
                        +"<td class='priority' id='rank_level'>"+ level+"</td>"
                        +"<td id='style_rank_name'> "+ name +" </td>"
                        +"<td>"
                        +"<div class='item_belt' data-belt-type='"+ type +"'>"
                        +"<ul>"
                        +"<li style='height:100%; background:#"+ first_color +";' id='style_primary' data-primary='"+first_color+"'></li>"
                        +"</ul>"
                        +"</div>"
                        +"</td>"
                        +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                        +"</tr>";
                $('#rank_list').append(row);
            }

            if(type == 'double')
            {
                console.log('double row');
                var row = "<tr>"
                        +"<td class='priority' id='rank_level'>"+ level+"</td>"
                        +"<td id='style_rank_name'> "+ name +" </td>"
                        +"<td>"
                        +"<div class='item_belt' data-belt-type='"+ type +"'>"
                        +"<ul>"
                        +"<li style='height:50%; background:#"+ first_color +";' id='style_primary' data-primary='"+first_color+"'></li>"
                        +"<li style='height:50%; background:#"+ second_color +";' id='style_secondary' data-secondary='"+second_color+"''></li>"
                        +"</ul>"
                        +"</div>"
                        +"</td>"
                        +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                        +"</tr>";
                $('#rank_list').append(row);
            }
            if(type == 'stripe')
            {
                console.log('stripe row');
                var row = "<tr>"
                        +"<td class='priority' id='rank_level'>"+ level+"</td>"
                        +"<td id='style_rank_name'> "+ name +" </td>"
                        +"<td>"
                        +"<div class='item_belt' data-belt-type='"+ type +"'>"
                        +"<ul>"
                        +"<li style='height:33.3333%; background: #"+ first_color +";' id='style_primary' data-primary='"+first_color+"'></li>"
                        +"<li style='height:33.3333%; background: #"+ first_color +";' id='style_primary' data-primary='"+first_color+"'></li>"
                        +"<li style='height:33.3333%; background: #"+ second_color +";' id='style_secondary' data-secondary='"+second_color+"'></li>"

                        +"</ul>"
                        +"</div>"
                        +"</td>"
                        +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                        +"</tr>";


                $('#rank_list').append(row);
            }

            renumber_table('#rank_list');
        }

        function getRankDetail()
        {

        }

        function getRanks(id,elem,name)
        {
            $('#style_name').val(name);

            $('#rank_list').empty();
            $.get(" {{URL::to('json/ranks') }}?style="+id,function(data)
            {

                selected_style['ranks'] = data;
                console.log(data);
                $.each(data, function(index, value)
                {

                    if(value.type == 'solid')
                    {
                        var row = "<tr id=''>"
                                +"<td class='priority' id='rank_level'>"+ value.level+"</td>"
                                +"<td id='style_rank_name'>"+ value.name +" </td>"
                                +"<td>"
                                +"<div class='item_belt' data-belt-type='"+ value.type +"'> "
                                +"<ul>"
                                +"<li style='height:100%; background:#"+ value.primary_color +";' id='style_primary' data-primary='"+value.primary_color+"'></li>"
                    +"</ul>"
                    +"</div>"
                    +"</td>"
                    +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                    +"</tr>";


                        $('#rank_list').append(row);
                    }
                    if(value.type == 'double')
                    {
                        var row = "<tr>"
                                +"<td class='priority' id='rank_level'>"+ value.level+"</td>"
                                +"<td id='style_rank_name'>"+ value.name +"</td>"
                                +"<td>"
                                +"<div class='item_belt' data-belt-type='"+ value.type +"'>"
                                +"<ul>"
                                +"<li style='height:50%; background:#"+ value.primary_color +";' id='style_primary' data-primary='"+value.primary_color+"'></li>"
                                +"<li style='height:50%; background:#"+ value.secondary_color +";' id='style_secondary' data-secondary='"+value.secondary_color+"'></li>"
                                +"</ul>"
                                +"</div>"
                                +"</td>"
                                +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                                +"</tr>";
                        $('#rank_list').append(row);
                    }
                    if(value.type == 'stripe')
                    {
                        var row = "<tr>"
                                +"<td class='priority' id='rank_level'>"+ value.level+"</td>"
                                +"<td id='style_rank_name'>"+ value.name +"</td>"
                                +"<td>"
                                +"<div class='item_belt' data-belt-type='"+ value.type +"'>"
                                +"<ul>"
                                +"<li style='height:33.3333%; background:#"+ value.primary_color +";' id='style_primary' data-primary='"+value.primary_color+"'></li>"
                                +"<li style='height:33.3333%; background:#"+ value.secondary_color +";' id='style_secondary' data-secondary='"+value.secondary_color+"'></li>"
                                +"<li style='height:33.3333%; background:#"+ value.primary_color +";'></li>"
                                +"</ul>"
                                +"</div>"
                                +"</td>"
                                +"<td class='remove_rank'><p class='fa fa-times-circle-o'></p></td>"
                                +"</tr>";

                        $('#rank_list').append(row);
                    }
                    console.log(value)

                });
            });
        }

        function addToStyleList(id,name)
        {
                var tile = "<div class='col-lg-2 tile styles_list'>"
                         +"<div class='tile_close'><i class='fa-times fa'></i></div>"
                         +"<div class='tile_item styles' data-toggle='modal' data-id='"+id+"' data-target='.bs-example-modal-lg'>"
                         +"<input type='hidden' value='"+name+"' id='style_id_hidden' data-id='"+id+"'>"
                         +"<div class='tile_background'>"
                         +"<i class='fa-pencil fa-2x f'></i>"
                         +"</div>"
                         +"<div class='tile_header' id='style_name_header'>"+name+"</div>"
                         +"</div>"
                         +"</div>";


                console.log(rows);
//                $('#style_list div:nth-child('+ rows +')').after(tile);
                $('#addStyle').before(tile);
                bindOnClickStyle('.styles');

        }


        function getRanksFromModal()
        {
            var table = $('#rank_list tr');
            var ranks_data = [];
            $.each(table, function(index,value)
            {
                console.log(value);
                var data = {
                    'rank_level' : $(this).find('#rank_level').html(),
                    'name' : $(this).find('#style_rank_name').html(),
                    'type' : $(this).find('.item_belt').attr('data-belt-type'),
                    'level' : $(this).find('#rank_level').html(),
                    'primary_color' : $(this).find('#style_primary').attr('data-primary'),
                    'secondary_color' : $(this).find('#style_secondary').attr('data-secondary')
                };
                ranks_data.push(data);
            });

            console.log(ranks_data);

            return ranks_data;
        }

        $('.priority').on('click', function()
        {
            console.log('he');
        });

        $('.styles').on('click', function()
        {
            console.log($(this).find('#style_id_hidden').attr('data-id'));
            var id = $(this).find('#style_id_hidden').attr('data-id');

            var elem = $(this);
            selected_element = $(this);
            var name = elem.find('#style_id_hidden').val();

            selected_style['style']['id'] = id;
            selected_style['style']['name'] = name;

            $('#style_id_modal').val(id);
            getRanks(id, elem, name);
        });

        function bindOnClickStyle(element)
        {
            $(element).on('click', function()
            {
                console.log($(this).find('#style_id_hidden').attr('data-id'));
                var id = $(this).find('#style_id_hidden').attr('data-id');

                var elem = $(this);
                var name = elem.find('#style_id_hidden').val();

                selected_style['style']['id'] = id;
                selected_style['style']['name'] = name;

                $('#style_id_modal').val(id);
                getRanks(id, elem, name);
            });
        }

        function disableBtnTemp(btn,secs)
        {
            event.preventDefault();
            $(btn).attr('disabled','disabled');
            var time = secs || 1;
            setTimeout(function(){
                btn.prop('disabled', false);
            }, time *1000);
        }

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
        $('table').on('click','.remove_rank',function() {
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
                $(this).find('#style_level').val(count);
            });


        }
    });

</script>
@endsection