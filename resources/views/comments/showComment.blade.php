<div class="form-group commentSystem">

        <h4>
            <a href="{{ route('show-article',$comment->user->id) }}" style="color: #0f0f0f">
                {{ $comment->user->username }}

            </a>


        </h4>

    <a class="btn btn-info" href="{{route('post:comment-vote',$comment->id)}}">
        <span class="glyphicon glyphicon-triangle-top"></span></a>

    <form method="post" action="{{route('delete:comment-vote',$comment->id)}}" >
        {{ csrf_field() }}

        <button class="btn btn-danger" type="submit">
                    <span class="glyphicon glyphicon-triangle-bottom">
                    </span>
        </button>
    </form>


    <h6>{{$comment->created_at->diffForHumans()}}</h6>



    <comment>
           <b> {{ $comment->comment_body }} </b>
    </comment>

        <button class="btn btn-primary reply-btn">Reply</button>

        <form class="commentForm" style="display: none;">

            {{ csrf_field() }}


            <textarea id="" class="form-control" name="replyBody"></textarea>
            <input type="hidden" name="commentId" value="{{ $comment->id }}">
            <span class="alert-danger">{{ $errors->first('replyBody') }}</span>
            <br>
            <button type="submit" class="btn btn-primary replyBtn">reply</button>
        </form>


    </div>


@section('page-js')

    <script>
        $(document).on('click', '.reply-btn', function(e){
            e.preventDefault();
            $(this).closest('.commentSystem').find(".commentForm").slideToggle('slow');
        });
    </script>

    <script>
        $('.replyBtn').on('click', function(e){
            e.preventDefault();
            var formData = $(this).closest('.commentForm');
            var context = $(this);
            var keyThis = this;

            $.ajax({
                url: '{{ route("post:replyToComment",$article->id) }}',
                type: 'post',
                data: formData.serialize(),
                beforeSend: function(){
                    $(this).attr('disabled', 'disabled');
                    $('.error').html('');
                },
                success: function(result)
                {
                    $('.replyBtn').removeAttr('disabled', 'disabled');
                    if(result.success)
                    {
                        location.reload();
                    }
                    else
                    {
                        if(result.errors)
                        {
                            $.each(result.errors, function(index, error) {
                                context.closest('.commentSystem').find(".alert-danger").html(error);
                            });
                        }
                    }
                }
            });
        });

    </script>

@stop
