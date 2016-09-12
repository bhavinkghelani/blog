@extends('layout')

@section('content')

    <div class="jumbotron">
        <h1>Welcome</h1>
        @if(!Auth::check())

        <p>
            <a class="btn btn-lg btn-primary"  href="{{ route('get:register') }}" role="button">Sign Up</a>
        </p>

          @endif
    </div>

@stop