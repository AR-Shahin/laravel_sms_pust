@extends('layouts.master')

@section('title' , 'Student Enroll Course')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Enroll Course</h3> {{ auth('student')->user()->department->name }}
    </div>
    <div class="card-body">
        <table class="table table-borderd text-center table-striped">
            <tr>
                <th>SL</th>
                <th>Session</th>
                <th>Semester</th>
                <th>Course</th>
                <th>Teacher</th>
            </tr>
            <tbody>
                @forelse ($courses as $c)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->session->name }}</td>
                    <td>{{ $c->semester->name }}</td>
                    <td>{{ $c->course->name }}</td>
                    <td>{{ $c->teacher->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <span class="text-danger">You aren't Enrolled any course yet!!</span>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@stop
