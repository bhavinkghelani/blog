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

Route::get('/',['as' => 'get-home' ,function(){
    return view('home');
}]);



Route::get('index',['as' => 'get:list-articles', 'uses' => 'BlogController@getIndex']);

Route::get('register',['as' => 'get:register', 'uses' => 'BlogCOntroller@getRegister']);

Route::post('register',['as' => 'post:register', 'uses' => 'BlogController@postRegister']);

Route::get('login',['as' => 'get:login', 'uses' => 'BlogController@getLogin']);

Route::post('login',['as' => 'post:login','uses' => 'BlogCOntroller@postLogin']);


Route::group(['middleware' => ['auth']], function () {


    Route::get('profile',['as' => 'get:profile', 'uses' => 'BlogController@showProfile']);

    Route::post('profile',['as' => 'post:profile', 'uses' => 'BlogController@updateProfile']);

    Route::get('changepassword',['as' => 'get:changePassword','uses' => 'BlogController@showGetPassword']);

    Route::post('changepassword',['as' => 'post:changePassword','uses' => 'BlogController@postChangePassword']);

    Route::get('create',['as' => 'get:create','uses' => 'BlogController@getCreate']);

    Route::post('create',['as' => 'post:create','uses' => 'BlogController@postCreate']);

    Route::get('articles/{id}/edit',['as' => 'get:edit-article', 'uses' => 'BlogController@editArticle']);

    Route::post('articles/{id}/edit',['as' => 'post:update-article','uses' => 'BlogController@updateArticle']);

    Route::get('user/articles',['as' => 'get:user-articles','uses' => 'BlogController@getUserArticle']);

    Route::post('articles/{id}',['as' => 'post:user-comment', 'uses' => 'BlogController@postComment']);

    Route::post('articles/comments/{commentId}',['as' => 'post:replyToComment','uses' => 'BlogController@postReply']);

    Route::post('articles/{id}/delete',['as' => 'delete:article','uses' => 'BlogController@deleteArticle']);

    Route::get('article/vote/{id}',['as' => 'post:article-vote','uses' => 'BlogController@postArticleVote']);

    Route::post('article/deleteVote/{id}',['as' => 'delete:article-vote','uses' => 'BlogController@deleteArticleVote']);

    Route::get('comment/vote/{commentId}',['as' => 'post:comment-vote', 'uses' => 'BlogController@postCommentVote']);

    Route::post('comment/{id}/deleteVote',['as' => 'delete:comment-vote','uses' => 'BlogController@deleteCommentVote']);





});


Route::get('tags/{tags}',['as' => 'get:tags' ,'uses' => 'TagsController@show']);

Route::get('user/{id}',['as' => 'show-article','uses' => 'BlogController@showUserArticle']);

Route::get('articles/{id}',['as' => 'get:article', 'uses' => 'BlogController@show']);

Route::get('logout', ['as' => 'get-logout', 'uses' => 'BlogController@getLogout']);

Route::get('patterns/1', function(){

    $cnt = 1;
    for($i=1;$i<=5;$i++){

        for($j=1;$j<=$i;$j++)
        {
            echo $cnt++;
        }
        echo "<br>";
    }
});
