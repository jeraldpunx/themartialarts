@extends('owner.layout')

@section('content')
<div class="horizontal_content">
	<div id="sample" class="container">
		<div class="row">
			<div class="group_content">
				<div class="group_header">Organization's Styles</div>
				<div class="group_tile" id="group_style">
					@foreach($org_styles as $style)
					<div class="col-lg-2 tile">
						<div data-target="#rank_panel" data-toggle="modal" class="tile_item" data-styleid="{{ $style->id }}">
							<div class="tile_background">
									<i class="fa-eye fa-2x fa"></i>
							</div>
							<div class="tile_header">{{ $style->name }}</div>
						</div>	
					</div>
					@endforeach
				</div>
			</div>
		</div>

		<div class="row">
			<div class="group_content">
				<div class="group_header">My Styles</div>
				<div class="group_tile" id="group_style">
					@foreach($sch_styles as $style)
					<div class="col-lg-2 tile">
						<div class="tile_close"><i class="fa-times fa"></i></div>
						<div data-target="#rank_panel" data-toggle="modal" class="tile_item" data-styleid="{{ $style->id }}">
							<div class="tile_background">
								<i class="fa-pencil fa-2x fa"></i>
							</div>
							<div class="tile_header">{{ $style->name }}</div>
						</div>	
					</div>
					@endforeach
					<div class="col-lg-2 tile">
						<div data-target=".bs-example-modal-lg" data-toggle="modal" class="tile_add">
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
</div>

<!-- popup -->
<div class="modal fade" id="rank_panel" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content rs_edit_popup" style="background:#ececec;">
    	<div class="popup-close" data-dismiss="modal" aria-label="Close"><span class="fa fa-times"></span></div>
		<div class="col-lg-12" style="margin-top:15px;">
			<div class="style_name">
				<input type="text" name="style_name" class="stylename" placeholder="Style Name" value="Judo">
				<textarea placeholder="Description" class="style_description"></textarea>
			</div>
		</div>
		<div class="main_container ranks_table">
			<table class="table" id="diagnosis_list">
                <thead>
                    <tr><th>Rank</th><th>Name of Rank</th><th>Belt</th></tr>
                </thead>
                <tbody class="ranks">
					<tr>
						<td class='priority'>1</td>
						<td>White Belter</td>
						<td>
							<div class="item_belt">
								<ul>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:yellow;"></li>
								</ul>
							</div>
						</td>
					</tr>
					<tr>
						<td class='priority'>4</td>
						<td>Red Belter</td>
						<td>
							<div class="item_belt">
								<ul>
									<li style="height:25%; background:white;"></li>
									<li style="height:25%; background:white;"></li>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:yellow;"></li>
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
									<li style="height:25%; background:white;"></li>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:yellow;"></li>
									<li style="height:25%; background:white;"></li>
								</ul>
							</div>
						</td>
					</tr>
                </tbody>
            </table>
		</div>
    </div>
  </div>
</div>
<!-- end of code -->
@endsection


@section('script')
<script type="text/javascript">
var view_style;
$(document).on("click", ".tile_item", function(e){
	e.preventDefault();
	e.stopPropagation();

	// $rank = $("#dummy_rank");

	// console.log($rank);


	// $modal_div.find(".ranks").append($rank.html());


	$div = $("#rank_panel");
	var target = $("#rank_panel .modal-content")[0];
	var spinner = new loader();
	spinner.target(target);

	// var id = $(this).data('id');

	if(view_style && view_style.readyState != 4){
		view_style.abort();
		spinner.close();
	}
	var style_id = $(this).data('styleid');

	view_style = $.get('{{ URL::route('json/showStyleRanks') }}', {style_id: style_id}).done( function(data){
		$div.find(".stylename").val(data.name).prop('disabled', true);
		$div.find(".style_description").val(data.description).prop('disabled', true);
		$div.find(".ranks").empty();
		
		$.each(data.ranks, function( index, rank ) {
			var rank_color = $('<ul>').attr('style', 'height: 100%');

			if(rank.type == "solid") {
				rank_color
					.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'));
			} else if(rank.type == "double") {
				rank_color
					.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.secondary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.secondary_color +';'));
			} else if(rank.type == "stripe") {
				rank_color
					.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.secondary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.secondary_color +';'))
    				.append($('<li>').attr('style', 'height:25%; background:'+ rank.primary_color +';'));
			}

			$div.find(".ranks")
			    .append($('<tr>')
			        .append($('<td>').attr('class', 'priority').html(rank.level))
			        .append($('<td>').html(rank.name))
			        .append($('<td>')
			        	.append($('<div>').attr('class', 'item_belt')
			        			.append(rank_color)
		        		)
	        		)
			    );

		});

		spinner.close();
		$(".main-content").hide();
		$div.show();
	});

});
</script>
@endsection

