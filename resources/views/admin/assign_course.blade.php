@extends('layouts.admin')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Assign Course to faculty</h4>
    </div>

    <form method="POST" action="{{ route('admin.add.assign.course') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Teacher') }}</label>

            <div class="col-md-6">
                <select name="faculty_id" class="form-control">
                    @foreach($facultys as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('faculty_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('faculty_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Course') }}</label>

            <div class="col-md-6">
                <select name="course_id" class="form-control">
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('course_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('course_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

 <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Lecture Time') }}</label>

            <div class="col-md-6">
                <input type="time" name="lecture_time">
            </div>
        </div>


        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>Sl</td>
            <td>Teacher Name</td>
            <td>Course Name</td>
            <td>Lecture Time</td>
        </tr>
        @foreach($courseFacultys as $courseFaculty)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$courseFaculty->faculty->name}}</td>
                <td>{{$courseFaculty->course->name}}</td>
                <td>{{$courseFaculty->lecture_time}}</td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection