@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Departments</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <style>
            body {
                font-family: 'Times New Roman', serif;
            }

        </style>


    </head>

    <body>
        <div class="container" style="margin-top: 50px">
            <div class="row">

                <h2 style="text-align: center">Departments</h2>
            </div>
            <div class="row">
                <div class="col-md-5 offset-md-2">
                    <a class="btn btn-success" href="{{ route('department.create') }}"> Create Department</a>
                </div>
                <div class="col-md-3 ">
                    <form name="viewTrashed" class="d-flex">
                        <select name="trashed" id="trashed"  class="form-control mr-2">
                            <option value="">View Departments</option>
                            <option value="1">View Trashed</option>
                        </select>

                        <button type="button" id="filterTrashed" class="btn btn-sm btn-success">Filter</button>
                    </form>
                </div>

            </div> 

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered" id="datatable-crud">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#datatable-crud').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('department') }}",
                    data: function(value){
                        value.trashed = $("#trashed").val()
                    }
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });

            $('body').on('click', '.delete', function() {
                if (confirm("Delete Record?") == true) {
                    var id = $(this).data('id');
                    // ajax
                    $.ajax({
                        type: "POST",
                        url: "{{ url('delete-department') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            var oTable = $('#datatable-crud').dataTable();
                            oTable.fnDraw(false);
                        }
                    });
                }
            });

            $('#filterTrashed').click(function(){
                $('#datatable-crud').DataTable().draw(true)
            })
        });
    </script>

    </html>
@endsection




{{-- @extends('layouts.base')
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
                                    <td>{{ $department->name }}</td>
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
@endsection --}}
