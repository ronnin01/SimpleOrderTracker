<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/sass/app.scss')
    <title>Document</title>
</head>
<body class="bg-dark">
    
    <div class="container">
        <div class="vh-100 row justify-content-center align-items-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 col-10">
                <div class="card rounded-0 border-0">
                    <div class="card-body bg-light">
                        <div class="my-3">
                            <h2>SIGN IN</h2>
                        </div>
                        <div class="my-2">
                            @if ($message = Session::get("error"))
                                <div class="alert alert-danger alert-dismissible fade show rounded-0" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @elseif ($message = Session::get("success"))
                                <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="my-2">
                            <form action="{{route('signin.post')}}" method="POST">
                                @csrf()
                                <div class="my-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control rounded-0 shadow-none" placeholder="Username" value="{{old('username')}}">
                                    @error("username")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control rounded-0 shadow-none" placeholder="password">
                                    @error("password")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="my-3 d-grid">
                                    <button type="submit" class="btn btn-dark rounded-0 shadow-none text-white">Sign In</button>
                                </div>
                                <div class="my-2">
                                    No Account Yet? <a href="{{route('register.page')}}">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>