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
                font-family: 'Times New Roman',serif  !important;
            }
        </style>

    </head>

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                {{-- <main class="login-form"> --}}
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header" style="text-align: center;font-size:30px;font-family:'Times New Roman', Times, serif">User Profile</div>
                                    <div class="card-body">
                                        <form action="" method="POST" >
                                            @csrf
                                            <div class="form-group row justify-content-center" >

                                                <div class="col-md-6 justify-content-center">
                                                    {{-- src="{{ asset('storage/'.$post->image) }}" --}}
                                                    {{-- <p>{{ Auth::user()->image}}</p> --}}
                                                    <img src="{{asset ('storage/images/'.Auth::user()->image)}}" style="border-radius: 100%;width: 150px; height: 150px;" alt="Profile Photo">

                                                    @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                    <br>
                                                </div>

                                            </div>
                                            <div class="form-group row justify-content-center">

                                                <div class="col-md-7 justify-content-center">
                                                    Name: {{ Auth::user()->name }}
                                                    @if ($errors->has('name'))
                                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                                    @endif


                                                </div>


                                            </div>


                                            <div class="form-group row justify-content-center">
                                                {{-- <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail --}}
                                                    {{-- Address</label> --}}
                                                <div class="col-md-7 justify-content-center" >
                                                    Email: {{ Auth::user()->email }}
                                                    {{-- <input type="text" id="email_address" class="form-control" name="email" required value="{{ Auth::user()->email }}" --}}
                                                        {{-- autofocus> --}}
                                                    @if ($errors->has('email'))
                                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                    <br>
                                                    <br>
                                                </div>

                                            </div>
                                            <div class="form-group row justify-content-center">
                                                <div class="col-md-6">
                                                    <a type="button" class="btn btn-warning btn-sm"style="color:black; font-family:'Times New Roman', Times, serif" href="{{route('login')}}">Switch User</a>
                                                    <a href="{{route('edit')}}"type="button"class="btn btn-primary btn-sm"style="text-decoration:none;color:black;font-family:'Times New Roman', Times, serif">Edit Profile </a>

                                                </div>
                                            </div>



                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </main> --}}


            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    </body>

    </html>
@endsection
