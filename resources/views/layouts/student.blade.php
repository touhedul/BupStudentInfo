<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/student/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/student/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" />
    <link rel="stylesheet" href="{{asset('css/student/style.css')}}">
</head>
<body>


<header id="main-header">
    <nav class="navbar navbar-expand-sm navbar-light  " style="background-color:#FFFFFF;">
        <div class="container">

            <a class="navbar-brand " href="#"><img src="{{asset('images/bup_logo_2.jpg')}}" alt="bup_logo2"></a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link display-6" href="#">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><img src="{{asset('images/person1.jpg')}}" class="img-circle" alt="student_pic" style="heigt:100px;width:56px;"></a>
                </li>

            </ul>

        </div>
    </nav>
    <div class="">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link  " href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="{{route('student.register.course')}}">Register Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student.profile')}}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student.course.history')}}">Course History</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student.current.course')}}">Current course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student.routine')}}">Routine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('student.change.password')}}">Change password</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

</header>

<div class="container">
    @include('includes.message')
    @yield('content')
</div>

<footer class="">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">Copyright &copy; 2019 All Rights Reserved</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Bup Apps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                </li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="#">Phonebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Webmail</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Teachers panel</a>
                </li>
            </ul>
        </div>
    </nav>



</footer>

<script src="{{asset('js/student/jquery.min.js')}}"></script>
<script src="{{asset('js/student/popper.min.js')}}"></script>
<script src="{{asset('js/student/bootstrap.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>

@yield('script')
</body>
</html>