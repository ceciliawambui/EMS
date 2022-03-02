@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Add Job Title</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Times New Roman', serif;
            }

        </style>
    </head>

    <body>
        <div class="container" style="margin-top:100px">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h4>Add Job Title</h4>
                    <a class="btn btn-success btn-sm" href="{{ route('jobtitles.index') }}"> Back</a>
                    @if (session('status'))
                        <div class="alert alert-success mb-1 mt-1">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('jobtitles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <strong>Job Title:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Job Title ">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            <div>

                            </div>


                        </div>
                        <div class="col-md-4"></div>
                        <button type="submit" class="btn btn-success btn-sm">Create</button>
                        {{-- <div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Job Title</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('jobtitles.index') }}"> Back</a>
</div>
</div>
</div>
@if (session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('jobtitles.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Job Title:</strong>
<input type="text" name="name" class="form-control" placeholder="Job Title ">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Create</button>
</div>
</form> --}}
    </body>

    </html>
@endsection






{{-- @extends('layouts.base')
@extends('jobtitles.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div>
                <br>
                <br>
                <div style="font-weight:bold">Add new Job Title</div>
                <br>
                <div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('jobtitles.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Job Title </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div>

        </div>
    </div>
</div>
@endsection --}}
