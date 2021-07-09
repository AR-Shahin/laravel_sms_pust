<?php

namespace App\Http\Controllers\Admin;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class GlobalController extends Controller
{
    public function teachers()
    {
        $teachers = Teacher::with('department', 'admin')->latest()->get();
        return view('Admin.Global.teacher', compact('teachers'));
    }

    public function students()
    {
        $students = Student::with('department', 'admin')->latest()->get();
        return view('Admin.Global.student', compact('students'));
    }
}
