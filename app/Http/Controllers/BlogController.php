<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{

    public function getIndex()
    {
        return view('index');

    }

    public function getRegister()
    {
        return view('register');
    }

    public function postRegister()
    {

    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin()
    {

    }

    public function getCreate()
    {
        return view('createArticle');
    }

    public function postCreate()
    {

    }

}
