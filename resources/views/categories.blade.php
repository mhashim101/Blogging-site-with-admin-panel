@extends('layouts.masterlayout')

@section('title')
    All Posts
@endsection

@section('content')
<style>
    .page-link {
    position: relative;
    display: block;
    color: #D6EFD8;
    text-decoration: none;
    background-color: #1A5319;
    border: 1px solid #dee2e6;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.page-link:hover {
    z-index: 2;
    color: #D6EFD8;
    background-color: #508D4E;
    border-color: #dee2e6;
}
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #113520;
    border-color: #D6EFD8;
}
.page-item.disabled .page-link {
    color: #D6EFD8;
    pointer-events: none;
    background-color: #1A5319;
    border-color: #dee2e6;
}
</style>
<div class="container-fluid px-0" style="background-color: #D6EFD8;">
    <div class="row px-5" style="background-color: #D6EFD8; height: 100vh;">
        <div class="col-12">
            <div class="row mt-4">
                <div class="col-10">
                    <h1 class="fw-bold">All Categories</h1>
                </div>
                <div class="col-2">
                    <a href="{{route('dashboard')}}">Home</a> \ Categories
                </div>
                <hr class="w-100">
            </div>
            <div class="row">
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

                <div class="col-12">      
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="{{route('addcategorypage')}}" class="btn primaryBtn btn-lg btn-md btn-sm">Add New Category</a>
                        </div>
                    </div>                              
                    <div class="table-responsive">
                        <table class="table table-success table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" >S.No</th>
                                    <th scope="col" >Name</th>
                                    <th scope="col" class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td class="text-center">
                                            <a href="{{route('destroyCategory',$category->id)}}" class="btn btn-danger btn-xl btn-lg btn-md btn-sm mb-md-0 mb-sm-2 mx-2">Delete</a>
                                        </td>
                                    </tr>                      
                                @empty
                                    <tr>
                                        <td class="text-secondary">
                                            <span>No Record</span>
                                        </td>
                                        <td class="text-secondary">
                                            <span>No Record</span>
                                        </td>
                                        <td class="text-secondary">
                                            <span>No Record</span>
                                        </td>
                                    </tr>  
                                @endforelse      
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{-- {{ $users->links('pagination::bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
