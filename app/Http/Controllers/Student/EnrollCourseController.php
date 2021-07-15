<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class EnrollCourseController extends Controller
{
    function enrollCourse()
    {
        $courses = CourseTeacher::whereDepartmentId(auth('student')->user()->department_id)->get();
        return view('Student.enroll', compact('courses'));
    }

    public function takeTeacher(CourseTeacher $course)
    {
        return $course;
    }
    function myEnrolledCourses()
    {
    }
}
