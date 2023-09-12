<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Reset Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>
    <body class="loginback">
        <div class="container py-5 formbox w-50">
            <div class="row">
                <div class="col-12">
                    <img src="{{asset('assets/logo.png')}}" class="m-auto d-block" alt="logo">
                    <h2 class="text-center">Reset Password</h2>
                </div>
            </div>
            <form class="w-50 m-auto" method="POST" action="{{ route('auth.reset') }}">
                @csrf

                <div class="row">
                    <input type="password" name="old_password" value="{{ old('old_password') }}" class="form-control my-2 py-2 border border-dark" placeholder="Enter Old Password">
                </div>
                @error("old_password")
                <span style="color:red">{{$message}}</span>
                @enderror

                <div class="row">
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control my-2 py-2 border border-dark" placeholder="Enter New Password">
                </div>
                @error("password")
                <span style="color:red">{{$message}}</span>
                @enderror

                <div class="row">
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control my-2 py-2 border border-dark" placeholder="Confirm New Password">
                </div>
                @error("password_confirmation")
                <span style="color:red">{{$message}}</span>
                @enderror

                <button class="themecolor m-auto d-block px-5 py-2 border-0">Submit</button>
            </form>
            <p class="text-dark text-center my-3">Already Having Account?<a href="{{ route('auth.login.view') }}">Login</a></p>
        </div>


        @include('layout.script')
    </body>
</html>
