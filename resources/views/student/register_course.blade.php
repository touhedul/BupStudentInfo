@extends('layouts.student')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Register Course</h4>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Teacher Name</td>
            <td>Course Name</td>
            <td>Lecture Time</td>
            <td>Action</td>
        </tr>
        @foreach($courseFacultys as $courseFaculty)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$courseFaculty->faculty->name}}</td>
                <td>{{$courseFaculty->course->name}}</td>
                <td>{{$courseFaculty->lecture_time}}</td>
                <td><a href="{{route('student.register.course.perform',$courseFaculty->id)}}" class="btn btn-success">Register This</a></td>


            </tr>
        @endforeach
        </thead>
    </table>

@endsection