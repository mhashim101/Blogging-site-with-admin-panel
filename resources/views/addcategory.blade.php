@extends('layouts.masterlayout')

@section('title')
    Add Post
@endsection

@section('content')
<div class="container-fluid px-0" style="background-color: #D6EFD8; ">
    <div class="row px-5" style="background-color: #D6EFD8; height: 100vh;">
        <div class="col-12">
            <div class="row mt-4">
                <div class="col-10">
                    <h1 class="fw-bold">Add New Category</h1>
                </div>
                <div class="col-2">
                    <a href="{{route('dashboard')}}">Home</a> \  <a href="{{route('categories')}}">Categories</a> <span>Add New Category</span>
                </div>
                <hr class="w-100">
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
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
                    <form action="{{route('addcategory')}}"  method="post" class="addPost mb-5">
                        @csrf
                        <div class="mb-3">
                            <label for="categ_name" class="form-label">Category</label>
                            <input type="text" class="form-control" id="categ_name" name="name">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn primaryBtn btn-md" style="background-color: #1A5319;">Add</button>
                        </div>
                    </form>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection