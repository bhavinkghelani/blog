@extends('layout')

@section('page-css')

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/form-elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">

    <link rel="shortcut icon" href="{{ asset('ico/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="{{ asset('ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{ asset('ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{ asset('ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('ico/apple-touch-icon-57-precomposed.png') }}">

@stop

@section('content')

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h1>Change Your Password</h1>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-key"></i>
                </div>
            </div>
            <div class="form-bottom">
                <form role="form" action="{{ route('post:changePassword') }}" method="post" class="password-form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="password" placeholder="Password..."
                               class="form-password form-control" id="form-password">
                        <span class="alert-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-confirmpassword">Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password..."
                               class="form-confirmpassword form-control" id="form-confirmpassword">
                        <span class="alert-danger">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <button type="submit" class="btn">Change Password</button>
                </form>
            </div>
        </div>
    </div>

@stop

@section('page-js')

    <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>




@stop