@extends('layouts.base')
@extends('jobtitles.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-6">
            <div>
                <div style="font-weight:bold">Update Job Title</div>
                <br>
                <div>
                    <form class="form-horizontal" role="form" method="POST"
                        action="{{ route('jobtitles.update', $jobtitles->id) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('jobtitle') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Job Title</label>

                            <div class="col-md-6">
                                <input id="jobtitle" type="text" class="form-control" name="jobtitle"
                                    value="{{ $jobtitles->jobtitle }}" required autofocus>

                                @if ($errors->has('jobtitle'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jobtitle') }}</strong>
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
@endsection