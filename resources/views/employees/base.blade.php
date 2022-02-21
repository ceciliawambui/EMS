@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employees
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Employees</a></li>
        <li class="active">Employees</li>
      </ol>
    </section>
    @yield('content')
    <!-- /.content -->
  </div>
@endsection