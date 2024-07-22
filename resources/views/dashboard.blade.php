@extends('layouts.masterlayout')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 p-0">
        <div class="row px-0 mx-0" style="background-color: #D6EFD8; height: 100vh;">
            <div class="col-12 p-4">
                <div class="row d-flex justify-content-around justify-content-sm-around align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-5 dash-box mb-4">
                        <a href="{{route('post.index')}}" class="text-decoration-none" style="color: #D6EFD8;">
                            <div class="row">
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <img src="{{asset('img/icons8-post-100.png')}}" width="100px" alt="">
                                </div>
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <span>View Posts</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-5 dash-box mb-4">
                        <a href="{{route('addpost')}}" class="text-decoration-none" style="color: #D6EFD8;">
                            <div class="row">
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <img src="{{asset('img/icons8-add-100.png')}}" width="100px" alt="">
                                </div>
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <span>Add Post</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-5 dash-box mb-4">
                        <a href="{{route('updateById')}}" class="text-decoration-none" style="color: #D6EFD8;">
                            <div class="row">
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <img src="{{asset('img/icons8-update-100.png')}}" width="100px" alt="">
                                </div>
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <span>Edit Post</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-5 dash-box mb-4">
                        <a href="{{route('deletebyid')}}" class="text-decoration-none" style="color: #D6EFD8;">
                            <div class="row">
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <img src="{{asset('img/icons8-delete-100.png')}}" width="100px" alt="">
                                </div>
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                    <span>Delete Post</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection