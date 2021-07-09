<?php

namespace App\Http\Controllers\DAdmin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::where('department_id', auth('dept_admin')->user()->department_id)->with('department', 'admin')->latest()->get();
        return view('Department.Student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Department.Student.create');
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
            'name' => 'required',
            'registration' => ['numeric', 'unique:students,registration'],
            'email' => 'required|unique:students,email',
            'password' => 'required',
            'phone' => 'required',
        ]);
        Student::create($request->all());
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
    public function edit(Student $student)
    {
        return view('Department.Student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $Student)
    {
        $request->validate([
            'name' => 'required',
            'registration' => ['numeric', "unique:students,registration,{$Student->id}"],
            'email' => "required|unique:students,email,{$Student->id}",
            'phone' => 'required',
        ]);
        $Student->update($request->all());
        $this->setSuccessMessage('Data Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->delete()) {
            $this->setSuccessMessage('Data Delete Successfully!');
            return back();
        }
    }
}
