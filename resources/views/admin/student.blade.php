@extends('layouts.admin')
@section('content')

    <div class="card-body">
        <h4 class="card-title">Student List</h4>
    </div>

    <form method="POST" action="{{ route('admin.add.student') }}">
        @csrf

        <div class="form-group row">
            <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('Student Id') }}</label>

            <div class="col-md-6">
                <input id="student_id" type="text" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" value="{{ old('student_id') }}" required autofocus>

                @if ($errors->has('student_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('student_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
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
            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

            <div class="col-md-6">
                <select name="department" id="department" class="form-control">
                    <option value="ICT">ICT</option>
                    <option value="ES">ES</option>
                    <option value="BBA">BBA</option>
                    <option value="DHSM">DHSM</option>
                </select>

                @if ($errors->has('department'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('department') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

            <div class="col-md-6">
                <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="text" value="12345678" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
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
            <td>Student Id</td>
            <td>Phone</td>
            <td>Department</td>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->student_id}}</td>
                <td>{{$student->phone}}</td>
                <td>{{$student->department}}</td>
            </tr>
        @endforeach
        </thead>
    </table>

@endsection