<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Post::latest()->paginate(10);
        $posts_title = Post::limit(5)->latest()->get();
        return view('index',compact('categories','posts','posts_title'));
    }

    public function postCategory($id)
    {
        $categories = Category::all();
        $posts = DB::table('posts')->where('category_id' , '=' , $id)->latest()->get();
        $posts_title = Post::limit(5)->latest()->get();
        return view('postCategory',compact('categories','posts','posts_title'));
    }

    public function postDetail($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        $posts_title = Post::limit(5)->latest()->get();
        $related_posts = DB::table('posts')->where('category_id' , '=' , $categories[$post->category_id - 1]->id)->limit(5)->latest()->get();
        $comments = DB::table('comments')->where('post_id' , '=' , $id)->limit(5)->latest()->get();
        $users = User::all();
        return view('postDetail',compact('categories','post','posts_title','related_posts','comments','users'));
    }

    public function getSearch(Request $request)
    {
        $categories = Category::all();
        $posts = DB::table('posts')->where('post_title' , 'LIKE' , '%' . $request->input('search') . '%')->latest()->get();
        $posts_title = Post::limit(5)->latest()->get();
        return view('postSearch',compact('categories','posts','posts_title'));
    }
}
