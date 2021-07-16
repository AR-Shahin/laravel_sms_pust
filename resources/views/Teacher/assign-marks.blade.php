@extends('layouts.master')

@section('title' , 'Student Enroll Course')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Assign Mark on <b>{{ $course->course->name }}</b></h3>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.store.assign.marks',$course->id) }}" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="">Session : </label>
                        <input type="text" class="form-control" readonly value="{{ $course->session->name }}">
                    </div>
                    <div class="col-6">
                        <label for="">Semester : </label>
                        <input type="text" class="form-control" readonly value="{{ $course->semester->name }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
               <div class="row">
                   <div class="col-6">
                        <label for="">Student Name: </label>
                        <input type="text" class="form-control" readonly value="{{ $course->student->name }}">
                   </div>
                   <div class="col-6">
                    <label for="">Student ID: </label>
                    <input type="text" class="form-control" readonly value="{{ $course->student->registration }}">
               </div>
               </div>
            </div>

            <div class="form-group">
                <label for="">Mark: </label>
                <input type="text" class="form-control" name="marks" placeholder="Enter marks of this course">
                <span class="text-danger">{{($errors->has('marks'))? ($errors->first('marks')) : ''}}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block">Assign Mark</button>
            </div>
        </form>
    </div>
</div>

@stop
