<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration Page</title>
    <style>
        .container-fluid{
            /* border: 2px solid red; */
            height: 100vh;
            background-color: #D6EFD8;
            
        }
        #registrationForm{
            color: #D6EFD8;
            border: 5px solid #508D4E;
            background-color: #1A5319;
            border-radius: 15px;
            /* box-shadow: 2px 2px 2px 2px #1A5319; */
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3);
        }
        .primaryBtn:hover{
            background-color: #D6EFD8!important;
            border: 2px solid #1A5319!important;
            color: #1A5319;
        }
        .primaryBtn{
            border: 2px solid #D6EFD8!important;
            background-color: #1A5319 !important;
            color: #f0f0f0;
        }

    </style>
  </head>
  <body>
    <div class="container-fluid d-flex justify-content-center  flex-column">
        <div class="row">
            <div class="col-md-12">
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
                <form id="registrationForm" action="{{route('registerUser')}}" enctype="multipart/form-data" method="POST" style="width: 30% !important;" class="m-auto p-5">
                    @csrf
                    <h1 class="text-center">Sign Up</h1>
                    <div class="mb-3 row">
                        <label for="username" class="form-label">Name</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="username" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="useremail" class="form-label">Email</label>
                        <div class="col-sm-12">
                        <input type="email" class="form-control" id="useremail" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="userPassword" class="form-label">Password</label>
                        <div class="col-sm-12">
                        <input type="password" class="form-control" id="userPassword" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="c_Password" class="form-label">Confirm Password</label>
                        <div class="col-sm-12">
                        <input type="password" class="form-control" id="c_Password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="userimg" class="form-label">Profile</label>
                        <div class="col-sm-12">
                        <input type="file" class="form-control" id="userimg" name="profile" >
                        {{-- <input type="file" class="form-control" id="userimg" name="profile"> --}}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn primaryBtn">Register</button>
                        </div>
                    </div>
                    <div class="mt-3">
                        Already have an <a href="{{route('loginPage')}}">account?</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>