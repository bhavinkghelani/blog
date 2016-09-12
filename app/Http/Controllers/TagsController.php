<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Tag;
use App\Article;

class TagsController extends Controller {

    public function show($tag)
    {
        $tag = Tag::where('name', $tag)->first();

        if(!$tag){
            abort(404);
        }

        $articles = $tag->articles()->get();

        return view('index', compact('articles'));
    }

}
