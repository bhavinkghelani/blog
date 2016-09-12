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
        <div class="col-sm-5 form-box">
            <div class="form-top">
                <div class="form-top-left">
                    <h1>Update Your Profile</h1>
                </div>
                <div class="form-top-right">
                    <i class="fa fa-pencil"></i>
                </div>
            </div>
            <div class="form-bottom">

                <form role="form" method="post"
                      action="{{ route('post:profile') }}"
                       class="registration-form" enctype="multipart/form-data">


                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="sr-only" for="form-first-name">First name</label>
                        <input type="text" name="firstname" placeholder="First name..."
                               class="form-first-name form-control" id="form-first-name" value="{{ $user->firstname }}">

                        <span class="alert-danger"> {{ $errors->first('firstname') }}</span>
                    </div>


                    <div class="form-group">
                        <label class="sr-only" for="form-last-name">Last name</label>
                        <input type="text" name="lastname" placeholder="Last name..."
                               class="form-last-name form-control" id="form-last-name" value="{{ $user->lastname }}">

                        <span class="alert-danger"> {{ $errors->first('lastname') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-email">Email</label>
                        <input type="text" name="email" placeholder="Email..." class="form-email form-control"
                               id="form-email" value="{{ $user->email  }}">

                        <span class="alert-danger"> {{ $errors->first('email') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="username" placeholder="Username..." class="form-username form-control"
                               id="form-username" value="{{ $user->username }}">

                        <span class="alert-danger"> {{ $errors->first('username') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="form-image">Profile Picture</label>
                        <input type="file" name="profileImage" placeholder="" class="form-image form-control"
                               id="form-image" value="{{ $user->profileImagePath }}">

                        <span class="alert-danger"> {{ $errors->first('profileImage') }}</span>
                    </div>


                    <button type="submit" class="btn">Update</button>
                </form>

            </div>

        </div>

        <div class="form-group form-group-sm" style="margin-top: 70px;">

            <img src="{{ $user->profileImagePath }}" class="img-rounded" height="500" width="500">
        </div>
    </div>



@stop

@section('page-js')

    <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>




@stop