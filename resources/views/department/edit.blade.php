@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Department</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<style>
    body {
        font-family: 'Times New Roman', serif;
    }
    </style>
</head>
<style>
    
</style>
<body>
<div class="container">
<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="margin-top:100px">
        <h4>Edit Department</h4>
        <a class="btn btn-success" href="{{ route('department.index') }}" enctype="multipart/form-data"> Back</a>
        @if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('department.update', $department->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="form-group">
    <strong>Department:</strong>
    <input type="text" name="name" value="{{ $department->name }}" class="form-control" placeholder="Department">
    @error('name')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
    </div>
    <button type="submit" class="btn btn-success">Update</button>

    </div>
    <div class="col-md-4">

    </div>
</form>
{{-- <div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Department</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('department.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('department.update', $department->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Job Title:</strong>
<input type="text" name="name" value="{{ $department->name }}" class="form-control" placeholder="Department">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Update</button>
</div>
</form> --}}
</div>
</div>
</body>
</html>
@endsection





{{-- @extends('layouts.base')
@extends('department.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div>
                <div style="font-weight:bold">Update department</div>
                <br>
                <div>
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('department.update', $department->id) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <!-- <label for="name" class="col-md-4 control-label">Department Name</label> -->

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department"
                                    value="{{ $department->department }}" required autofocus>

                                @if ($errors->has('department'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>

    </div>
</div>
</div>
@endsection --}}