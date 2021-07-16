@extends('layouts.master')

@section('title' , 'Settings')
@section('master_content')
<div class="card">
    <div class="card-header">
        <h3>Settings</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Course Enroll</th>

            </tr>
            <tr>
                <td>
                    @if ($settings->is_enroll)
                    <form action="{{ route('admin.settings') }}" method="post">
                        @csrf
                        <input type="hidden" value="close" name="flag">
                        <button class="btn btn-danger">
                            <i class="fas fa-arrow-circle-down"></i> Close</button>
                    </form>

                    @else
                    <form action="{{ route('admin.settings') }}" method="post">
                       @csrf
                        <input type="hidden" value="open" name="flag">
                        <button class="btn btn-success">
                            <i class="fas fa-arrow-circle-up"></i> Open
                         </button>
                    </form>

                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>

@stop
