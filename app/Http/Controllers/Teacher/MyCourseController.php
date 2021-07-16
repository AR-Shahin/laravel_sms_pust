<?php

namespace App\Http\Controllers\Teacher;

use App\Models\EnrollCourse;
use Illuminate\Http\Request;
use App\Models\CourseTeacher;
use App\Http\Controllers\Controller;

class MyCourseController extends Controller
{
    function myAssignedCourses()
    {
        $courses =  CourseTeacher::with('course', 'semester', 'session')->whereTeacherId(auth('teacher')->id())->paginate(10);
        return view('Teacher.my-course', compact('courses'));
    }
    function myEnrolledCourses()
    {
        $courses = EnrollCourse::whereTeacherId(auth('teacher')->id())->latest()->get();
        return view('Teacher.my-courses', compact('courses'));
    }
}
