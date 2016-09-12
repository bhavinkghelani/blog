@foreach($comments as $comment)
    {{-- show the comment markup --}}
    @include('comments.showComment', ['comment' => $comment])

    @if($comment->children->count() > 0)
        {{-- recursively include this view, passing in the new collection of comments to iterate --}}
        <div style="margin-left: 50px;">
            @include('comments.index', ['comments' => $comment->children])
        </div>

    @endif
@endforeach