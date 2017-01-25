@extends('admin.layout')

@section('section')

        <a href="{{ URL::previous() }}"><button class="btn btn-sm btn-success">back</button></a>
        <h2>{{ $school->name }}</h2>
        <p>address : {{ $school->country }}</p>
        <p>address : {{ $school->state }}</p>
        <p>address : {{ $school->street }}</p>
        <p>contact number : {{ $school->contact_number }}</p>


    <hr>


        <!-- MODAL NEW & EDIT-->

@endsection

@section('script')

@endsection