@extends('layouts.masterlayout');

@section('title')
    View Post
@endsection

@section('content')
<div class="container-fluid px-0" style="background-color: #D6EFD8; ">
    <div class="row px-5" style="background-color: #D6EFD8; height: 100%;">
        <div class="col-12">
            <div class="row mt-4">
                <div class="col-md-9 col-sm-6 col-8">
                    <h1 class="fw-bold">All Posts</h1>
                </div>
                <div class="col-md-3 col-sm-6 col-4 text-end">
                    <a href="{{route('dashboard')}}">Home</a>
                    <a href="{{route('post.index')}}">\View Posts</a> 
                    <span>\ View</span>
                </div>
                <hr class="w-100"/>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xxl-10 col-xl-10 col-md-9 col-12">
                    <div class="card mb-5" style="width: 100%; background-color: #508D4E;">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-12 text-lg-end">
                                    <img src="{{ asset($post->user->profile) }}" style="border-radius: 30px;" width="80px" alt="">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-12 d-flex flex-column justify-content-center align-items-start">
                                    <h3 class="text-start fw-bold d-block mb-0 m-0 mx-md-4 mx-lg-0" style="font-size: 18px;">{{$post->user->name}}</h3>
                                    <span class="text-start d-block mb-0 mx-md-4 mx-lg-0">{{$post->user->role}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 d-block">
                            <img src="{{$post->image}}" class="card-img-top" width="400px" height="600px" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">{{$post->description}}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
