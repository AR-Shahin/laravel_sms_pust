<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('Admin.department');
    }
    function departmentFetch()
    {
        return Department::latest()->get();
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        Department::create($request->all());
    }

    public function destroy(Department $department)
    {
        $department->delete();
    }
    public function show(Department $department)
    {
        return $department;
    }
    public function update(Request $request, Department $department)
    {
        $department->update($request->all());
    }
}
