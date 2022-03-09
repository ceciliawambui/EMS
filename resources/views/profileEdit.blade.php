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
            font-family: 'Times New Roman', Times, serif  !important;
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
                                <div class="card-header" style="text-align: center;font-size:40px;font-family:'Times New Roman', Times, serif">Edit User Profile</div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('update') }}" enctype="multipart/form-data" >
                                        @csrf
                                        <div class="form-group row">
                                            <label for="image" class="col-md-4 col-form-label text-md-right"style="font-family:'Times New Roman', Times, serif">Profile Picture<br>
                                                Current:</label>
                                            <div class="col-md-6">
                                                <br>
                                                <img src=" {{ Auth::user()->image }}" style="border-radius: 100%;width: 100px; height: 100px;" alt="Profile Photo">
                                                <br>
                                                <input type="file"  accept="image/*" id="image" class="form-control" name="image" value=""
                                                    autofocus>
                                                @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right"style="font-family:'Times New Roman', Times, serif">Name <span style="color: red">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="name" class="form-control" name="name" value=" {{ Auth::user()->name }}"  required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email_address" class="col-md-4 col-form-label text-md-right" style="font-family:'Times New Roman', Times, serif">E-Mail<span style="color: red">*</span>
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
                                            <label for="new_password" class="col-md-4 col-form-label text-md-right" style="font-family:'Times New Roman', Times, serif">New Password
                                                </label>
                                            <div class="col-md-6">
                                                <input type="password" id="new_password" class="form-control" name="new_password" value=""
                                                    autofocus>
                                                @if ($errors->has('new_password'))
                                                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirm_password" class="col-md-4 col-form-label text-md-right" style="font-family:'Times New Roman', Times, serif">Confirm Password
                                                </label>
                                            <div class="col-md-6">
                                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" value=""
                                                    autofocus>
                                                @if ($errors->has('confirm_password'))
                                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                                @endif
                                            </div>
                                        </div>

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
