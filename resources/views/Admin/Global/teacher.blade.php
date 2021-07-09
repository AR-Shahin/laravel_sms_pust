@extends('layouts.master')

@section('title' , 'Admin Dashboard Teacher')
@section('master_content')
<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">All Teacher</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                            @forelse ($teachers  as $teacher)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->department->name ?? '' }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->status }}</td>
                                <td>{{ $teacher->image }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    Empty!!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
