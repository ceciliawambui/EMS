@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Company</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container" style="margin-top: 40px">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
        <h4>Edit Company</h4>
        {{-- <a class="btn btn-primary" href="{{ route('employees.index') }}" enctype="multipart/form-data"> Back</a> --}}
        @if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Company Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name"
                value="{{ $company->name }}" required autofocus>

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone" class="col-md-4 control-label">Phone</label>
        <div class="col-md-6">
            <input id="phone" type="text" class="form-control" name="phone"
                value="{{ $company->phone }}" required autofocus>

            @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Email</label>
        <div class="col-md-6">
            <input id="email" type="text" class="form-control" name="email"
                value="{{ $company->email }}" required autofocus>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <label for="address" class="col-md-4 control-label">Address</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control" name="address"  value="{{ $company->address }}"
                required autofocus>

            @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
        <label for="location" class="col-md-4 control-label">Location</label>

        <div class="col-md-6">
            <input id="location" type="text" class="form-control" name="location"  value="{{ $company->location }}"
                required autofocus>

            @if ($errors->has('location'))
            <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('contact_person') ? ' has-error' : '' }}">
        <label for="contact_person" class="col-md-4 control-label">Contact Person</label>

        <div class="col-md-6">
            <input id="contact_person" type="text" class="form-control" name="contact_person"  value="{{ $company->contact_person }}"
                required autofocus>

            @if ($errors->has('contact_person'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_person') }}</strong>
            </span>
            @endif
        </div>
    </div>
    {{-- <div class="form-group{{ $errors->has('company_user_id') ? ' has-error' : '' }}">
        <label for="company_user_id" class="col-md-4 control-label">Company User</label>

        <div class="col-md-6">
            <input id="company_user_id" type="text" class="form-control" name="company_user_id"  value="{{ $company->company_user_id }}"
                required autofocus>

            @if ($errors->has('company_user_id'))
            <span class="help-block">
                <strong>{{ $errors->first('company_user_id') }}</strong>
            </span>
            @endif
        </div>
    </div> --}}

    <!-- selection of department -->
    <div class="form-group{{ $errors->has('company_user_id') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Company User</label>
        <div class="col-md-6">
            <select class="form-control" name="company_user_id">
                <option  value="">Please select the company user</option>
                @foreach ($companyusers as $companyUser)
                <option value="{{$companyUser->id}}" {{$companyUser->id == $company->company_user_id ? "selected": ""}}>{{$companyUser->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('company_user_id'))
        <span class="help-block">
            <strong>{{ $errors->first('company_user_id') }}</strong>
        </span>
        @endif
        </div>
    </div>


        <button type="submit" class="btn btn-success ml-3 btn-sm">Update</button>
    </div>

    <div class="col-md-2"></div>

</div>
</div>

</div>
</form>
</div>
</body>
</html>
@endsection



