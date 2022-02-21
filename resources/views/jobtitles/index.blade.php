@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <br>
            <br>
            <br>
           
            <div class="row justify-center">
                <div class="col-sm-4">

                </div>
               

                <div class="col-sm-3">
                    <h3 class="box-title">List of Job Titles</h3>

<br>
<br>
                </div>
                <div class="col-sm-5">
                    <a class="btn btn-primary" href="{{ route('jobtitles.create') }}">Add new JobTitle</a>
                </div>
                <br>
                <br>

            </div>
        </div>

        <div>
            <div class="container">
                <div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th width="40%">Job Title
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $jobtitles)
                                    <tr role="row" class="odd">
                                        <td>{{ $jobtitles->jobtitle }}</td>
                                        <td>
                                            <form class="row" method="POST"
                                                action="{{ route('jobtitles.destroy', $jobtitles->id) }}"
                                                onsubmit="return confirm('Are you sure?')">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="float-right">
                                                    <a href="{{ route('jobtitles.edit', $jobtitles->id) }}"
                                                        class="btn btn-warning col-sm-4 col-xs-5 mr-5 btn-margin">
                                                        Update
                                                    </a>
                                                    <button type="submit"
                                                        class="btn btn-danger col-sm-4 col-xs-5 btn-margin">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th width="20%" rowspan="1" colspan="1">Job Title </th>
                                        <th rowspan="1" colspan="2">Action</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        Showing
                                        1
                                        to
                                        {{count($jobs)}} of {{count($jobs)}} entries</div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        {{ $jobs->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->
</div>
@endsection