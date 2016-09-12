@extends('layout')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('flash_message') }}
        </div>
    @endif

    <h1>Articles</h1>
    <hr/>

    @foreach($articles as $article)
        <article>
            <h2>
                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
            </h2>

            {{ $article->votes->count()  }} points  |  {{ $article->comments->count() }} comments

            <br>

            <a class="btn btn-info" style="text-decoration: none" href="{{route('post:article-vote',$article->id)}}"><span class="glyphicon glyphicon-triangle-top"></span></a>

            <form method="post" action="{{route('delete:article-vote',$article->id)}}">
                {{ csrf_field() }}
            <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-triangle-bottom"></span></button>
            </form>


            <h5>
               By <a href="{{ route('show-article',$article->user->id) }}" style="color: #0f0f0f;"> {{ $article->user->username }}</a>
            </h5>

            create: {{ \Carbon\Carbon::createFromTimestamp(strtotime($article->published_at))->diffForHumans() }}


            <hr>

            <img src="{{ $article->image_path }}" height="200" width="200" class="img-rounded"/>

            <div class="body"><p style="width: 550px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{!!   $article->body !!}</p></div>

            <hr>
        </article>
    @endforeach




@stop