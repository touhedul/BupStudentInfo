@extends('layouts.admin')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Course Update</h4>
    </div>

    <form method="POST" action="{{ route('admin.course.update.perform') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input value="{{$course->name}}" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <input type="hidden" name="id" value="{{$course->id}}">
 <div class="form-group row">
            <label for="credit" class="col-md-4 col-form-label text-md-right">{{ __('Credit') }}</label>

            <div class="col-md-6">
                <input id="credit" value="{{$course->credit}}" type="number" class="form-control{{ $errors->has('credit') ? ' is-invalid' : '' }}" name="credit" value="{{ old('credit') }}" required autofocus>

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
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>



@endsection