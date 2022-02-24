@extends('layouts.base')
@extends('jobtitles.base')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>JOB TITLES</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>



</head>
<body>
<div class="container" style="margin-top: 50px">
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h2 style="text-align: center">Job Titles</h2>
    </div>
    <div class="col-md-4"></div>

</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-6">
        <a class="btn btn-success" href="{{ route('jobtitles.create') }}"> Create Job Title</a>
    </div>
    <div class="col-md-2"></div>

</div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table table-bordered" id="datatable-crud">
                <thead>
                <tr>
                {{-- <th>Id</th> --}}
                <th>Job Title</th>
                {{-- <th>Email</th>
                <th>Address</th>
                <th>Created at</th> --}}
                <th>Action</th>
                </tr>
                </thead>
                </table>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
</div>
</body>
<script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#datatable-crud').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('jobtitles') }}",
columns: [
// { data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
// { data: 'email', name: 'email' },
// { data: 'address', name: 'address' },
// { data: 'created_at', name: 'created_at' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
$('body').on('click', '.delete', function () {
if (confirm("Delete Record?") == true) {
var id = $(this).data('id');
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-jobtitle') }}",
data: { id: id},
dataType: 'json',
success: function(res){
var oTable = $('#datatable-crud').dataTable();
oTable.fnDraw(false);
}
});
}
});
});
</script>
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