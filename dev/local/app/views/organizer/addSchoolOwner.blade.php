@extends('instructor.layout')
@section('style')
    <link href="{{ asset('assets/css/jquery.autocomplete.css') }}" rel="stylesheet"/>

@endsection
@section('content')

    <div class="container" style="height:90px;"></div>
    <div class="container">

        @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{{ Session::get('success') }}</h2>
            </div>
        @endif
        @if(Session::has('msg'))
            <div class="alert-box success" style="">
                <h2>{{ Session::get('msg') }}</h2>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="alert-box success">
                <h2>{{ Session::get('error') }}</h2>
            </div>
        @endif
        <h1>Schools</h1>
        <a href="{{ URL::to('organizer') }}"><button class="btn btn-sm btn-success">back</button></a>

        <form action="{{ URL::to('organizer/schools/'.$school->id.'/addowner') }}" method="post">
            <br>

            <div class="row">
                <div class="col-md-4" aria-label="name">
                    name :
                    <input type="text" id="autocomplete" name="street" class="form-control" placeholder="search for owner">
                    <br>
                    <input type="hidden" id="user_id" name="user_id">
                </div>
            </div>
            <div class="autocomplete_container" id="autocomplete_data">
                <p id="full_name"></p>
                <p id="email"></p>
                <p id="address"></p>
            </div>
            <input type="submit" class="btn btn-sm btn-success" value="set">
            <br>
        </form>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>
    $(document).on('ready', function()
    {

        $('#autocomplete').on('keyup', function()
        {
            $(this).css('border-color','');
        });

        $('#autocomplete').autocomplete({

            dataType : 'json',
            source: function( request, response ) {
            $.ajax({
                url: '{{ URL::to('organizer/json/autocomplete/users') }}',
                data: {
                query: request.term
                },
                success: function( data ) {

                    var response_data = [];
                    if(data.length < 1)
                    {
                        console.log('nothing returned');
                        console.log(this);
                        $('#autocomplete').css('border-color','red');
                    }

                    $.each(data, function (index,value) {
                     data = {
                         label : value.name,
                         value : value.name,
                         data : value
                     };

                    response_data.push(data);
                    console.log(index);
        //            autocomplete_data[value.shortName] = value;

                    });

                    response( response_data );
                },
                response: function(event,ui)
                {
                    if (ui.content.length === 0) {
                        console.log('nothing returned');
                    }

                },
                error: function(data)
                {
                    console.log($(this))
                    $(this).css('border-color','red');
                },
            })
            },
            select: function (event, ui) {


                console.log(ui.item)
                var data = ui.item;
        //        selected_data = autocomplete_data[data];
        //        origin_data = autocomplete_data[data];

                console.log(data);
                $(this).css('border-color','green');
                $(this).val(ui.item.label);

                $('#full_name').html('full name : ' + data.data.name);
                $('#email').html('email : ' + data.data.email);
                $('#address').html('address : ' +data.data.address);
                $('#user_id').val(data.data.id);
                return false;

            },
            minLength: 2,
        });

    });
    </script>
@endsection