@extends('layouts.admin')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Course List</h4>
    </div>

    <form method="POST" action="{{ route('admin.add.course') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
 <div class="form-group row">
            <label for="credit" class="col-md-4 col-form-label text-md-right">{{ __('Credit') }}</label>

            <div class="col-md-6">
                <input id="credit" type="number" class="form-control{{ $errors->has('credit') ? ' is-invalid' : '' }}" name="credit" value="{{ old('credit') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
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
            <td>Name</td>
            <td>Credit</td>
            <td>Action</td>
        </tr>
        @foreach($courses as $course)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$course->name}}</td>
                <td>{{$course->credit}}</td>
                <td><a href="{{route('admin.course.delete',$course->id)}}">Delete</a></td>
                <td><a href="{{route('admin.course.update',$course->id)}}">Update</a></td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection