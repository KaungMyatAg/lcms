<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $request->validate([
            'comment' => 'required | max:300 | min:10'
        ]);
        $comment->user_id = $request->input('user_id');
        $comment->comment = $request->input('comment');
        $comment->post_id = $request->input('post_id');
        $comment->save();
        return redirect(url("postDetail/" . $request->input('post_id')));
    }
    public function show($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        $posts_title = Post::limit(5)->latest()->get();
        $related_posts = DB::table('posts')->where('category_id' , '=' , $categories[$post->category_id - 1]->id)->limit(5)->latest()->get();
        $comments = DB::table('comments')->where('post_id' , '=' , $id)->latest()->get();
        $users = User::all();
        return view('allcomments',compact('categories','post','posts_title','related_posts','comments','users'));
    }
    public function destroy(Request $request,$id)
    {
        $comment = Comment::findOrFail($id)->delete();
        return redirect(url("postDetail/" . $request->input('post_id')));
    }
}
