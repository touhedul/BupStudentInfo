@extends('layouts.student')
@section('title','Change Password')
@section('content')
<div class="card-body">
  <!-- FORM -->
    <form method="POST" action="{{route('student.change.password')}}">
        @csrf
    <div class="form-group">
        <label for="current_password">Old Password(*)</label>
        <input type="password" id="current_password" name="old_password" class="form-control" placeholder="Current Password" >
    </div>
      <div class="form-group">
          <label for="new_password">New Password(*)</label>
          <input type="password" id="new_password" name="password" class="form-control" placeholder="New Password" >
      </div>
      <div class="form-group">
          <label for="retype_password">Retype Password(*)</label>
          <input type="password" name="password_confirmation" id="retype_password" class="form-control" placeholder="Password" >
      </div>
      <input type="submit" name="" value="Update" class="bg-lg-primary">

    </form>

</div>
@endsection