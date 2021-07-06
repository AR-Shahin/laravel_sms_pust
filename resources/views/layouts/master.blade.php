@extends('layouts.app')

@section('app_content')

@include('Admin.inc.navbar')
  <!-- Main Sidebar Container -->
@include('Admin.inc.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content m-3">

      <!-- Default box -->
      @yield('master_content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('Admin.inc.footer')
@stop
