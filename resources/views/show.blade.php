@extends('layout')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <h1>{{ $article->title }}</h1>

    @if(Auth::check() && ($article->user->id == Auth::user()->id))

    <a class="btn btn-info" href="{{ route('get:edit-article',$article->id) }}">Edit</a><br>

    <br>

    <form method="post" action="{{ route('delete:article',$article->id) }}">

        {{ csrf_field() }}

    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure, you want to delete this article....?')">Delete</button>

    </form>

    @endif

    <h6>
        By <a href="{{ route('show-article',$article->user->id) }}" style="color: #0f0f0f"> {{ $article->user->username }} </a>

    </h6>

    created : {{ \Carbon\Carbon::createFromTimestamp(strtotime($article->published_at))->diffForHumans() }}

    <hr>

    @unless ($article->tags->isEmpty())
        <h5>Tag:</h5>
        <ul>
            @foreach ($article->tags as $tag)
                <li><a href="{{ route('get:tags',$tag->name) }}"> {{ $tag->name }}</a></li>
            @endforeach
        </ul>
    @endunless

    <hr>

    <img src="{{ $article->image_path }}" height="200" width="200">


    <hr>



    <article>
        {!! $article->body  !!}
    </article>




    <hr>

    <form class="form-group" action="{{ route('post:user-comment',$article->id) }}" method="post">

        {{ csrf_field() }}

        <div class="form-group">

            <label class="sr-only" for="comment">Comment:</label>
            <textarea class="form-textarea form-control" placeholder="Comment..." name="commentBody" rows="1" style="height: 200px;"></textarea>

            <span class="alert-danger">{{ $errors->first('commentBody') }}</span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </div>

    </form>

    <hr>

    @include('comments.index',['comments'=> $comments])

@stop
