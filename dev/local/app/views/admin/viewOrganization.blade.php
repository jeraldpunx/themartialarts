@extends('admin.layout')

@section('section')
    <div class="container">
        <h2>{{ $schools->name }}</h2><a href="{{ URL::route('admin/organizations') }}"><button class="btn btn-sm">back</button></a>
        <hr>
        <p>Organization description : <p>{{ $schools->description }}</p></p>

        <p>owned by <a href="{{ URL::to('admin/users/'.$owner->id.'/show') }} ">{{ $owner->name  }}</a></p>
    </div>
    <hr>
    <h4>Schools</h4>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table">
        <thead>
        <tr>
            <th>School name</th>
            <th>country</th>
            <th>street</th>
            <th>contact number</th>
        </tr>
        </thead>
        <tbody>
        @foreach($schools->schools as $school)
            <tr>
                <td>
                    <a href="{{ URL::to('admin/schools/'.$school->id.'/show') }}">
                    {{ $school->name }}
                    </a>
                </td>
                <td>{{ $school->country }}  {{ $school->city }}</td>
                <td>{{ $school->street }}</td>
                <td>{{ $school->contact_number }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section('script')

@endsection