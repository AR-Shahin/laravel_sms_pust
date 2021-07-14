<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class EnrollCourseController extends Controller
{
    function enrollCourse()
    {
        return  $teachers = CourseTeacher::whereDepartmentId(auth('student')->user()->department_id)->get();
        return view('Student.enroll');
    }
}
