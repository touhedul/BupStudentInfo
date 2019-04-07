@extends('layouts.student')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Current Courses   </h4>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Teacher Name</td>
            <td>Course Name</td>
            <td>Lecture Time</td>
            <td>Credit</td>
        </tr>
        @foreach($currentCourses as $currentCourse)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$currentCourse->courseFaculty->faculty->name}}</td>
                <td>{{$currentCourse->courseFaculty->course->name}}</td>
                <td>{{$currentCourse->courseFaculty->lecture_time}}</td>
                <td>{{$currentCourse->courseFaculty->course->credit}}</td>


            </tr>
        @endforeach
        </thead>
    </table>

@endsection