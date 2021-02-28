<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Blog CMS</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

     <div class="container-fluid bg-white shadow-lg sticky-top p-2">
          <div class="container">
               <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="{{ route('home') }}">Blog CMS</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <i class="fas fa-bars"></i>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav mx-auto">
                              <li class="nav-item mr-2 {{ Request::path() == 'home' ? 'active' : '' }}">
                                   <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                              </li>
                              @foreach($categories as $category)
                              <li class="nav-item mr-3 {{ Request::path() == "postCategory/$category->id" ? 'active' : '' }}">
                                   <a class="nav-link" href="{{ url("postCategory/$category->id") }}">{{ $category->name }}</a>
                              </li>
                              @endforeach
                              <li class="nav-item dropdown mr-3">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   {{ Auth::user()->name }}
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->admin == 1)
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Admin Dashboard
                                         </a>
                                        @endif
                                        @if(Auth::user()->admin != 1)
                                        <a class="dropdown-item" href="#">
                                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Profile
                                         </a>
                                        @endif
                                         <a class="dropdown-item" href="{{ url('user/' . Auth::user()->id . '/edit') }}">
                                             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Change Password
                                         </a>
                                         <div class="dropdown-divider"></div>
                                         <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onclick="document.getElementById('logout').submit()">
                                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                             Logout
                                         </a>
                                         <form action="{{ route('logout') }}" method="POST" id="logout">
                                             @csrf
                                         </form>
                                   </div>
                              </li>
                         </ul>
                         <form class="form-group my-2 my-lg-0 d-flex align-items-center border" action="{{ url("getSearch") }}" method="GET">
                              @csrf
                              <input class="form-control border-0 rounded-0" type="search" placeholder="Search" aria-label="Search" name="search">
                              <button class="fas fa-search mr-3 border-0"></button>
                         </form>
                    </div>
               </nav>
          </div>
     </div>
     
     <div class="container-fluid my-3">
          <div class="container">
               <div class="row">
                    <div class="col-12 col-lg-8 mb-3">
                         @yield('content')
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                         <div class="widget">
                              <h5 class="title font-weight-bold">Search</h5>
                              <hr>
                              <form action="{{ url("getSearch") }}" method="GET">
                                   @csrf
                                   <div class="form-group d-flex align-items-center border">
                                        <input type="text" class="form-control border-0" name="search" placeholder="Search">
                                        <button class="fas fa-search mr-3 border-0"></button>
                                   </div>
                              </form>
                              <h5 class="title font-weight-bold">Recent Posts</h5>
                              <hr>
                              <div class="recent-posts">
                                   @if(count($posts_title) > 0)
                                        @foreach($posts_title as $post_title)
                                        <p class="my-3">
                                             <a href="{{ url("postDetail/$post_title->id") }}" class="text-reset">{{ $post_title->post_title }}</a>
                                        </p>
                                        <hr>
                                        @endforeach
                                   @endif
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="back-to-top">
          <i class="fas fa-angle-up"></i>
     </div>

     <div class="container-fluid bg-danger">
          <div class="container p-3">
               <p class="text-center text-white mb-0">Developed By Kaung Myat Aung</p>
               <div class="social-icons d-flex align-items-center justify-content-center mt-3">
                    <i class="fab fa-facebook-f mr-3"></i>
                    <i class="fab fa-instagram-square"></i>
               </div>
          </div>
     </div>

     <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>