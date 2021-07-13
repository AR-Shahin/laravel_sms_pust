<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use Illuminate\Http\Request;

class MyCourseController extends Controller
{
    function myAssignedCourses()
    {
        $courses =  CourseTeacher::with('course', 'semester', 'session')->whereTeacherId(auth('teacher')->id())->paginate(10);
        return view('Teacher.my-course', compact('courses'));
    }
}
