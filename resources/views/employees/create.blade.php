<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Employee</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Employee</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="firstname" class="col-md-4 control-label">First Name</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control" name="first_name"
                value="{{ old('first_name') }}" required autofocus>

            @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="col-md-4 control-label">Last Name</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control" name="last_name"
                value="{{ old('last_name') }}" required autofocus>

            @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                required autofocus>

            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <!-- selection of department -->
    <div class="form-group">
            <label class="col-md-4 control-label">Department</label>
            <div class="col-md-6">
                <select class="form-control" name="department_id">
                    <option value="">Please select your department</option>
                    @foreach ($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('department_id'))
            <span class="help-block">
                <strong>{{ $errors->first('department_id') }}</strong>
            </span>
            @endif
            </div>
        </div>

    <!-- selection for the job titles -->
    <div class="form-group">
        <label class="col-md-4 control-label">Job Title</label>
        <div class="col-md-6">
            <select class="form-control" name="job_title_id">
                <option vale="">Please select your job title</option>
                @foreach ($jobtitles as $jobtitle)
                <option value="{{$jobtitle->id}}">{{$jobtitle->name}}</option>
                @endforeach
            </select>
            
            @if ($errors->has('job_title_id'))
            <span class="help-block">
                <strong>{{ $errors->first('job_title_id') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
        <label for="salary" class="col-md-4 control-label">Salary</label>

        <div class="col-md-6">
            <input id="salary" type="text" class="form-control" name="salary"
                value="{{ old('salary') }}" required autofocus>

            @if ($errors->has('salary'))
            <span class="help-block">
                <strong>{{ $errors->first('salary') }}</strong>
            </span>
            @endif
        </div>




{{-- <div class="form-group">
<strong>Job Title:</strong>
<input type="text" name="name" class="form-control" placeholder="Job Title ">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror --}}
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Create</button>
</div>
</form>
</body>
</html>









{{-- @extends('layouts.base')
@extends('employees.base')

@section('content')
<div class="container">
    <div class="row">
        <br>
        <br>
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <br>
                        <br>
                        <br>
            <div style="font-weight:bold">Add new employee</div>
            <br>
            <div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('employees.store') }}" action="{{url('sendemail/send')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="firstname" class="col-md-4 control-label">First Name</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control" name="first_name"
                                value="{{ old('first_name') }}" required autofocus>

                            @if ($errors->has('first_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name" class="col-md-4 control-label">Last Name</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="last_name"
                                value="{{ old('last_name') }}" required autofocus>

                            @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                required autofocus>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <!-- selection of department -->
                    <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                            <div class="col-md-6">
                                <select class="form-control" name="department_id">
                                    <option value="">Please select your department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                            @endif
                            </div>
                        </div>

                    <!-- selection for the job titles -->
                    <div class="form-group">
                        <label class="col-md-4 control-label">Job Title</label>
                        <div class="col-md-6">
                            <select class="form-control" name="job_title_id">
                                <option vale="">Please select your job title</option>
                                @foreach ($jobtitles as $jobtitle)
                                <option value="{{$jobtitle->id}}">{{$jobtitle->name}}</option>
                                @endforeach
                            </select>
                            
                            @if ($errors->has('job_title_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('job_title_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <!-- <div class="form-group{{ $errors->has('job_title_id') ? ' has-error' : '' }}">
                        <label for="job_title_id" class="col-md-4 control-label">Job Title</label>

                        <div class="col-md-6">
                            <input id="job_title_id" type="text" class="form-control" name="job_title_id"
                                value="{{ old('job_title_id') }}" required autofocus>

                            @if ($errors->has('job_title_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('job_title_id') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>




                    <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                        <label for="department_id" class="col-md-4 control-label">Department</label>

                        <div class="col-md-6">
                            <input id="department_id" type="text" class="form-control" name="department_id"
                                value="{{ old('department_id') }}" required autofocus>

                            @if ($errors->has('department_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('department_id') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div> -->


                    <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                        <label for="salary" class="col-md-4 control-label">Salary</label>

                        <div class="col-md-6">
                            <input id="salary" type="text" class="form-control" name="salary"
                                value="{{ old('salary') }}" required autofocus>

                            @if ($errors->has('salary'))
                            <span class="help-block">
                                <strong>{{ $errors->first('salary') }}</strong>
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


</div>
</div>
</div>
@endsection --}}