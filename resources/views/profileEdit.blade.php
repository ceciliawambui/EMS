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
    <title>Edit Profile</title>
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
                                <div class="card-header" style="text-align: center;font-size:40px">Edit User Profile</div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('update') }}" >
                                        @csrf

                                        {{-- <div class="form-group row">
                                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                            <div class="col-md-6">
                                                {{-- <img src=" {{ Auth::user()->image }}"class="rounded-full max-w-full h-auto align-middle border-none" alt="Profile Photo"> --}}
                                              {{--   <input type="file" id="image" class="form-control" name="image" value="{{ Auth::user()->image }}" required>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="name" class="form-control" name="name" value=" {{ Auth::user()->name }}"  required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail
                                                </label>
                                            <div class="col-md-6">
                                                <input type="text" id="email_address" class="form-control" name="email" value=" {{ Auth::user()->email }}"required
                                                    autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <a href="{{route('change.password')}}"type="button" class="btn btn-primary">
                                                Change Password
                                            </a>

                                        </div>
                                       </div>

                                        {{-- <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="password" class="form-control" name="password" value=" {{ Auth::user()->password }}"
                                                    required>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div> --}}

                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success btn-outline">
                                                Update Profile
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
@endsection
