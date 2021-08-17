<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\DepartmentAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = DepartmentAdmin::with('department')->latest()->cursor();
        return view('Admin.DAdmin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('Admin.DAdmin.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'department_id' => ['required'],
            'name' => 'required',
            'email' => 'required|unique:department_admins,email',
            'password' => 'required',
            'phone' => 'required',
        ]);
        DepartmentAdmin::create($request->all());
        $this->setSuccessMessage();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentAdmin $dept_admin)
    {
        $departments = Department::all();
        $admin = $dept_admin;
        return view('Admin.DAdmin.edit', compact('departments', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepartmentAdmin $dept_admin)
    {
        $request->validate([
            'department_id' => ['required'],
            'name' => 'required',
            'email' => "required|unique:department_admins,email,{$request->dept_admin->id}",
            'phone' => 'required',
        ]);
        $dept_admin->update($request->all());
        $this->setSuccessMessage('Data Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentAdmin $dept_admin)
    {
        if ($dept_admin->delete()) {
            $this->setSuccessMessage('Data Delete Successfully!');
            return back();
        }
    }
}
