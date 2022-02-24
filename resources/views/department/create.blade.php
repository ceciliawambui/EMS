<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Department</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Department</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('department.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Department:</strong>
<input type="text" name="name" class="form-control" placeholder="Department ">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Create</button>
</div>
</form>
</body>
</html>



{{-- @extends('layouts.base')
@extends('department.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div></div>
            <div>

                <form class="form-horizontal" role="form" method="POST" action="{{ route('department.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <br>
                        <br>
                        <br>
                        <label for="name" class="col-md-6 control-label" style="font-weight:bold">Add Department</label>
                        <br>

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
        <div class="col-md-2"></div>
    </div>
</div>
@endsection --}}