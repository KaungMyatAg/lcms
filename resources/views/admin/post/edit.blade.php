@extends('layouts.admin')

@section('content')
    <div class="container">
          <div class="row">
               <div class="col-12 col-lg-8">
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
                         </ol>
                    </nav>
                    <div class="card border-0 bg-white shadow-lg">
                         <div class="card-header">
                              <h5 class="card-title mb-0 font-weight-bold">Edit Post</h5>
                         </div>
                         <form action="{{ url("post/$post->id") }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for="post_title">Post Title : </label>
                                        <input type="text" class="form-control rounded-0 @error('post_title') is-invalid @enderror" name="post_title" id="post_title" value="{{ $post->post_title }}">
                                        @error('post_title') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                                   <div class="form-group">
                                        <input type="hidden" class="form-control rounded-0" name="post_author" id="post_author" value="{{ Auth::user()->name }}">
                                   </div>
                                   <div class="form-group">
                                        <label for="category_name">Category Name : </label>
                                        <select name="category_name" id="category_name" class="custom-select rounded-0">
                                             @if(count($categories) > 0)
                                                  @foreach($categories as $category)
                                                       <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                                  @endforeach
                                             @endif
                                        </select>
                                        @error('category_name') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                                   <div class="form-group">
                                        <label for="post_image">Post Image : </label>
                                        <input type="file" class="form-control rounded-0 @error('post_image') is-invalid @enderror p-1" name="post_image" id="post_image">
                                        @error('post_image') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                                   <div class="form-group">
                                        <label for="post_excerpt">Post Excerpt : </label>
                                        <input type="text" class="form-control rounded-0 @error('post_excerpt') is-invalid @enderror" name="post_excerpt" id="post_excerpt" value="{{ $post->post_excerpt }}">
                                        @error('post_excerpt') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                                   <div class="form-group">
                                        <label for="post_description">Post Description : </label>
                                        <textarea name="post_description" id="post_description" rows="10" class="form-control rounded-0 @error('post_description') is-invalid @enderror">{{ $post->post_description }}</textarea>
                                        @error('post_description') <span class="text-danger">{{ $message }}</span>@enderror
                                   </div>
                              </div>
                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary btn-block rounded-0">Update</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
    </div>
@endsection