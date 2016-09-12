<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">


    @yield('page-css')

</head>
<body>

<div class="container">


    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('get-home') }}">Blog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('get:list-articles') }}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                @if(!Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('get:register') }}">Sign Up</a></li>
                        <li><a href="{{ route('get:login') }}">Login</a></li>
                        <li><a href="{{ route('get:create') }}">Create Article</a></li>
                    </ul>
                @else

                    <button class="btn navbar-btn navbar-right dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                        <span class="glyphicon glyphicon-user"></span> {{ \Illuminate\Support\Facades\Auth::user()->firstname }}
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right " aria-labelledby="dropdownMenuLink">
                        <li><a href="{{ route('get:profile') }}">Profile</a></li>
                        <li><a href="{{ route('get:changePassword') }}">Change Password</a></li>
                        <li><a href="{{ route('get-logout') }}">Logout</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('get:create') }}">Create Article</a></li>
                        <li><a href="{{ route('get:user-articles') }}">My Articles</a></li>
                    </ul>



                @endif


            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>







<!-- Main component for a primary marketing message or call to action -->
    @yield('content')


</div> <!-- /container -->


<script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>


@yield('page-js')
</body>
</html>