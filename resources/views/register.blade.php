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
                <form role="form" action="" method="post" class="registration-form">
                    <div class="form-group">
                        <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="form-first-name" placeholder="First name..."
                               class="form-first-name form-control" id="form-first-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="form-last-name" placeholder="Last name..."
                               class="form-last-name form-control" id="form-last-name">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="form-email" placeholder="Email..." class="form-email form-control"
                               id="form-email">
                    </div>
                    <button type="submit" class="btn">Sign me up!</button>
                </form>
            </div>
        </div>
    </div>




@stop