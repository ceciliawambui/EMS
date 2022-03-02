 @extends('layouts.base')
 @extends('jobtitles.base')
 @section('content')

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <title>Employees</title>
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
                 <main>
                     <div class="container-fluid">
                         <div class="row">
                             <div class="col-lg-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <li class="breadcrumb-item active" aria-current="page">Employees</li>
                                    </ol>
                                  </nav>
                                 <div class="grid grid-cols-4 gap-4">
                                     <div><a class="btn btn-success btn-sm" href="{{ route('employees.create') }}"> Create
                                             Employee</a></div>
                                     <div></div>
                                     <div></div>
                                     <div>
                                         <form name="viewTrashed" class="d-flex">
                                             <select name="trashed" id="trashed" class="form-control mr-2">
                                                 <option value="">View Employees</option>
                                                 <option value="1">View Trashed</option>
                                             </select>

                                             <button type="button" id="filterTrashed"
                                                 class="btn btn-sm btn-success  btn-sm">Filter</button>
                                         </form>
                                     </div>

                                 </div>
                             </div>
                         </div>
                         @if ($message = Session::get('success'))
                             <div class="alert alert-success">
                                 <p>{{ $message }}</p>
                             </div>
                         @endif

                         <table class="table table-bordered " id="datatable-crud" style="width: 100%">
                             <thead>
                                 <tr>
                                     <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Email</th>
                                     <th>Job Title</th>
                                     <th>Department</th>
                                     <th>Salary</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                         </table>

                     </div>
                 </main>
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
                         url: "{{ url('employees') }}",
                         data: function(filter) {
                             filter.trashed = $('#trashed').val()
                         }
                     },
                     columns: [{
                             data: 'first_name',
                             name: 'first_name'
                         },
                         {
                             data: 'last_name',
                             name: 'last_name'
                         },
                         {
                             data: 'email',
                             name: 'email'
                         },
                         {
                             data: 'job_title',
                             name: 'job_title_id'
                         },
                         {
                             data: 'department',
                             name: 'department_id'
                         },
                         {
                             data: 'salary',
                             name: 'salary'
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

                 $('#filterTrashed').click(function() {
                     $('#datatable-crud').DataTable().draw(true)
                 })

                 $('body').on('click', '.delete', function() {
                     if (confirm("Delete Record?") == true) {
                         var id = $(this).data('id');
                         // ajax
                         $.ajax({
                             type: "POST",
                             url: "{{ url('delete-employee') }}",
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
             });
         </script>

     </html>
     </main>


     </body>

     </html>
 @endsection








 {{-- @extends('layouts.base')
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
                                @foreach ($employees as $employee)
                                <tr role="row" class="odd">
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->job_title_id }}</td>
                                    <td>{{ $employee->department_id }}</td>
                                    <td>{{ $employee->salary }}</td>
                                    <td>
                                        <form class="row" method="POST"
                                            action="{{ route('employees.destroy',  $employee->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?')">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="float-right">
                                                <a href="{{ route('employees.edit', $employee->id) }}"
                                                    class="btn btn-warning col-sm-5 col-xs-5 mr-3 btn-margin">
                                                    Update
                                                </a>
                                                <button type="submit"
                                                    class="btn btn-danger col-sm-5 col-xs-5 btn-margin">
                                                    Trash
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
                                    {{count($employees)}} of {{count($employees)}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    {{ $employees->links() }}
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
@endsection --}}
