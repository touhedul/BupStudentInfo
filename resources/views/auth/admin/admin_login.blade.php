@extends('layouts.app')
@section('title','Admin Login')
@section('content')
<div class="container">
    <section id="content">
        @include('includes.message')
        <div class="col-md-8">
        <form class="form-group" action="{{route('admin.login.submit')}}" method="post">
            <h1>Admin Login</h1>
            <div>
                <input class="form-control" type="text" placeholder="Email" required="" name="email"/>
            </div>
            <br>
            <div>
                <input class="form-control" type="password" placeholder="Password" required="" name="password"/>
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-primary" name="login" value="Log in" />
            </div>
            @csrf
        </form><!-- form -->
        </div>
        <a href="{{route('admin.password.request')}}">Forget Password !</a>
        <div class="button">
        </div><!-- button -->
    </section><!-- content -->
</div>
    @endsection