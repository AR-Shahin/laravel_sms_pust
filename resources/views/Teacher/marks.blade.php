@extends('layouts.master')

@section('title' , 'Marks')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Marks in my Courses</h3>
    </div>
    <div class="card-body">
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Student</th>
                <td>Actions</td>
            </tr>
            <tbody>
                @forelse ($courses as $c)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->session->name }}</td>
                    <td>{{ $c->semester->name }}</td>
                    <td>{{ $c->course->name }}</td>
                    <td>{{ $c->student->name }}</td>
                    <td>
                        @if (checkAssignMarksOfCourse($c->student_id,$c->course_id,$c->semester_id,$c->session_id))
                        <a href="{{ route('teacher.assign.marks.edit',$c->id) }}"" class="btn btn-primary btn-sm">Edit Marks</a>
                            @else
                            <a href="{{ route('teacher.assign.marks',$c->id) }}" class="btn btn-sm btn-info">Assign Marks</a>
                        @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <span class="text-danger">Students aren't Enrolled Your course yet!!</span>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@stop
