@extends('instructor.layout')

@section('content')

    <div class="container" style="height:90px;"></div>
    <div class="container">
        <div class="alert-box success">
            <p>asdasdasd</p>
        </div>
        @if(Session::has('success'))
            <div class="panel panel-success">
                <div class="panel-body">
                    <h2>{{ Session::get('success') }}</h2>
                </div>
            </div>
        @endif

        @if(Session::has('errors'))
            {{ 'errors' }}
            <div class="alert-box success">
                <h2>{{ Session::get('errors') }}</h2>
            </div>
        @endif
        <h1>Schools</h1>
        <a href="{{ URL::to('organizer') }}"><button class="btn btn-sm btn-success">back</button></a>

    <form action="{{ URL::to('organizer/schools/add') }}" method="post">
        <br>
        <div class="row">

            <div class="col-md-4" aria-label="hello">
                school name :
                <input type="text" name="school_name" class="form-control" placeholder="School name">
            </div>
            <div class="col-md-4">
                Country :
                <input type="text" name="country" class="form-control" placeholder="Country">
            </div>
        </div>

        <div class="row">

            <div class="col-md-4" aria-label="hello">
                state :
                <input type="text" name="state" class="form-control" placeholder="State">
            </div>
            <div class="col-md-4" aria-label="hello">
                city :
                <input type="text" name="city" class="form-control" placeholder="City">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4" aria-label="hello">
                street :
                <input type="text" name="street" class="form-control" placeholder="Street">
            </div>
            <div class="col-md-4" aria-label="hello">
                contact number :
            <input type="text" name="contact_number" class="form-control" placeholder="Contact number">
            </div>
        </div>
        <input type="submit" class="btn btn-sm btn-success pull-right">
    </form>
    </div>

@endsection
@section('script')
@endsection