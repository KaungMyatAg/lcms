<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $request->validate([
            'category_name' => 'required | max:15 | min:3'
        ]);
        $category->name = $request->input('category_name');
        $category->created_date = date('F d, Y');
        $category->save();
        return redirect(route('category.index'))->with('Success','Created Category Successfully!');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
            'category_name' => 'required | max:15 | min:3'
        ]);
        $category->name = $request->input('category_name');
        $category->save();
        return redirect(route('category.index'))->with('Success','Updated Category Successfully!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return redirect(route('category.index'))->with('Success','Deleted Category Successfully!');
    }
}
