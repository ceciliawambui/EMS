@extends('layouts.base')
@extends('department.base')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <br>
                    <br>

                    <h3 class="box-title">List of departments</h3>
                </div>
                <div class="col-sm-4">
                    <br>
                    <br>
                    <a class="btn btn-primary" href="{{ route('department.create') }}">Add new department</a>
                </div>
            </div>
            <br>
            <br>
        </div>

        <div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th width="40%">
                                        Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($departments as $department)
                                <tr role="row" class="odd">
                                    <td>{{ $department->department }}</td>
                                    <td>
                                        <form class="row" method="POST"
                                            action="{{ route('department.destroy',  $department->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="float-right">
                                                <a href="{{ route('department.edit', $department->id) }}"
                                                    class="btn btn-warning col-sm-3 col-xs-5 mr-5 btn-margin">
                                                    Update
                                                </a>
                                                <button type="submit"
                                                    class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
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
                                    <th width="20%" rowspan="1" colspan="1">Department Name</th>
                                    <th rowspan="1" colspan="2">Action</th>
                                </tr>
                            </tfoot> -->
                        </table>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing
                                    1
                                    to
                                    {{count($departments)}} of {{count($departments)}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    {{ $departments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-3"></div>

        </div>
    </div>
    </div>
</section>

</div>
@endsection