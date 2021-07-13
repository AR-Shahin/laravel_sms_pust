@extends('layouts.master')

@section('title' , 'Assign Course in Teacher')
@section('master_content')

<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">Assign Course in Teacher</h4>
                </div>
                <div class="text-right">
                    <a href="{{ route('d-admin.assign-course.create') }}" class="btn btn-sm btn-success">Add</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Session</th>
                            <th>Semester</th>
                            <th>Course</th>
                            <th>Teacher</th>
                            <th>Actions</>
                        </tr>
                        </thead>
                      <tbody>
                          @foreach ($courses as $course)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $course->session->name ?? '' }}</td>
                                <td>{{ $course->semester->name ?? '' }}</td>
                                <td>{{ $course->course->name ?? '' }}</td>
                                <td>{{ $course->teacher->name ?? '' }}</td>
                                <td>
                                    {{-- <a href="{{ route('d-admin.assign-course.edit',$course->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a> --}}
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                    <form
                                    action="{{ route('d-admin.assign-course.destroy',$course->id) }}"
                                    method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button data-toggle="tooltip" data-placement="top"
                                        title="Delete Bed"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="btn bg-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                          @endforeach

                        {{-- {{ $courses->links() }} --}}
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


