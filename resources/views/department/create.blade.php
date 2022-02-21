@extends('layouts.base')
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
                    <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                        <br>
                        <br>
                        <br>
                        <label for="name" class="col-md-6 control-label" style="font-weight:bold">Add Department</label>
                        <br>

                        <div class="col-md-6">
                            <input id="department" type="text" class="form-control" name="department"
                                value="{{ old('department') }}" required autofocus>

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
@endsection