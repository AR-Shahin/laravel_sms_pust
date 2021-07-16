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
                <th>Teacher </th>
                <td>Marks</td>
            </tr>
            <tbody>
                @forelse ($courses as $c)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $c->session->name }}</td>
                    <td>{{ $c->semester->name }}</td>
                    <td>{{ $c->course->name }}</td>
                    <td>{{ $c->teacher->name }}</td>
                    <td>
                    @if ($c->marks === 0)
                        <span class="text-danger">Marks Not Assign Yet!</span>
                        @else
                        {{ $c->marks }}
                    @endif

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">
                        <span class="text-danger">Marks isn't assign yet!!</span>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>

@stop
