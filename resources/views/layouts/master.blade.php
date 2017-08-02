<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<<<<<<< HEAD
    <title>@yield('title')</title>
=======
    <title>{{ config('app.name', 'Laravel') }}</title>
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
<<<<<<< HEAD

        <!-- Nav Bar -->
        <nav class="navbar navbar-default navbar-fixed-top">
=======
        <nav class="navbar navbar-default navbar-static-top">
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
<<<<<<< HEAD
                        URIN Good Company
=======
                        {{ config('app.name', 'Leave') }}
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
<<<<<<< HEAD
                    <ul class="nav navbar-nav visible-xs">
                        <li class="@if(!isset($_GET['page'])) {{ 'active' }} @endif"><a data-toggle="pill" href="#dash">Dashboard</a></li>
                        @if(Auth::user()->role=='admin')
                        <li class="@if(isset($_GET['page'])) {{ 'active' }} @endif"><a data-toggle="pill" href="#edit">Edit Records</a></li>
                        <li><a data-toggle="pill" href="#add">Add Record</a></li>
                        @else
                        <li><a data-toggle="pill" href="#request">Request for Leave</a></li>
                        <li><a data-toggle="pill" href="#leaves">My Leaves</a></li>
                        @endif
                    </ul>
=======
                    <ul class="nav navbar-nav"></ul>
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
<<<<<<< HEAD
=======
                            <!-- <li><a href="{{ route('register') }}">Register</a></li> -->
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->emp_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>


<<<<<<< HEAD
        <!-- Side Bar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <h3 class="page-header"><a href="home">Welcome,<br>{{Auth::user()->emp_name}}</a></h3>
                    <ul class="nav nav-pills nav-stacked nav-sidebar">
                        <li class="@if(!isset($_GET['page'])) {{ 'active' }} @endif"><a data-toggle="pill" href="#dash">Dashboard</a></li>
                        @if(Auth::user()->role=='admin')
                        <li class="@if(isset($_GET['page'])) {{ 'active' }} @endif"><a data-toggle="pill" href="#edit">Edit Records</a></li>
                        <li><a data-toggle="pill" href="#add">Add Record</a></li>
                        @else
                        <li><a data-toggle="pill" href="#request">Request for Leave</a></li>
                        <li><a data-toggle="pill" href="#leaves">My Leaves</a></li>
=======

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <h3 class="page-header">Welcome,<br>{{Auth::user()->emp_name}}</h3>
                    <ul class="nav nav-pills nav-stacked nav-sidebar">
                        <li class="active"><a data-toggle="pill" href="#request">Request for Leave</a></li>
                        <li><a data-toggle="pill" href="#leaves">My Leaves</a></li>
                        <li><a data-toggle="pill" href="#dash">Dashboard</a></li>
                        @if(Auth::user()->role=='admin')
                        <li><a data-toggle="pill" href="#edit">Edit Records</a></li>
                        <li><a data-toggle="pill" href="#add">Add Record</a></li>
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153
                        @endif
                    </ul>
                </div>
                <div class="col-sm-9 col-md-10 col-md-offset-2 main">
                    @yield('content')
                </div>
            </div>
        </div>


<<<<<<< HEAD
        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <p class="text-muted">Powered by Bootstrap.</p>
            </div>
        </footer>
=======
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153


        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
<<<<<<< HEAD
    <script src="https://use.fontawesome.com/914230375d.js"></script>
=======
>>>>>>> 596b3b1dc7a512db7eb1ede9c8d52e11ca705153

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>    
    $('#from').datepicker({
        startDate: new Date(), //if leave type is sick leave
        //startDate: '+14d', //if leave type is vacation
        todayHighlight: true,
        autoclose: true
    });
    $('#to').datepicker({
        startDate: new Date(),
        //startDate: '+14d', //if leave type is vacation
        todayHighlight: true,
        autoclose: true
    });
    </script>

</body>
</html>