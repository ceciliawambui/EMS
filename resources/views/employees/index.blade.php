@extends('layouts.base')
@extends('employees.base')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-5">
                    <br>
                    <br>


                    <h3 class="box-title">List of Employees</h3>
                </div>
                <div class="col-sm-3">
                    <br>
                    <br>
                    <a class="btn btn-primary" href="{{ route('employees.create') }}">Add new employee</a>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <br>
                        <table class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th>
                                        First Name</th>
                                    <th>
                                        Last Name</th>
                                    <th>
                                        Email</th>
                                    <th>
                                        Job Title</th>
                                    <th>
                                        Department</th>
                                    <th>
                                        Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employee as $employees)
                                <tr role="row" class="odd">
                                    <td>{{ $employees->first_name }}</td>
                                    <td>{{ $employees->last_name }}</td>
                                    <td>{{ $employees->email }}</td>
                                    <td>{{ $employees->jobtitle }}</td>
                                    <td>{{ $employees->department }}</td>
                                    <td>{{ $employees->salary }}</td>
                                    <td>
                                        <form class="row" method="POST"
                                            action="{{ route('employees.destroy',  $employees->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="float-right">
                                                <a href="{{ route('employees.edit', $employees->id) }}"
                                                    class="btn btn-warning col-sm-5 col-xs-5 mr-3 btn-margin">
                                                    Update
                                                </a>
                                                <button type="submit"
                                                    class="btn btn-danger col-sm-5 col-xs-5 btn-margin">
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
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                    Showing 1 to
                                    {{count($employee)}} of {{count($employee)}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    {{ $employee->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-0"></div>

        </div>
        <!-- /.box-body -->
    </div>
    </div>
</section>
<!-- /.content -->
</div>
@endsection