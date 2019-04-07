@extends('layouts.student')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Course History</h4>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Course Title</td>
            <td>Faculty Name</td>
            <td>Credit</td>
            <td>Action</td>
        </tr>
        @foreach($courseStudentFacultys as $courseStudentFaculty)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$courseStudentFaculty->courseFaculty->course->name}}</td>
                <td>{{$courseStudentFaculty->courseFaculty->faculty->name}}</td>
                <td>{{$courseStudentFaculty->courseFaculty->course->credit}}</td>
               <td><a href="{{route('student.exam.mark',$courseStudentFaculty->courseFaculty->course->id)}}" class="btn btn-success">View Exam Mark</a></td>
            </tr>
        @endforeach
        </thead>
    </table>


@endsection