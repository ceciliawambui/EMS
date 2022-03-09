@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Profile</title>
        <style>
            body{
                font-family: 'Times New Roman', Times, serif;
            }
        </style>

    </head>

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main class="login-form">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="text-align: center;font-size:40px">User Profile</div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="form-group row justify-content-left" >
                                                {{-- <label for="image" class="col-md-4 col-form-label text-md-right">Profile Photo</label> --}}

                                                <div class="col-md-6 justify-content-left">
                                                    <img src=" {{ Auth::user()->image }}"class="rounded-full max-w-full h-auto align-middle border-none" alt="Profile Photo">
                                                    {{-- <input type="text" id="image" class="form-control" name="image" value=" " required> --}}
                                                    {{-- <img src="/image/{{ $users->image }}" width="300px"> --}}
                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                    <br>
                                                </div>
                                                <div class="col-md-6 mt-5">
                                                    <a href="{{route('change.password')}}"type="button" class="btn btn-primary btn-sm">
                                                        Change Photo
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="form-group row justify-content-left">
                                                {{-- <label for="name" class="col-md-4 col-form-label text-md-right">Name</label> --}}
                                                <div class="col-md-7 justify-content-left">
                                                    Name: {{ Auth::user()->name }}

                                                    {{-- <input type="text" id="name" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus> --}}
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif


                                                </div>
                                                {{-- <div class="col-md-5">
                                                    <a href="{{route('change.password')}}"type="button" class="btn btn-primary btn-sm">
                                                        Change Name
                                                    </a>
                                                </div> --}}

                                            </div>


                                            <div class="form-group row justify-content-left">
                                                {{-- <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail --}}
                                                    {{-- Address</label> --}}
                                                <div class="col-md-7 justify-content-left" >
                                                    Email: {{ Auth::user()->email }}
                                                    {{-- <input type="text" id="email_address" class="form-control" name="email" required value="{{ Auth::user()->email }}" --}}
                                                        {{-- autofocus> --}}
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                    <br>
                                                    <br>
                                                </div>

                                                    {{-- <div class="col-md-5">
                                                        <a href="{{route('change.password')}}"type="button" class="btn btn-primary btn-sm">
                                                            Change Email
                                                        </a>
                                                    </div> --}}

                                            </div>
                                            {{-- <div class="form-group row justify-content-left">
                                                <div class="col-md-7 justify-content-left" >
                                                    Password:
                                                </div>
                                                    <div class="col-md-5">
                                                        <a href="{{route('change.password')}}"type="button" class="btn btn-primary btn-sm">
                                                            Change Password
                                                        </a>
                                                    </div>

                                            </div> --}}
                                            <div class="form-group justify-content-center">
                                                <div class="col-md-6">
                                                    <a type="button" class="btn btn-warning btn-sm"style="color:black" href="{{route('login')}}">Switch User</a>
                                                    <a href="{{route('edit')}}"type="button"class="btn btn-primary btn-sm"style="text-decoration:none;color:black">Edit Profile </a>

                                                </div>
                                            </div>

                                            {{-- <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                                <div class="col-md-6">
                                                    {{ Auth::user()->password }}
                                                    {{-- <input type="password" id="password" class="form-control" name="password" value="{{ Auth::user()->password }}" --}}
                                                        {{-- required>
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div> --}}


                                            {{-- <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember"> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="card-body">
                                                <form action="{{route('home')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" name="image">
                                                    <input type="submit" value="Upload">
                                                </form>

                                            </div> --}}

                                            {{-- <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-outline">
                                                    Update Profile
                                                </button>
                                            </div> --}}
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>


            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </body>

    </html>
@endsection
