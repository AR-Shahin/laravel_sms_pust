@extends('layouts.master')

@section('title' , 'Department Admin')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Department Admin</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('admin.dept-admin.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.dept-admin.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ auth('admin')->id() }}" name="admin_id">
                    <div class="form-group">
                        <label for="">Department Name : </label>
                        <select name="department_id" id="" class="form-control">
                            <option value="">Select A Department</option>
                            @forelse ($departments as $department )
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @empty
                            <option value="">Empty</option>
                            @endforelse
                        </select>
                        @error('department_id')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                        @error('phone')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password : </label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        @error('password')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Submit" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


