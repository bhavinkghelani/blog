<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
    return view('home');
});

Route::get('/list',['as' => 'get:list-artticles', 'uses' => 'BlogController@getIndex']);

Route::get('register',['as' => 'get:register', 'uses' => 'BlogCOntroller@getRegister']);

Route::post('register',['as' => 'post:register', 'uses' => 'BlogCOntroller@postRegister']);

Route::get('login',['as' => 'get:login', 'uses' => 'BlogController@getLogin']);

Route::post('login',['as' => 'post:login','uses' => 'BlogCOntroller@postLogin']);

Route::get('create',['as' => 'get:create','uses' => 'BlogController@getCreate']);

Route::post('create',['as' => 'post:create','uses' => 'BlogContoller@postCreate']);

