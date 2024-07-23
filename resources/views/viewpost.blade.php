@extends('layouts.masterlayout')

@section('title')
    View Post
@endsection
<style>
    .dropdown-menu li a:hover,
    .dropdown-menu li form button:hover {
        background-color: #508D4E;
        color: #D6EFD8;

    }

    .dropstart:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        /* Remove the margin so it aligns properly */
    }
</style>
@section('content')
    <div class="container-fluid px-0" style="background-color: #D6EFD8;">
        <div class="row px-5" style="background-color: #D6EFD8;">
            <div class="col-12">
                <div class="row mt-4">
                    <div class="col-md-9 col-sm-6 col-8">
                        <h1 class="fw-bold">All Posts</h1>
                    </div>
                    <div class="col-md-3 col-sm-6 col-4 text-end">
                        <a href="{{ route('dashboard') }}">Home</a>
                        <a href="{{ route('post.index') }}">\View Posts</a>
                        <span>\ View</span>
                    </div>
                    <hr class="w-100" />
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-8 col-md-9 col-12">
                        <div class="card mb-5" style="width: 100%; background-color: #508D4E;">
                            <div class="card-header">
                                <div class="row py-2">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div
                                                class="col-lg-2 mb-lg-0 mb-md-2 col-sm-12 justify-content-lg-end align-items-center">
                                                <div class="border border-5 image-box rounded-circle">
                                                    <img src="{{ asset($post->user->profile) }}" alt="">
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-10 col-sm-12 d-flex flex-column justify-content-center align-items-start">
                                                <h4 class="text-start d-block ml-2 mb-0">{{ $post->user->name }}</h4>
                                                <span class="text-start d-block ml-lg-2">{{ $post->user->role }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-start align-items-center"
                                        style="position: relative;">
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle dropdown-toggle-split"
                                                style="font-size: 25px;" type="button" id="dropdownMenuButton2"
                                                data-bs-toggle="dropdown" aria-expanded="false">

                                            </button>
                                            <ul class="dropdown-menu" style="background-color: rgb(26, 83, 25);"
                                                aria-labelledby="dropdownMenuButton2">
                                                <li>
                                                    <a class="dropdown-item text-white"
                                                        href="{{ route('post.edit', $post->id) }}">Edit</a>
                                                </li>
                                                @if (Auth::user()->role == 'admin')
                                                <li>
                                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item text-white">Delete</button>
                                                    </form>
                                                    {{-- <a class="dropdown-item text-white" href="#">Delete</a> --}}
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-white">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->description }}</p><br>
                                <p class="card-text"> <span class="text-light">Category: </span><strong
                                        class="border-2 rounded">{{ $post->category->name }}</strong></p>
                                @if ($post->image != '')
                                    <div class="w-100 d-block">
                                        <img src="{{ asset($post->image) }}" class="card-img-top" width="400px"
                                            height="600px" alt="...">
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-around text-align-center">
                                    <div class="col-md-3 p-1">
                                        Like
                                    </div>
                                    <div class="col-md-3 p-1 text-center">
                                        Comments
                                    </div>
                                    <div class="col-md-3 p-1 text-end">
                                        Share
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
