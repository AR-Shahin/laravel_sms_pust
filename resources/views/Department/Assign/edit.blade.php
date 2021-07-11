@extends('layouts.master')

@section('title' , 'Assign Course Edit')
@section('master_content')

<div class="row no-gutters justify-content-center">
    <div class="col-12 col-md-8 mt-5">

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Assign Course Edit</h4>
                </div>
                <div class="text-right pull-right">
                    <a href="{{ route('d-admin.assign-course.index') }}" class="btn btn-sm btn-success">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('d-admin.assign-course.update',$course->id) }}" method="post">
                    @csrf

                   <div class="row">
                       <div class="col-6">
                            <div class="form-group">
                                <label for="">Session : </label>
                                <select name="session_id" id="" class="form-control">
                                    <option value="">Select A Session</option>
                                    @foreach ($sessions as $session)
                                        <option value="{{ $session->id }}" @if ($course->session_id === $session->id)
                                            selected
                                        @endif>{{ $session->name }}</option>
                                    @endforeach
                                </select>
                                @error('session_id')<span class="text-danger">{{ $message }}</span >@enderror
                            </div>
                       </div>
                       <div class="col-6">
                        <div class="form-group">
                            <label for="">Semester : </label>
                            <select name="semester_id" id="" class="form-control">
                                <option value="">Select A Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}"  @if ($course->semester_id === $semester->id)
                                        selected
                                    @endif>{{ $semester->name }}</option>
                                @endforeach
                            </select>
                            @error('semester_id')<span class="text-danger">{{ $message }}</span >@enderror
                        </div>
                   </div>
                       <div class="col-6">
                        <div class="form-group">
                            <label for="">Teacher : </label>
                            <select name="teacher_id" id="" class="form-control">
                                <option value="">Select A Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"  @if ($course->teacher_id === $teacher->id)
                                        selected
                                    @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')<span class="text-danger">{{ $message }}</span >@enderror
                        </div>
                   </div>

               <div class="col-6">
                <div class="form-group">
                    <label for="">Course : </label>
                    <select name="course_id" id="" class="form-control">
                        <option value="">Select A Course</option>
                        @foreach ($courses as $c)
                            <option value="{{ $c->id }}"  @if ($course->course_id === $c->id)
                                selected
                            @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')<span class="text-danger">{{ $message }}</span >@enderror
                </div>
           </div>
                   </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-success" value="Assign Course" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


