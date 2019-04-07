@extends('layouts.faculty')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Student Info</h4>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Name</td>
            <td>CT</td>
            <td>Mid</td>
            <td>Final</td>
            <td>GPA</td>
        </tr>
@foreach($courseStudentFaculty as $student)
    <tr>
        <form action="{{route('faculty.submit.mark')}}" method="post">
            @csrf
            <input type="hidden" name="student_id" value="{{$student->user->id}}">
            <input type="hidden" name="course_id" value="{{$student->courseFaculty->course->id}}">
        <td>{{$loop->index+1}}</td>
        <td>{{$student->user->name}}</td>

        <td><input value="{{$student->examMark($student->user->id,$student->courseFaculty->course->id)['ct']}}" type="number" name="ct"></td>

        <td><input value="{{$student->examMark($student->user->id,$student->courseFaculty->course->id)['mid']}}" type="number" name="mid"></td>
        <td><input value="{{$student->examMark($student->user->id,$student->courseFaculty->course->id)['final']}}" type="number" name="final"></td>
        <td><input value="{{$student->examMark($student->user->id,$student->courseFaculty->course->id)['gpa']}}" type="number" name="gpa"></td>
        <td><input type="submit" value="Submit"></td>
        </form>
    </tr>
@endforeach
        </thead>
    </table>

@endsection