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
                    <h1 class="fw-bold">Add New Post</h1>
                </div>
                <div class="col-2">
                    <a href="{{route('dashboard')}}">Home</a> \ <span>Add Post</span>
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
                    <form action="{{route('post.store')}}" enctype="multipart/form-data"  method="post" class="addPost mb-5">
                        @csrf
                        <div class="mb-3">
                            <input type="number" hidden value="{{ Auth::id() }}" name="user_id">
                            <label for="adminPost" class="form-label">Post Title</label>
                            <input type="text" class="form-control" id="adminPost" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="postDec" class="form-label">Post Description</label>
                            <textarea name="description" class="form-control" id="postDec" rows="10" columns="20"></textarea>
                        </div>
                        <div class="mb-3">
                            
                                <label for="floatingSelect" class="form-label">Categories</label>
                                <select class="form-select" id="floatingSelect" name="category_id"  aria-label="Floating label select example">
                                    <option selected hidden>Select Category</option>
                                    @forelse ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @empty
                                        <option class="text-secondary">No Category Available</option>    
                                    @endforelse
                                </select>
                                {{-- @foreach($categories as $category)
                                    <div>
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category_{{ $category->id }}">
                                        <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                @endforeach --}}
                        </div>
                        <div class="mb-3">
                            <label for="postImg" class="form-label">Post Image</label>
                            <input type="file" name="image" class="form-control" id="postImg">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn primaryBtn btn-md" style="background-color: #1A5319;">Publish</button>
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
    toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    menubar: false
  });
</script>
