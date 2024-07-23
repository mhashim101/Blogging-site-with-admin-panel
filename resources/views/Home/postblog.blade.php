@extends('Home.layouts.homemasterlayout')
@section('active_blog')
<li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('postblog')}}">Blog</a></li>
@endsection
@section('active_home')
<li class="nav-item"><a class="nav-link" href="{{route('homepage')}}">Home</a></li>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            @isset($posts)
                @foreach ($posts as $key => $value )
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{$value->title}}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on {{$value->created_at->format('g:i A')}}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{$value->category->name}}</a>
                            {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> --}}
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="{{asset($value->image)}}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">{{$value->description}}</p>
                        </section>
                    </article>
                @endforeach
            @else
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on january 2024</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">JavaScript</a>
                        {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> --}}
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded" src="" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut porro error quidem illo sed. Iure iusto quaerat est quos, vel sequi harum alias! Distinctio cupiditate nam eos, ad consequuntur et pariatur aliquam sunt omnis quasi quo perferendis consectetur corporis vero officiis molestiae quae? Placeat nam eligendi doloribus pariatur voluptate quos, fugit aperiam, debitis perspiciatis dolore maiores at vitae autem. Accusantium perspiciatis dolorum architecto alias necessitatibus eligendi nemo! Repellat possimus commodi iure tenetur. Voluptatibus nostrum incidunt porro sint eveniet fugiat velit eos suscipit ad recusandae consequatur provident exercitationem odio alias numquam quas, facere cum. Ut, architecto nemo pariatur labore cum nam expedita possimus iure ipsum dolore quidem adipisci, maiores numquam nulla temporibus. Ullam quae et necessitatibus dolorum doloremque mollitia possimus hic esse asperiores qui, eum, eligendi molestiae, voluptatibus aliquid. Voluptatum et quasi nisi natus sapiente reiciendis minus aperiam totam fuga dolore quia nihil, alias culpa laboriosam, labore quae adipisci at modi!</p>
                    </section>
                </article>
            @endisset

            {{-- @forelse ($posts as $key => $value )
                
            @empty
                
            @endforelse --}}
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4">
                            <div class="mb-3">
                                {{-- <label for="username" class="form-label">ress</label> --}}
                                <input type="email" class="form-control" id="username" placeholder="Name" name="author">
                            </div>
                            <div class="mb-3">
                                {{-- <label for="useremail" class="form-label">Email address</label> --}}
                                <input type="email" class="form-control" id="useremail" placeholder="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="comment"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark">Post a Comment</button>
                            </div>
                        </form>
                        <hr>
                        <!-- Comment with nested comments-->
                        <div class="d-flex mb-4">
                            <!-- Parent comment-->
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                <!-- Child comment 1-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                    </div>
                                </div>
                                <!-- Child comment 2-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When you put money directly to a problem, it makes a good headline.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single comment-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn primaryBtn" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>
@endsection