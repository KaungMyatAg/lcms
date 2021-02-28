@extends('layouts.master')

@section('content')
     @if(count($posts) > 0)
          @foreach($posts as $post)
          <div class="post-container my-3">
               <div class="card bg-white shadow-lg border-0 rounded-0">
                    <div class="card-body">
                         <div class="row">
                              <div class="col-12 col-lg-6 mb-3">
                                   <div class="post-image">
                                        <img src="{{ asset("images/posts/$post->post_image") }}" alt="" class="w-100">
                                   </div>
                              </div>
                              <div class="col-12 col-lg-6 mb-3">
                                   <div class="post-category">
                                        <p class="my-1 text-black-50 font-weight-bold"><span>{{ $post->created_date }}</span>
                                        @foreach($categories as $category)
                                             @if($category->id == $post->category_id)
                                                  <span class="text-danger font-weight-bold"> - {{ $category->name }}</span>
                                             @endif
                                        @endforeach
                                        </p>
                                   </div>
                                   <div class="post-title">
                                        <h4 class="title text-justify font-weight-bold"><a href="{{ url("postDetail/$post->id") }}" class="text-reset">{{ $post->post_title }}</a></h4>
                                   </div>
                                   <div class="post-author">
                                        <p class="my-1 font-weight-bold">By - {{ $post->post_author }}</p>
                                   </div>
                                   <div class="post-excerpt">
                                        <p class="text-justify">{{ $post->post_excerpt }}</p>
                                   </div>
                                   <div class="post-readmore">
                                        <a href="{{ url("postDetail/$post->id") }}" class="btn btn-light btn-sm rounded-0 shadow-lg">Read More</a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          @endforeach
     @else
     <div class="alert alert-warning" role="alert">
          No Result!
     </div>
     @endif
@endsection