@extends('jobtitles.base')
@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>JOB TITLES</title>
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

    <body class="sb-nav-fixed">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                @yield('content')
                <main>
                    <div class="container-xxl">
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item active" aria-current="page">Job Titles</li>
                                        </ol>
                                    </nav>
                                </div>

                                <div class="grid grid-cols-4 gap-4">
                                    <div>
                                        <a class="btn btn-success btn-sm" href="{{ route('jobtitles.create') }}"> Create
                                            Job
                                            Title</a>
                                    </div>

                                    <div></div>
                                    <div></div>
                                    <div>
                                        <form name="viewTrashed" class="d-flex">
                                            <select name="trashed" id="trashed" class="form-control mr-2">
                                                <option value="">View Job Titles</option>
                                                <option value="1">View Trashed</option>
                                            </select>

                                            <button type="button" id="filterTrashed"
                                                class="btn btn-sm btn-success btn-sm">Filter</button>
                                        </form>

                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                                </div>

                                <table class="table table-bordered" id="datatable-crud" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>


                            </div>
                        </div>
                    </div>
            </div>

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
                        responsive: true,
                        ajax: {
                            url: "{{ url('jobtitles') }}",
                            data: function(value) {
                                value.trashed = $("#trashed").val()
                            }
                        },
                        columns: [


                            {
                                data: 'name',
                                name: 'name',
                                padding: '2px'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                padding: '2px'
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
                                url: "{{ url('delete-jobtitle') }}",
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
                    $('#filterTrashed').click(function() {
                        $('#datatable-crud').DataTable().draw(true)
                    })
                });
            </script>

    </html>

    </main>

    </body>

    </html>
@endsection





{{-- @extends('layouts.base')
@extends('jobtitles.base')
@section('content') --}}
{{-- <!-- Main content -->
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
                                        <td>{{ $jobtitles->name }}</td>
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
</section> --}}
<!-- /.content -->
{{-- </div>
@endsection --}}
