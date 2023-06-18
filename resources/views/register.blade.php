<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/sass/app.scss')
    <title>Register</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="vh-100 row justify-content-center align-items-center">
            <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9 col-10">
                <div class="card rounded-0 border-0">
                    <div class="card-body">
                        <div class="my-3">
                            <h2>REGISTER</h2>
                        </div>
                        <div class="my-2">
                            @if ($message = Session::get("success"))
                                <div class="alert alert-success alert-dismissible fade show rounded-0" role="alert">
                                    {{$message}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="my-2">
                            <form action="{{route('register.post')}}" method="POST">
                                @csrf()

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="firstname" class="form-label">Firstname</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control rounded-0 shadow-none" placeholder="Firstname" value="{{old('firstname')}}">
                                        @error('firstname')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="lastname" class="form-label">Lastname</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control rounded-0 shadow-none" placeholder="Lastname" value="{{old('lastname')}}">
                                        @error('lastname')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" id="address" name="address" class="form-control rounded-0 shadow-none" placeholder="Address" value="{{old('address')}}">
                                        @error('address')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="contact" class="form-label">Contact</label>
                                        <input type="text" id="contact" name="contact" class="form-control rounded-0 shadow-none" placeholder="Contact" value="{{old('contact')}}">
                                        @error('contact')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" name="username" class="form-control rounded-0 shadow-none" placeholder="Username" value="{{old('username')}}">
                                        @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" id="email" name="email" class="form-control rounded-0 shadow-none" placeholder="Email" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control rounded-0 shadow-none" placeholder="Password">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-xl-6 col-lg-6 col-md-6 col-12">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" id="confirm-password" name="confirm_password" class="form-control rounded-0 shadow-none" placeholder="Confirm Password">
                                        @error('confirm_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="my-3 d-grid">
                                        <button type="submit" class="btn btn-dark rounded-0 shadow-none text-white">Register</button>
                                    </div>
                                    <div class="my-2">
                                        Already a member? <a href="{{route('signin.page')}}">Sign In</a>
                                    </div>
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