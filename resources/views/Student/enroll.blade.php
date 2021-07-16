@extends('layouts.master')

@section('title' , 'Student Enroll Course')
@section('master_content')
@if (!checkCourseEnrollOpenOrNot())
<div class="card">
    <div class="card-body text-center">
        <h4 class="text-warning">Course Enroll hasn't Start Yet!!</h4>
    </div>
</div>
@else
<div class="card">
    <div class="card-header">
        <h3>Enroll Course</h3>
    </div>
    <div class="card-body">
        <table class="table table-borderd">
            <tr>
                <th>SL</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Teacher</th>
                <th>Actions</th>
            </tr>
            <tbody>
                @foreach ($courses as $c)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->session->name ?? '' }}</td>
                    <td>{{ $c->semester->name ?? ''}}</td>
                    <td>{{ $c->course->name ?? ''}}</td>
                    <td>{{ $c->teacher->name ?? ''}}</td>
                    <td>
                        @if(!checkExistsEnrolledCourse($c->teacher->id,$c->course->id,$c->semester->id,$c->session->id))
                        <form action="{{ route('student.take-teacher',$c->id) }}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-success"><i class="fa fa-user"></i> Take Teacher</button>
                        </form>
                        @else
                        <form action="{{ route('student.remove-teacher',$c->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fa fa-user"></i> Remove Teacher</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@stop
