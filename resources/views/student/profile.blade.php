@extends('layouts.student')
@section('content')

    <div class="card-body">

        <div class="mb-2">
            <label for="s_id">Student id:</label>
            <input disabled value="{{$student->student_id}}" type="text" id="s_id"   >
        </div>
        <div class="mb-2">
            <label for="s_name">Student name:</label>
            <input disabled value="{{$student->name}}" type="text" id="s_name"   >
        </div>
        <div class="mb-2">
            <label for="s_department">Department :</label>
            <input disabled value="{{$student->department}}" type="text" id="s_department"   >
        </div>
        <div class="mb-2">
            <label for="s_phone">Phone:</label>
            <input disabled value="{{$student->phone}}" type="text" id="s_phone"   >
        </div>


    </div>
@endsection