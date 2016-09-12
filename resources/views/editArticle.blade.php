@extends('layout')

@section('page-css')

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">


@stop
@section('content')


    <h1><strong>Edit: {{ $articles->title }}</strong></h1>

    <hr/>

    <form method="post" action="{{ route('post:update-article',['id'=>$articles->id]) }}" role="form"
          enctype="multipart/form-data" class="form-group">

        {{ csrf_field() }}

        <div class="form-group">

            <label class="sr-only" for="title">Title:</label>
            <input type="text" name="title" placeholder="Title..."
                   class="form-title form-control" id="form-title" value="{{ $articles->title }}">

            <span class="alert-danger">{{ $errors->first('title') }}</span>
        </div>

        <div class="form-group">

            <label class="sr-only" for="body">Body:</label>
            <textarea class="form-textarea form-control" placeholder="Body..." name="body"
                      style="height: 200px;">{{ $articles->body }}</textarea>

            <span class="alert-danger">{{ $errors->first('body') }}</span>

            <hr>

        </div>


        <div class="form-group">


            <label class="sr-only" for="image">Image</label>

            <img src="{{ $articles->image_path }}" height="200" width="200" class="img-rounded">

            <hr>
            <input type="file" name="image"
                   class="form-image form-control" id="form-image" value="{{ $articles->image_path }}">

            <span class="alert-danger">{{ $errors->first('image') }}</span>


        </div>





        <div class="form-group">

            <label class="sr-only" for="published_at">Publish On:</label>
            <input type="date" name="published_at" class="form-date form-control" id="form-date"
                   value="{{ $articles->published_at }}">

            <span class="alert-danger">{{ $errors->first('published_at') }}</span>

        </div>

        <div class="form-group">

            <label class="sr-only" for="tag_list">Tags:</label>
            <select name="tag_list[]" id="tag_list" class="form-tags form-control" value="" multiple="multiple">

                @foreach($articleTags as $tag)
                    <option value="{{  $tag->id }}" selected> {{ $tag->name }}  </option>
                @endforeach

                @foreach($unselectedTags as $tag)
                    <option value="{{  $tag->id }}"> {{ $tag->name }}  </option>
                @endforeach

            </select>


        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Update Article</button>
        </div>


    </form>




@stop

@section('page-js')

    <script src="{{ asset('js/jquery.backstretch.min.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({ selector:'textarea',
            theme: 'modern',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'




        });
    </script>

    <script type="text/javascript">
        $('#tag_list').select2({
            placeholder: 'Choose a tag...'
        });
    </script>

@stop