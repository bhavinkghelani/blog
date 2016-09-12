<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ReplyRequest;
use App\Http\Requests\UpdateRequest;
use App\Tag;
use App\User;
use App\Vote;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\Auth;
use App\Article;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\PasswordRequest;

use App\Http\Requests\ArticleRequest;


class BlogController extends Controller
{

    public function getIndex()
    {

//            $articles = DB::table('articles')
//                          ->join('users','articles.user_id','=','users.id')
//                          ->select('articles.*','users.firstname')
//                          ->latest('published_at')
//                              ->get();

            $articles = Article::with('user')->with('comments')->with('votes')->published()->get();

            return view('index', compact('articles'));

    }


    public function getRegister()
    {
        return view('register');
    }


    public function postRegister(BlogRequest $request)
    {

        $user = $request->file('profileImage');

        $path = public_path() . '/profile_pictures';

        $image_name = sha1(time()) . "-" . $user->getClientOriginalName();

        $user->move($path, $image_name);

        $user = new User();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->profileImagePath = '/profile_pictures/' . $image_name;

        $user->save();

        return redirect('login');

    }


    public function getLogin()
    {
        return view('login');
    }


    public function postLogin(Request $request)
    {
        if (!Auth::attempt([
            'username' => $request->get('username'),
            'password' => $request->get('password'),
        ])
        ) {


            Session::flash('flash_message', 'Your username or password does not match ');

            return redirect()->route('get:login');

        }

        return redirect('create');


    }


    public function getCreate()
    {
        $tags = Tag::all();

        return view('createArticle', compact('tags'));
    }


    public function postCreate(ArticleRequest $request)
    {


        $article = $request->file('image');

        $path = public_path() . '/uploads';

        $image_name = sha1(time()) . "-" . $article->getClientOriginalName();

        $article->move($path, $image_name);

        $article = Auth::user()->articles()->create($request->all());

        $article->tags()->sync($request->input('tag_list'));

        $article->image_path = '/uploads/' . $image_name;


        $article->save();


        return redirect()->route('get:user-articles');


    }


    public function show($id)
    {
        $article = Article::find($id);

        $tags = Tag::find($id);

        $comments = Comment::with('user')->where('article_id',$id)->where('parent_id', 0)->get();

        return view('show', compact('article', 'tags','comments'));
    }


    public function editArticle($id)
    {

        $articles = Article::find($id);

        if ($articles->user_id != Auth::user()->id){

            Session::flash('flash_message', 'You do not have permission to perform this task ');

            return redirect()->route('get:article',$id);

        }
        $articleTags = $articles->tags;
        $tags = Tag::all();
        $unselectedTags = $tags->diff($articleTags);
        return view('editArticle', compact('articles', 'unselectedTags', 'articleTags'));
    }


    public function updateArticle(UpdateRequest $request, $id)
    {

        $article = Article::find($id);

        if ($article->user_id != Auth::user()->id) {

            Session::flash('flash_message', 'You do not have permission to perform this task ');

            return redirect('index');
        }


        if ($request->hasFile('image')) {

            unlink(public_path() . $article->image_path);

            $articleImage = $request->file('image');

            $path = public_path() . '/uploads';

            $image_name = sha1(time()) . "-" . $articleImage->getClientOriginalName();

            $articleImage->move($path, $image_name);

            $article->image_path = '/uploads/' . $image_name;
        }


        $article->tags()->sync($request->input('tag_list'));

        $article->title = $request->title;

        $article->body = $request->body;

        $article->published_at = $request->published_at;

        $article->save();


        return redirect('index');


    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('get:login');
    }


    public function showProfile()
    {
        $user = Auth::user();

        return view('userProfile',compact('user'));

    }


    public function updateProfile(UpdateProfileRequest $request)
    {

            $user = Auth::user();

        if ($request->hasFile('profileImage')) {

            unlink(public_path() . $user->profileImagePath);

            $userImage = $request->file('profileImage');

            $path = public_path() . '/profile_pictures';

            $image_name = sha1(time()) . "-" . $userImage->getClientOriginalName();

            $userImage->move($path, $image_name);


            $user->profileImagePath = '/profile_pictures/' . $image_name;
        }


        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();

        return redirect()->route('get:profile');


    }


    public function showGetPassword()
    {

        return view('changePassword');

    }


    public function postChangePassword(PasswordRequest $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();


    }


    public function showUserArticle($id)
    {

        $articles = Article::where('user_id',$id)->get();

        return view('index',compact('articles'));

    }


    public function getUserArticle(Request $request)
    {

        $articles = Auth::user()->articles;

        return view('index',compact('articles'));
    }


    public function postComment(CommentRequest $request,$id)
    {

        $comment = new Comment();

        $comment->comment_body = $request->commentBody;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $id;

        $comment->save();

        return redirect()->route('get:article',$id);

    }


    public function postReply(ReplyRequest $request)
    {
//        dd($request->commentId);
        $parentComment = Comment::findOrFail($request->commentId);
        $comment = new Comment();
        $comment->comment_body = $request->replyBody;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $parentComment->article_id;
        $comment->parent_id = $request->commentId;
        $comment->save();


        return response()->json([
            'success' => true,
        ]);
    }


    public function deleteArticle($id)
    {

        $article = Article::find($id);

        unlink(public_path() . $article->image_path);

        $deleteArticle = $article->delete();

        if ($deleteArticle)
        {

            Session::flash('flash_message', 'Your Article Successfully Deleted');

            return redirect()->route('get:user-articles');

        }


    }


    public function postArticleVote($id)
    {
        $article_id = $id;

        if (!$article_id) {
            abort('404', "Article Not Found");
        }

        $count = Vote::where('article_id',$article_id)
                        ->where('user_id',Auth::user()->id)
                        ->count();

        if ($count > 0) {

            Session::flash('flash_message', 'You have already vote this article');

            return redirect()->back();
        }


        $vote = new Vote();
        $vote->article_id = $id;
        $vote->user_id = Auth::user()->id;
        $vote->save();

        return redirect()->back();
    }


    public function deleteArticleVote($id)
    {
        $vote = Vote::where('article_id',$id)
                    ->where('user_id',Auth::user()->id)
                    ->first();

        if(!$vote)
        {
            Session::flash('flash_message', 'You already Unvote this article');

            return redirect()->back();
        }

        $vote->delete();

        return redirect()->back();


    }


    public function postCommentVote($id)
    {
        $comment_id = $id;

        if (!$comment_id) {
            abort('404', "Article Not Found");
        }

        $count = Vote::where('comment_id',$comment_id)
            ->where('user_id',Auth::user()->id)
            ->count();

        if ($count > 0) {

            Session::flash('flash_message', 'You have already vote this comment');

            return redirect()->back();
        }


        $vote = new Vote();
        $vote->comment_id = $id;
        $vote->user_id = Auth::user()->id;
        $vote->save();

        return redirect()->back();
    }


    public function deleteCommentVote($id)
    {

        $vote = Vote::where('comment_id',$id)
                    ->where('user_id',Auth::user()->id)
                    ->first();
        if(!$vote)
        {
            Session::flash('flash_message', 'You already Unvote this comment');

            return redirect()->back();
        }


        $vote->delete();

        return redirect()->back();


    }

}
