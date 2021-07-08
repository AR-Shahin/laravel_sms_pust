@extends('layouts.master')

@section('title' , 'Department Admin')
@section('master_content')

<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Department Admin</h4>
                </div>
                <div class="text-right">
                    <a href="{{ route('admin.dept-admin.create') }}" class="btn btn-sm btn-success">Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


