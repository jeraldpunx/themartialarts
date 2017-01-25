@extends('admin.layout')

@section('section')

    <a href="{{ URL::to('organizer/') }}"><button class="btn btn-sm btn-success">back</button></a>

    <h2>{{ $style->name }}</h2>
    <p>description : {{ $style->description }}</p>

    <p>address : {{ $style->street }}</p>
    <p>contact number : {{ $style->contact_number }}</p>


    <hr>

@endsection

@section('script')

@endsection