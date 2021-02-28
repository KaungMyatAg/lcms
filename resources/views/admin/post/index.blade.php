@extends('layouts.admin')

@section('content')
    <div class="container">
          <div class="row">
               <div class="col-12 col-lg-12">
                    <nav aria-label="breadcrumb">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post</a></li>
                              <li class="breadcrumb-item active" aria-current="page">View All Post</li>
                         </ol>
                    </nav>
                    @if(session('Success'))
                    <div class="alert alert-success" role="alert">
                         {{ session('Success') }}
                    </div>
                    @endif
                    @if(count($posts) > 0)
                    <div class="card border-0 bg-white shadow-lg">
                         <div class="card-header">
                              <h5 class="card-title mb-0 font-weight-bold">View All Posts</h5>
                         </div>
                         <div class="card-body">
                              <table class="table table-responsive table-hover">
                                   <thead>
                                        <tr>
                                             <th>Id</th>
                                             <th>Post Title</th>
                                             <th>Category Name</th>
                                             <th>Post Image</th>
                                             <th>Edit</th>
                                             <th>Delete</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($posts as $post)
                                             <tr>
                                                  <td>{{ $post->id }}</td>
                                                  <td>{{ $post->post_title }}</td>
                                                  <td>{{ $post->category->name }}</td>
                                                  <td>
                                                       <img src="{{ asset("images/posts/$post->post_image") }}" alt="" style="width: 50px;height:35px">
                                                  </td>
                                                  <td>
                                                       <a href="{{ url("post/$post->id/edit") }}" class="btn btn-primary btn-sm rounded-0">Edit</a>
                                                  </td>
                                                  <td>
                                                       <form action="{{ url("post/$post->id") }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are You Sure To Delete?')">Delete</button>
                                                       </form>
                                                  </td>
                                             </tr>
                                        @endforeach
                                   </tbody>
                              </table>
                         </div>
                         <div class="card-footer">
                              <a href="{{ route('post.create') }}" class="btn btn-primary btn-block rounded-0">Add New Post</a>
                         </div>
                    </div>
                    @endif
               </div>
          </div>
    </div>
@endsection