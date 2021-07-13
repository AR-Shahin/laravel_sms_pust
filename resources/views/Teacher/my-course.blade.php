@extends('layouts.master')

@section('title' , 'My Courses')
@section('master_content')

<div class="row no-gutters">
    <div class="col-12 col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4 class="text-info">My Assigned Courses</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Sesssion</th>
                            <th>Semester</th>
                        </tr>
                        </thead>
                        <tbody id="currencyTable">
                            @forelse ($courses  as $c)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $c->course->name }}</td>
                                <td>{{ $c->session->name }}</td>
                                <td>{{ $c->semester->name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Empty!!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
