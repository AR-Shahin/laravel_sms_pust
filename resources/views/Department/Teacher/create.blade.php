@extends('layouts.master')

@section('title' , 'Teacher Create')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Teacher Create</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('d-admin.teacher.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.teacher.store') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ auth('dept_admin')->id() }}" name="admin_id">
                    <input type="hidden" value="{{ auth('dept_admin')->user()->department_id  }}" name="department_id">
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


