@extends('layouts.master')

@section('content')
          <div class="post-container my-3">
               <div class="card bg-white shadow-lg border-0 rounded-0">
                    <div class="card-body">
                         <div class="row">
                              <div class="col-12 mb-3">
                                   <div class="post-image">
                                        <img src="{{ asset("images/posts/$post->post_image") }}" alt="" class="w-100">
                                   </div>
                              </div>
                              <div class="col-12 mb-3">
                                   <div class="post-category">
                                        <p class="my-1 text-black-50 font-weight-bold"><span>{{ $post->created_date }}</span> <span class="text-danger font-weight-bold"> - {{ $post->category->name }}</span>
                                   </div>
                                   <div class="post-title">
                                        <h4 class="title text-justify font-weight-bold"><a href="{{ url("postDetail/$post->id") }}" class="text-reset">{{ $post->post_title }}</a></h4>
                                   </div>
                                   <div class="post-author">
                                        <p class="my-1 font-weight-bold">By - {{ $post->post_author }}</p>
                                   </div>
                                   <div class="post-excerpt">
                                        <p class="text-justify">{{ $post->post_description }}</p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          @if(count($comments) > 0)
          <div class="comment-container my-3">
               <div class="card bg-white shadow-lg border-0 rounded-0">
                    <div class="card-header rounded-0">
                         <h3 class="card-title text-center mb-0 font-weight-bold">Post Comments</h3>
                    </div>
                    <div class="card-body">
                         @foreach($comments as $comment)
                         <div class="comments my-2 d-flex">
                              <div class="comment">
                                   <div class="comment-author my-2">
                                        <h3 class="font-weight-bold">
                                             @foreach($users as $user)
                                                  @if($user->id == $comment->user_id)
                                                       {{ $user->name }}
                                                  @endif
                                             @endforeach
                                             ( {{ $comment->created_at }} )
                                        </h3>
                                   </div>
                                   <div class="comment-content">
                                        <p class="text-justify">
                                             {{ $comment->comment }}
                                        </p>
                                   </div>
                              </div>
                              @if(Auth::user()->id == $comment->user_id)
                              <div class="del-comment">
                                   <form action="{{ url("comment/$comment->id") }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" class="form-control" value="{{ $comment->post_id }}" name="post_id">
                                        <button type="submit" class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Are You Sure To Delete')">Delete</button>
                                   </form>
                              </div>
                              @endif
                         </div>
                         <hr>
                         @endforeach
                    </div>
                    <div class="card-footer">
                         <h3 class="text-center font-weight-bold"><a href="{{ url("postDetail/$post->id") }}">Go Back</a></h3>
                    </div>
               </div>
          </div>
          @else
          <div class="alert alert-success" role="alert">
               No Comments.
          </div>
          @endif
@endsection