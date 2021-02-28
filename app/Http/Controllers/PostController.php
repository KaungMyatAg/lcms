<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $post = new Post();
        $request->validate([
            'post_title' => 'required | min:10 | max:100',
            'category_name' => 'required',
            'post_image' => 'required | mimes:jpg,bmp,png',
            'post_excerpt' => 'required | min:50 | max:500',
            'post_description' => 'required | min:500 | max:5000'
        ]);
        $image = $request->file('post_image');
        $upload = 'images/posts/';
        $filename = $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathname(),$upload.$filename);

        $post->post_title       = $request->input('post_title');
        $post->category_id      = $request->input('category_name');
        $post->post_author      = $request->input('post_author');
        $post->post_image       = $filename;
        $post->post_excerpt     = $request->input('post_excerpt');
        $post->post_description = $request->input('post_description');
        $post->created_date     = date('F d, Y');
        $post->save();
        return redirect(route('post.index'))->with('Success','Created Post Successfully!');
    }
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.post.edit',compact('categories','post'));
    }
    public function update(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'post_title' => 'required | min:10 | max:100',
            'category_name' => 'required',
            'post_image' => 'required | mimes:jpg,bmp,png',
            'post_excerpt' => 'required | min:50 | max:500',
            'post_description' => 'required | min:500 | max:5000'
        ]);
        $image = $request->file('post_image');
        $upload = 'images/posts/';
        $filename = $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathname(),$upload.$filename);

        $post->post_title       = $request->input('post_title');
        $post->category_id      = $request->input('category_name');
        $post->post_author      = $request->input('post_author');
        $post->post_image       = $filename;
        $post->post_excerpt     = $request->input('post_excerpt');
        $post->post_description = $request->input('post_description');
        $post->created_date     = date('F d, Y');
        $post->save();
        return redirect(route('post.index'))->with('Success','Updated Post Successfully!');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        return redirect(route('post.index'))->with('Success','Deleted Post Successfully');
    }
}
