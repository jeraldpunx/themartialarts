@extends('admin.layout')

@section('section')

    <a href="{{ URL::to('organizer/') }}"><button class="btn btn-sm btn-success">back</button></a>

    <h2>{{ $school->name }}</h2>
    <p>address : {{ $school->country }}</p>
    <p>address : {{ $school->state }}</p>
    <p>address : {{ $school->street }}</p>
    <p>contact number : {{ $school->contact_number }}</p>
    @if($school->owner)
        <p>Owner : {{ $school->owner->name }}</p>
    @elseif(!$school->Owner)
        <p>Owner :
        <a href="{{ URL::to('organizer/schools/'.$school->id.'/addowner') }}"><button class="btn btn-sm btn-success">set an owner</button></a>
        </p>
    @endif

    <hr>


    <!-- MODAL NEW & EDIT-->

@endsection

@section('script')

@endsection