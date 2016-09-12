@extends('layout')

@section('page-css')

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

@stop

@section('content')




    <div class="row">
        <div class="col-sm-5 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h3>Sign up now</h3>
                    <p>Fill in the form below to get instant access:</p>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{ route('post:register') }}" method="post" class="registration-form" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="firstname" placeholder="First name..."
                               class="form-first-name form-control" id="form-first-name">

                        <span class="alert-danger"> {{ $errors->first('firstname') }}</span>
                    </div>


                    <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="lastname" placeholder="Last name..."
                               class="form-last-name form-control" id="form-last-name">

                        <span class="alert-danger"> {{ $errors->first('lastname') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="email" placeholder="Email..." class="form-email form-control"
                               id="form-email">

                        <span class="alert-danger"> {{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="username" placeholder="Username..." class="form-username form-control"
                               id="form-username">

                        <span class="alert-danger"> {{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="password" placeholder="Password..." class="form-password form-control"
                               id="form-password">

                        <span class="alert-danger">{{ $errors->first('password') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-profileImage">Profile Picture</label>
                        <input type="file" name="profileImage" placeholder="" class="form-image form-control"
                               id="form-image">

                        <span class="alert-danger"> {{ $errors->first('profileImage') }}</span>
                    </div>
                    <button type="submit" class="btn">Sign me up!</button>
                </form>
            </div>
        </div>
    </div>

    @stop

@section('page-js')

    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>




@stop