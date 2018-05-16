<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $results = App\Category::all();
    return view('welcome',["obj"=>$results]);
});


Route::get('/posts/{id}', function ($id) {
    $results = App\Category::all();
    $posts = App\Post::where('id_category',$id)->get();
    return view('posts',["obj"=>$results,"posts"=>$posts]);
});

Route::get('/post/{id}', function ($id) {
    $results = App\Category::all();
    $post = App\Post::find($id);
    $comments = $post->comments;
    return view('post',["obj"=>$results,"post"=>$post,"comments"=>$comments]);
});

Route::post('/comment/{id}', function (Request $req, $id){
   
    App\Comment::create([
        "user_name"=>$req->user_name,
        "comment_body"=>$req->comment_body,
        "post_id"=>$id
    ]);
    return back();
});

Route::get('/admin', function (Request $req) {
    $results = App\Category::all();
    return view('admin', ["obj"=>$results]);
});

Route::post('/addpost', function (Request $req){
   $a =  Storage::put('public',$req->file('image'));
   App\Post::create([
        "title"=>$req->title,
        "body"=>$req->body,
        "id_category"=>1,
        "image"=>$a
    ]);
    return back();
});
Route::get('/test',function(Request $req){
    header("Access-Control-Allow-Origin:*");
    $result=App\Post::find($req->test);
    return $result;
});