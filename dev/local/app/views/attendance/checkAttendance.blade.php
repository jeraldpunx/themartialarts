@extends('admin.layout')

@section('content')
<div data-id="{{ $class[1]['id'] }}" id="class_id">
</div>
<div class="container-fluid">
    <div class="row">
        <div class="wrapper">
            <div class="col-md-2">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">check attendance</a></li>
                      <li class=""><a href="#tab2" data-toggle="tab">courses</a></li>
                      <li class=""><a href="#tab3" data-toggle="tab">faculty</a></li>                               
                    </ul>
                </nav>
            </div>

            <div class="col-md-10">
                    	<h4>Students</h4>	  
                <div class="panel panel-default">
                    @yield('panel')
                    <div class="list-group" id="student_list">	
					  @foreach($students as $student)
					  <a href="#"  class="list-group-item" data-id="{{ $student['id'] }}">{{ $student['first_name'] }} {{ $student['last_name']}} <i class="glyphicon glyphicon-ok pull-right" style="margin-right:8px;"></i> 
					  <!-- <i class="glyphicon glyphicon-remove pull-right" style="margin-right:8px;"></i> -->
					  </a>
					  @endforeach
					</div>
                </div>
                <h4>Present</h4>
                <div class="panel panel-default" id="present">
                <a href="#" class="list-group-item" data-id="1">Eldrin Paul Gok-ong <i class="glyphicon glyphicon-remove pull-right"  style="margin-right:8px;"></i></a>
                </div>
                <h4>absent</h4>
                <div class="panel panel-default" id="absents">
                <a href="#" class="list-group-item" data-id="1">Jerald Punx <i class="glyphicon glyphicon-remove pull-right"  style="margin-right:8px;"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>
<main class="container-fluid">
    <div id="main-content" class="col-sm-12">
    	<h2>Attendance</h2>

        <!-- <ul class="list-group" id='student_list'>
		  <li class="list-group-item" id='first_item'>first_item<i></li>
		  <li class="list-group-item">Dapibus ac facilisis in</li>
		  <li class="list-group-item">Morbi leo risus</li>
		  <li class="list-group-item">Porta ac consectetur ac</li>
		  <li class="list-group-item">Vestibulum at eros</li>
		</ul> -->

		<!-- <div class="list-group" id="student_list">
		  <a href="#" class="list-group-item">
		    Cras justo odio
		  </a>	
		  <a href="#" class="list-group-item" id="first_item">Dapibus ac facilisis in</a>
		  <a href="#" class="list-group-item">Morbi leo risus</a>
		  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
		  <a href="#" class="list-group-item">Vestibulum at eros</a>
		</div> -->
		<!-- <div class="list-group" id="student_list">		  
		  @foreach($students as $student)
		  <a href="#" class="list-group-item" data-id="{{ $student['id'] }}">{{ $student['first_name'] }} {{ $student['last_name']}} <i class="glyphicon glyphicon-ok pull-right"></i></a>
		  @endforeach
		</div> -->
    </div>

</main>

@endsection


@section('script')
<script type="text/javascript">

	var search_student_request;
	$('#search_student').on('input', function(e){
		var name = this.value;

		if(search_student_request && search_student_request.readyState != 4){
            search_student_request.abort();
        }
		search_student_request = $.ajax({
		    type: "POST",
		    url: '{{ URL::route('json/searchstudent') }}',
		    data: { name: name },
		    success: function(obj) {
				result = "";
				$.each( obj, function( key, value ) {
					// console.log( value.first_name + " " + value.last_name );
					result += '<li><span class="stud-name">' + value.first_name + ' ' + value.last_name + '</span><span class="stud-address">Military Complex</span></li>';
				});
				$("#students_found").html(obj.length);
				// console.log(result);
				$("#searchresult ul li").remove();
				$("#searchresult ul").html(result);
		       console.log('ok');
		    }
		});

		//kill the request
		// search_student_request.abort();

		// $.post('{{ URL::route('json/searchstudent') }}', { name: name }).done( function(obj) {
		// 	console.log(obj);
		// }).fail( function(obj){
		// 	// displayNotifit( "Sorry! Failed to save." , false );
		// });
	});

	$('.list-group-item').on('click', function() 
	{ 	
		element = $(this);
		class_id = $('#class_id').attr('data-id');

		console.log(class_id)
		id = $(this).attr('data-id');
		
		if($(this).hasClass('active'))
		{	
			
			cancelTimeIn(id, element);
		
		}
		else{

			// alert(id+ ' is in class');
			timeIn(id,element);
			// $(this).addClass('active');
			// $(this).appendTo('#student_list'); 
		}
	});

	function timeIn(user_id,element)
	{
		$.ajax({
			url : '../../api/testajax',
			method : 'post',
			data : { 'student_id' : user_id , 'class_id' : class_id},
			success : function()  {
				console.log('success');
				$(element).addClass('active');
				$(element).appendTo('#present'); 
			},
			error : function(e)	{
				console.log('error' + e)
				alert('error');
			},
			complete : function() {
				console.log('completed');
			}
		});
	}

	function cancelTimeIn(user_id,element)
	{
		$.ajax({
			url : '../../api/canceltimein',
			method : 'post',
			data : { 'student_id' : user_id , 'class_id' : class_id},
			success : function()  {
				console.log('success');
				$(element).removeClass('active');
				$(element).prependTo('#absents');
			},
			error : function(e)	{
				console.log('error' + e)
				alert('there seems to be an error');
			},
			complete : function() {
				console.log('completed');
			}
		});
	}

	
</script>
@endsection