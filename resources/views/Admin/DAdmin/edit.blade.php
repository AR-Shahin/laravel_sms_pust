@extends('layouts.master')

@section('title' , 'Department Admin Edit')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Department Admin Edit</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('admin.dept-admin.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dept-admin.update',$admin->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ auth('admin')->id() }}" name="admin_id">
                    <div class="form-group">
                        <label for="">Department Name : </label>
                        <select name="department_id" id="" class="form-control">
                            <option value="">Select A Department</option>
                            @forelse ($departments as $department )
                            <option value="{{ $department->id }}" @if ($department->id === $admin->department_id)
                                selected
                            @endif>{{ $department->name }}</option>
                            @empty
                            <option value="">Empty</option>
                            @endforelse
                        </select>
                        @error('department_id')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $admin->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $admin->email }}">
                        @error('email')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $admin->phone }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Update" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


