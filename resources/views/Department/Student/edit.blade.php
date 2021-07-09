@extends('layouts.master')

@section('title' , 'Student Edit')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Student Edit</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('d-admin.student.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.student.update',$student->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <input type="hidden" value="{{ auth('dept_admin')->id() }}" name="admin_id"> --}}

                    <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $student->name }}">
                        @error('name')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="{{ $student->email }}">
                        @error('email')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Registration ID : </label>
                        <input type="text" class="form-control" name="registration" placeholder="Registration ID" value="{{ $student->registration }}">
                        @error('registration')<span class="text-danger">{{ $message }}</span >@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone : </label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $student->phone }}">
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


