@extends('admin.layout')

@section('section')
    <div class="container">
        <a href="{{ URL::previous() }}"><button class="btn btn-sm btn-success">back</button></a>
        <h2>{{ $user->name }}</h2>
        <p>address : {{ $user->address }}</p>
        <p>contact number : {{ $user->contact_number }}</p>
        <p>gender : {{ $user->gender }}</p>
        <p>zip code : {{ $user->zip }}</p>
    </div>
    <hr>


    <!-- MODAL NEW & EDIT-->

@endsection

@section('script')

@endsection