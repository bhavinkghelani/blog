@extends('layout')

@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <link rel="shortcut icon" href="{{ asset('ico/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('ico/apple-touch-icon-57-precomposed.png') }}">


    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Login to our site</h3>
                    <p>Enter your username and password to log on:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="" method="post" class="login-form">
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="form-username" placeholder="Username..."
                               class="form-username form-control" id="form-username">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="form-password" placeholder="Password..."
                               class="form-password form-control" id="form-password">
                    </div>
                    <button type="submit" class="btn">Sign in!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 social-login">
            <h3>...or login with:</h3>
            <div class="social-login-buttons">
                <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                    <i class="fa fa-facebook"></i> Facebook
                </a>
                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                    <i class="fa fa-twitter"></i> Twitter
                </a>
                <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                    <i class="fa fa-google-plus"></i> Google Plus
                </a>
            </div>
        </div>
    </div>




    <!-- Javascript -->


@stop


