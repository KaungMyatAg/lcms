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

          <div class="comment-container my-3">
               <div class="card bg-white shadow-lg border-0 rounded-0">
                    <div class="card-header rounded-0">
                         <h3 class="card-title text-center mb-0 font-weight-bold">Post Comments</h3>
                    </div>
                    <div class="card-body">
                         <form action="{{ url("comment") }}" method="POST">
                              @csrf
                              <input type="hidden" class="form-control rounded-0" value="{{ Auth::user()->id }}" name="user_id">
                              <input type="hidden" class="form-control rounded-0" value="{{ $post->id }}" name="post_id">
                              <div class="input-group mb-3">
                                   <input type="text" class="form-control rounded-0 @error('comment') is-invalid @enderror" placeholder="Leave A Comment" aria-label="Recipient's username" aria-describedby="basic-addon2" name="comment" value="{{ old('comment') }}">
                                   <div class="input-group-append">
                                        <button type="submit" class="input-group-text bg-danger text-white rounded-0" id="basic-addon2">Submit</button>
                                   </div>
                              </div>                                 
                              @error('comment')<span class="text-danger">{{ $message }}</span>@enderror
                         </form>
                         @if(count($comments) > 0)
                              @foreach($comments as $comment)
                              <div class="comments my-2 d-flex justify-content-lg-between">
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
                         @endif
                    </div>
                    <div class="card-footer">
                         <h3 class="text-center font-weight-bold"><a href="{{ url("comment/$post->id") }}">View All Comments</a></h3>
                    </div>
               </div>
          </div>

          @if(count($related_posts) > 1)
          <div class="related-post my-3">
               <div class="card bg-white shadow-lg border-0 rounded-0">
                    <div class="card-header border-0">
                         <h2 class="card-title mb-0 font-weight-bold text-center">Related Posts</h2>
                    </div>
                    <div class="card-body">
                         <div class="row">
                              @foreach($related_posts as $related_post)
                                   @if($related_post->id != $post->id)
                                        <div class="col-12 col-lg-6 mb-3">
                                             <div class="related-post">
                                                  <img src="{{ asset("images/posts/$related_post->post_image") }}" alt="" class="w-100">
                                                  <div class="related-post-title my-3">
                                                       <h4 class="title text-justify font-weight-bold"><a href="{{ url("postDetail/$related_post->id") }}" class="text-reset"> {{ $related_post->post_title }} ( {{ $related_post->created_date }} ) </a></h4>
                                                       <p class="font-weight-bold text-justify my-3">{{ $related_post->post_excerpt }}</p>
                                                  </div>
                                             </div>
                                        </div>
                                   @endif
                              @endforeach
                         </div>
                    </div>
               </div>
          </div>
          @endif
@endsection