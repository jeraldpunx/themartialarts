@extends('instructor.layout')

@section('content')

<div class="container" style="height:90px;"></div>
<div class="container">
        <h1>Schools</h1>
                <a href="{{ URL::to('organizer/schools/add') }}">
                        <button class="btn btn-success btn-sm right">
                                <i class="glyphicon glyphicon-plus"></i>add
                        </button>
                </a>
        <br>
        @foreach($schools as $school)
            <p><a href="{{ URL::to('organizer/schools/'.$school->id.'/show') }}">{{ $school->name }}</a></p>
        @endforeach
</div>

@endsection
@section('script')
@endsection