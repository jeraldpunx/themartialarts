@extends('admin.layout')

@section('section')
	<h1>Schools</h1>

	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table">
		<thead>
			<tr>
				<th>School</th>
				<th>Country</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($schools as $school)
			<tr>
				<td>{{ $school->name }}</td>
				<td>{{ $school->country }}</td>
				<td>
					<a href="#" class="btn btn-primary btn-xs edit" data-toggle="modal" data-target="#editModal" data-id="{{ $school->id }}"><span class="fa fa-edit"></span> Edit</a>
					<a href="#" class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#deleteModal" data-id="{{ $school->id }}"><span class="fa fa-remove"></span> Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table> 


	<!-- MODAL NEW & EDIT-->
	<div class="modal fade" id="editModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">New School</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 form-group">
							<label>School Name:</label>
							<input class="form-control school_name" name="school_name" required="required"/>
						</div>

						<div class="col-md-12 form-group">
							<label>Organization:</label>
							<select class="form-control organization" name="organization" placeholder="Country">
								<option value="" selected>- None -</option>
								@foreach($organizations as $organization)
									<option value="{{ $organization['id'] }}">{{ $organization['name'] }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>Address:</label>
							<select class="form-control country" name="country" placeholder="Country">
								<option value="" selected>- Select Country -</option>
								@foreach($countries as $country)
									<option value="{{ $country['country_name'] }}" data-id="{{ $country['id'] }}">{{ $country['country_name'] }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>&nbsp;</label>
							<select class="form-control state" name="state" placeholder="State">
								<option value="" selected>- Select State -</option>
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>&nbsp;</label>
							<select class="form-control city" name="city" placeholder="City">
								<option value="" selected>- Select City -</option>
							</select>
						</div>

						<div class="col-md-12 form-group">
							<input class="form-control street" name="street" placeholder="Street Address" />
						</div>

						<div class="col-md-6 form-group">
							<label>Contact Number:</label>
							<input class="form-control contact_number" name="contact_number" />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success submitModal" data-id="">Submit</button>
					<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF MODAL ADD & EDIT -->

	<!-- MODAL DELETE-->
	<div class="modal fade" id="deleteModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Are you sure you want to delete this?</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 form-group">
							<label>School Name:</label>
							<input class="form-control school_name" name="school_name" disabled/>
						</div>

						<div class="col-md-12 form-group">
							<label>Organization:</label>
							<select class="form-control organization" name="organization" disabled>
								<option value="" selected>- None -</option>
								@foreach($organizations as $organization)
									<option value="{{ $organization['id'] }}" >{{ $organization['name'] }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>Address:</label>
							<select class="form-control country" name="country" disabled>
								<option value="" selected>- Select Country -</option>
								@foreach($countries as $country)
									<option value="{{ $country['country_name'] }}">{{ $country['country_name'] }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>&nbsp;</label>
							<select class="form-control state" name="state" disabled>
								<option value="" selected>- Select State -</option>
							</select>
						</div>

						<div class="col-md-4 form-group">
							<label>&nbsp;</label>
							<select class="form-control city" name="city" disabled>
								<option value="" selected>- Select City -</option>
							</select>
						</div>

						<div class="col-md-12 form-group">
							<input class="form-control street" name="street" disabled/>
						</div>

						<div class="col-md-6 form-group">
							<label>Contact Number:</label>
							<input class="form-control contact_number" name="contact_number" disabled/>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger submitModal" data-id="">Delete</button>
					<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF MODAL DELETE -->
@endsection

@section('script')
<script type="text/javascript">
	//use table plugin
	$('#table thead th').not(":eq(2)").each( function () {
        var title = $('#table thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'">' );
    } );

    var table = $('#table').DataTable({
		"order": [[ 0, "asc" ], [ 1, "asc" ]],
		"columnDefs": [
			{ "searchable": false, "orderable": false, "targets": 2 },
		]
	});

	// Apply the search
    table.columns().eq( 0 ).each( function ( colIdx ) {
    	if (colIdx == 2) return;

        $( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
            table
                .column( colIdx )
                .search( this.value )
                .draw();
        } );
    } );

	//add 'new' button on table
	$(".dataTables_length").prepend('<a href="#" style="margin-right:2em" class="btn btn-success btn-m new" data-toggle="modal" data-target="#editModal"><span class="fa fa-plus"></span> New</a>');


	var clicked_tr_edit = null;
	$(document).on('click', '.new', function(e){
	    e.preventDefault();
	    var $modal = $("#editModal");

		$modal.find(".modal-title").html("New School");

		$modal.find(".school_name").val(null);
		$modal.find(".organization").val($modal.find(".form_id option:first").val());
		$modal.find(".country").val($modal.find(".form_id option:first").val());
		$modal.find(".state").children().remove();
		$modal.find(".state").append($('<option>', {
			value: "",
			text: "- Select State -",
		})).val($modal.find(".form_id option:first").val());

		$modal.find(".city").children().remove();
		$modal.find(".city").append($('<option>', {
			value: "",
			text: "- Select City -",
		})).val($modal.find(".form_id option:first").val());

		$modal.find(".street").val(null);
		$modal.find(".contact_number").val(null);

	    $modal.find(".submitModal").data('id', null);
	    clicked_tr_edit = null;
	});

	
	$(document).on('click', '.edit', function(e){
	    e.preventDefault();
	    var $modal = $("#editModal");

	    var target 	= $modal.find(".modal-body")[0];
	    var spinner = new Spinner(spinner_option).spin(target);

	    $modal.find(".modal-title").html("Edit School");

	    var id = $(this).data('id');
	    clicked_tr_edit = $(this).parent().parent();

	    $.get('{{ URL::route('admin/json/getSchoolInfo') }}', {id: id}).done( function(data){
	    	$modal.find(".school_name").val(data.name);
	    	$modal.find(".organization").val((data.organization) ? data.organization.id : null);

			$modal.find(".country").val(data.country);

			$modal.find(".state").children().remove();
			$modal.find(".state").append($('<option>', {
				text: data.state,
			})).val(data.state);

			$modal.find(".city").children().remove();
			$modal.find(".city").append($('<option>', {
				text: data.city,
			})).val(data.city);

			$modal.find(".street").val(data.street);
			$modal.find(".contact_number").val(data.contact_number);

	        $modal.find(".submitModal").data('id', id);
	        spinner.stop();
	    }).fail( function(obj){
    		displayNotifit( "Sorry! Failed to get details." , false );
    		spinner.stop();
    	});
	});

	$(document).on('click', '#editModal .submitModal', function(e){
        e.preventDefault();
        var $modal = $("#editModal");

        var target = $modal.find(".modal-body")[0];
	    var spinner = new Spinner(spinner_option).spin(target);

        var $this = $(this);

        var id 				= $this.data('id'),
        	school_name		= $modal.find(".school_name").val(),
        	organization	= $modal.find(".organization").val(),
			country			= $modal.find(".country").val(),
			state			= $modal.find(".state").val(),
			city			= $modal.find(".city").val(),
			street			= $modal.find(".street").val(),
			contact_number 	= $modal.find(".contact_number").val();


        $.post('{{ URL::route('admin/json/postSchoolInfo') }}', {
        	id 				: id, 
        	school_name 	: school_name, 
        	organization 	: organization, 
        	country 		: country, 
        	state 			: state, 
        	city 			: city, 
        	street 			: street, 
        	contact_number 	: contact_number
        }).done( function(obj){
        	if(obj.flash.type == true) { // if validation success
	    		if(clicked_tr_edit) {
		        	clicked_tr_edit.find('td').eq(0).html(obj.data.name);
		        	clicked_tr_edit.find('td').eq(1).html(obj.data.country);
		        	console.log(obj);
		        } else {
					table.row.add([
						obj.data.name,
						obj.data.country,
						'<a href="#" class="btn btn-primary btn-xs edit" data-toggle="modal" data-target="#editModal" data-id="'+obj.data.id+'"><span class="fa fa-edit"></span> Edit</a> ' +
						'<a href="#" class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#deleteModal" data-id="'+obj.data.id+'"><span class="fa fa-remove"></span> Delete</a>'
				    ]).draw();
		        }
	            $this.closest('.modal').modal('hide');
		    }
		    
    		spinner.stop();
            displayNotifit( obj.flash.message , obj.flash.type );
    	}).fail( function(obj){
    		displayNotifit( "Sorry! Failed to save data" , false );
    	});
    });

    var clicked_tr_delete = null;
	$(document).on('click', '.delete', function(e){
	    e.preventDefault();
	    var $modal = $("#deleteModal");

	    var target = $modal.find(".modal-body")[0];
	    var spinner = new Spinner(spinner_option).spin(target);

	    var id = $(this).data('id');
	    clicked_tr_delete = $(this).parents('tr');

	    $.get('{{ URL::route('admin/json/getSchoolInfo') }}', {id: id}).done( function(data){
	    	$modal.find(".school_name").val(data.name);
	    	$modal.find(".organization").val((data.organization) ? data.organization.id : null);

			$modal.find(".country").val(data.country);

			$modal.find(".state").children().remove();
			$modal.find(".state").append($('<option>', {
				text: data.state,
			})).val(data.state);

			$modal.find(".city").children().remove();
			$modal.find(".city").append($('<option>', {
				text: data.city,
			})).val(data.city);

			$modal.find(".street").val(data.street);
			$modal.find(".contact_number").val(data.contact_number);

	        $modal.find(".submitModal").data('id', id);
	        spinner.stop();
	    }).fail( function(obj){
    		displayNotifit( "Sorry! Failed to get details." , false );
    		spinner.stop();
    	});
	});


	$(document).on('click', '#deleteModal .submitModal', function(e){
		e.preventDefault();
		var $modal = $("#deleteModal");

        var target = $modal.find(".modal-body")[0];
	    var spinner = new Spinner(spinner_option).spin(target);

        var $this 	= $(this);
        var id 		= $this.data('id');

        $.post('{{ URL::route('admin/json/deleteSchool') }}', {id: id}).done( function(obj){
            table.row( clicked_tr_delete ).remove().draw();

            spinner.stop();
            $this.closest('.modal').modal('hide');
            displayNotifit( obj.flash.message , obj.flash.type );
        }).fail( function(obj){
    		displayNotifit( "Sorry! Failed to delete." , false );
    	});
	});



	//reset state and city <select> options when onchange
	$('#editModal .country').on('change', function(){
		var $modal = $("#editModal");
		var country_id = $(this).find(':selected').data('id');
		$modal.find(".state").children().remove();
		$modal.find(".state").append($('<option>', {
			value: "",
			text: "- Select State -",
		}));

		$modal.find(".city").children().remove();
		$modal.find(".city").append($('<option>', {
			value: "",
			text: "- Select City -",
		}));

		$.ajax({
			type: "GET",
			url: "{{ URL::route('json/getStateByCountry') }}",
			data: { country_id: country_id }
		}).done(function( result ) {
			$(result).each(function(){
				$modal.find(".state").append($('<option>', {
					value: this.state_name,
					text: this.state_name,
					'data-id': this.id,
				}));
			})
		});
	});

	//reset city <select> options when onchange
	$('#editModal .state').on('change', function(){
		var $modal = $("#editModal");
		var state_id = $(this).find(':selected').data('id');
		$modal.find(".city").children().remove();
		$modal.find(".city").append($('<option>', {
			value: "",
			text: "- Select City -",
		}));

		$.ajax({
			type: "GET",
			url: "{{ URL::route('json/getCityByState') }}",
			data: { state_id: state_id }
		}).done(function( result ) {
			$(result).each(function(){
				$modal.find(".city").append($('<option>', {
					value: this.city_name,
					text: this.city_name,
					'data-id': this.id
				}));
			})
		});
	});
</script>
@endsection