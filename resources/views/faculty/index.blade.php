@extends('layouts.faculty')
@section('title','Faculty')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Welcome Faculty.</h4>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Name</td>
            <td>Credit</td>
            <td>Action</td>
        </tr>
        @foreach($courseFacultys as $courseFaculty)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$courseFaculty->course->name}}</td>
                <td>{{$courseFaculty->course->credit}}</td>
                <td><a href="{{route('faculty.student.info',$courseFaculty->id)}}" class="btn btn-success" >Student Info</a></td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection