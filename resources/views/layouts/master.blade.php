@extends('layouts.app')

@section('app_content')
  <!-- Nav -->
     @include('Admin.inc.navbar')


    @include('Admin.inc.sidebar')
    {{-- @if ( auth('admin')->user())
    @include('Admin.inc.navbar')
    <!-- Main Sidebar Container -->
    @include('Admin.inc.sidebar')
    @endif --}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content m-3">
        @if(session('message'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
           {{ session('message') }}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
        @endif
      <!-- Default box -->
      @yield('master_content')
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('Admin.inc.footer')
@stop
