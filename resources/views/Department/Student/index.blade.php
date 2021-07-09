@extends('layouts.master')

@section('title' , 'Student')
@section('master_content')

<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Student</h4>
                </div>
                <div class="text-right">
                    <a href="{{ route('d-admin.student.create') }}" class="btn btn-sm btn-success">Add</a>
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                            @forelse ($students  as $student)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->department->name ?? '' }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->status }}</td>
                                <td>{{ $student->image }}</td>
                                <td>
                                    <a href="{{ route('d-admin.student.edit',$student->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <form
                                    action="{{ route('d-admin.student.destroy',$student->id) }}"
                                    method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button data-toggle="tooltip" data-placement="top"
                                        title="Delete Bed"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="btn bg-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
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


