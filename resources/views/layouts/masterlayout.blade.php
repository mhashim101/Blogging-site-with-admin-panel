<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Panel - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mediaquery.css')}}">   
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        
    <style>
        .image-box {
            width: 60px;
            height: 60px; 
            overflow: hidden; 
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc; 
            position: relative;
        }
        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .dropdown-menu li a:hover, .dropdown-menu li form button:hover{
        background-color: #508D4E;
        color: #D6EFD8;
        
    }
    .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0; /* Remove the margin so it aligns properly */
        }
    </style>
  </head>
  <body class="karla-font">
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                {{-- Aside for Mobile View --}}
                @if (Auth::user()->role == 'admin')
                    <div id="mySidepanel" class="col-xxl-2 col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-4 col-sm-12 text-center">
                                        
                                        @if(Auth::check() && Auth::user()->profile)
                                        <div class="border border-5 image-box rounded-circle">
                                            <img src="{{ asset(Auth::user()->profile) }}" class="img-fluid" width="100%" alt="">
                                        </div>
                                        @else
                                            <div class="border border-5 image-box rounded-circle">
                                                <img src="{{ asset('img/user_default_img.png') }}" class="img-fluid" width="100%" alt="">
                                            </div>
                                        @endif

                                        
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-0">
                                        <div class="row">
                                            <div class="col-12 fw-bold text-light title text-start">
                                                <h5 class="mb-0">{{Auth::user()->name}}</h5>
                                            </div>
                                            <div class="col-12 text-light role text-start">
                                                <span>{{Auth::user()->role}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="text-light w-100">
                        <div class="row">
                            <div class="col-12">
                                <ul id="ul-a" class="list-unstyled">
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('dashboard')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-dashboard-100.png')}}" alt=""> 
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('post.index')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-post-100.png')}}" alt=""> 
                                            View Posts
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('addpost')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-add-100.png')}}" alt=""> 
                                            Add Post
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('updateById')}}" class="nav-link text-light">

                                            <img src="{{asset('img/icons8-update-100.png')}}" alt=""> 
                                            Update Post
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('deletebyid')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/icons8-delete-100.png')}}" alt=""> 
                                            Delete Post
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('allusers')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/users-icon.png')}}" alt=""> 
                                            Users
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('categories')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/categories-icon.png')}}" alt=""> 
                                            Categories
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('comments')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/comments-icon.png')}}" alt=""> 
                                            Comments
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>   
                    </div>
                @else
                    <div id="mySidepanel" class="col-xxl-2 col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                        <div class="row my-3">
                            <div class="col-12">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-4 col-sm-12 text-center">
                                        
                                        @if(Auth::check() && Auth::user()->profile)
                                        <div class="border border-5 image-box rounded-circle">
                                            <img src="{{ asset(Auth::user()->profile) }}" class="img-fluid" width="100%" alt="">
                                        </div>
                                        @else
                                            <div class="border border-5 image-box rounded-circle">
                                                <img src="{{ asset('img/user_default_img.png') }}" class="img-fluid" width="100%" alt="">
                                            </div>
                                        @endif

                                        
                                    </div>
                                    <div class="col-md-8 col-sm-12 px-0">
                                        <div class="row">
                                            <div class="col-12 fw-bold text-light title text-start">
                                                <h5 class="mb-0">{{Auth::user()->name}}</h5>
                                            </div>
                                            <div class="col-12 text-light role text-start">
                                                <span>{{Auth::user()->role}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="text-light w-100">
                        <div class="row">
                            <div class="col-12">
                                <ul id="ul-a" class="list-unstyled">
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('dashboard')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-dashboard-100.png')}}" alt=""> 
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('post.index')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-post-100.png')}}" alt=""> 
                                            View Posts
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('addpost')}}" class="nav-link text-light">
                                            <img src="{{asset('img/icons8-add-100.png')}}" alt=""> 
                                            Add Post
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('updateById')}}" class="nav-link text-light">

                                            <img src="{{asset('img/icons8-update-100.png')}}" alt=""> 
                                            Update Post
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item text-decoration-none ">
                                        <a href="{{route('deletebyid')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/icons8-delete-100.png')}}" alt=""> 
                                            Delete Post
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('allusers')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/users-icon.png')}}" alt=""> 
                                            Users
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="{{route('categories')}}" class="nav-link text-light" >
                                            <img src="{{asset('img/categories-icon.png')}}" alt=""> 
                                            Categories
                                        </a>
                                    </li>
                                    <li class="nav-item text-decoration-none ">
                                        <a href="#" class="nav-link text-light" >
                                            <img src="{{asset('img/comments-icon.png')}}" alt=""> 
                                            Comments
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>   
                    </div>
                @endif
                
                {{-- Aside for Mobile View End Here --}}

                {{-- Master Layout starts --}}
                <div class="col-xxl-10 col-xl-9 col-lg-9 col-md-9 col-sm-12 content">
                    {{-- Aside and Header for Desktop starts --}}
                    @if (Auth::user()->role == 'admin')
                        <div class="row">
                            <div class="col-md-12 px-0">
                                <div class="p-4 d-flex justify-content-between align-items-center adminHeader" style="background-color: #508D4E;">
                                    <div class="d-md-none">
                                        <div class="row d-md-none">
                                            <div class="col-sm-12" style="position: relative;">
                                                <p class="mb-0">
                                                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        ☰
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample" style="position: absolute; left: -12px; top: 57px; z-index: 22;">
                                                    <div class="card card-body" style="background-color: #1A5319; width: 250px;">
                                                    <div class="row d-flex justify-content-center align-items-center">
                                                        <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                                                            @if(Auth::check() && Auth::user()->profile)
                                                            <div class="border border-5 image-box rounded-circle">
                                                                <img src="{{ asset(Auth::user()->profile) }}" class="img-fluid" width="100%" alt="">
                                                            </div>
                                                            @else
                                                                <div class="border border-5 image-box rounded-circle">
                                                                    <img src="{{ asset('img/user_default_img.png') }}" class="img-fluid" width="100%" alt="">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 px-0">
                                                            <div class="row">
                                                                <div class="col-12 fw-bold text-light title text-center">{{Auth::user()->name}}</div>
                                                                <div class="col-12 text-light role text-center">{{Auth::user()->role}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="text-light w-100">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <ul id="ul-a" class="list-unstyled">
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('dashboard')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-dashboard-100.png')}}" alt=""> 
                                                                            Dashboard
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('post.index')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-post-100.png')}}" alt=""> 
                                                                            View Posts
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('addpost')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-add-100.png')}}" alt=""> 
                                                                            Add Post
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('updateById')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-update-100.png')}}" alt=""> 
                                                                            Update Post
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('deletebyid')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/icons8-delete-100.png')}}" alt=""> 
                                                                            Delete Post
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('allusers')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/users-icon.png')}}" alt=""> 
                                                                            Users
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('categories')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/categories-icon.png')}}" alt=""> 
                                                                            Categories
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('comments')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/comments-icon.png')}}" alt=""> 
                                                                            Comments
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="mb-0">
                                        <a href="{{route('dashboard')}}" class="text-decoration-none text-light">Home</a>
                                    </h4>
                                    <a href="{{route('logoutUser')}}" type="button" class="btn primaryBtn btn-md">Logout</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-12 px-0">
                                <div class="p-4 d-flex justify-content-between align-items-center adminHeader" style="background-color: #508D4E;">
                                    <div class="d-md-none">
                                        <div class="row d-md-none">
                                            <div class="col-sm-12" style="position: relative;">
                                                <p class="mb-0">
                                                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                        ☰
                                                    </button>
                                                </p>
                                                <div class="collapse" id="collapseExample" style="position: absolute; left: -12px; top: 57px; z-index: 22;">
                                                    <div class="card card-body" style="background-color: #1A5319; width: 250px;">
                                                    <div class="row d-flex justify-content-center align-items-center">
                                                        <div class="col-md-4 col-sm-12 d-flex justify-content-center align-items-center">
                                                            @if(Auth::check() && Auth::user()->profile)
                                                            <div class="border border-5 image-box rounded-circle">
                                                                <img src="{{ asset(Auth::user()->profile) }}" class="img-fluid" width="100%" alt="">
                                                            </div>
                                                            @else
                                                                <div class="border border-5 image-box rounded-circle">
                                                                    <img src="{{ asset('img/user_default_img.png') }}" class="img-fluid" width="100%" alt="">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-8 col-sm-12 px-0">
                                                            <div class="row">
                                                                <div class="col-12 fw-bold text-light title text-center">{{Auth::user()->name}}</div>
                                                                <div class="col-12 text-light role text-center">{{Auth::user()->role}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="text-light w-100">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <ul id="ul-a" class="list-unstyled">
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('dashboard')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-dashboard-100.png')}}" alt=""> 
                                                                            Dashboard
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('post.index')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-post-100.png')}}" alt=""> 
                                                                            View Posts
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('addpost')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-add-100.png')}}" alt=""> 
                                                                            Add Post
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('updateById')}}" class="nav-link text-light">
                                                                            <img src="{{asset('img/icons8-update-100.png')}}" alt=""> 
                                                                            Update Post
                                                                        </a>
                                                                    </li>
                                                                    {{-- <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('deletebyid')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/icons8-delete-100.png')}}" alt=""> 
                                                                            Delete Post
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('allusers')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/users-icon.png')}}" alt=""> 
                                                                            Users
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="{{route('categories')}}" class="nav-link text-light" >
                                                                            <img src="{{asset('img/categories-icon.png')}}" alt=""> 
                                                                            Categories
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item text-decoration-none ">
                                                                        <a href="#" class="nav-link text-light" >
                                                                            <img src="{{asset('img/comments-icon.png')}}" alt=""> 
                                                                            Comments
                                                                        </a>
                                                                    </li> --}}
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="mb-0">
                                        <a href="{{route('dashboard')}}" class="text-decoration-none text-light">Home</a>
                                    </h4>
                                    <a href="{{route('logoutUser')}}" type="button" class="btn primaryBtn btn-md">Logout</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                     {{-- Aside and Header for Desktop end --}}
                    @yield('content')
                </div>
                {{-- Master Layout starts --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
  </body>
</html>