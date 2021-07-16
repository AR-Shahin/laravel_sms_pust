<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use App\Models\EnrollCourse;
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
        if ($this->checkExistsCourse($course)) {
            $this->setErrorMessage("{$course->course->name} Already Enrolled!");
            return back();
        }
        EnrollCourse::create([
            'course_id' => $course->course_id,
            'teacher_id' => $course->teacher_id,
            'student_id' => auth('student')->id(),
            'session_id' => $course->session_id,
            'semester_id' => $course->semester_id,

        ]);

        $this->setSuccessMessage('Successfully Enrolled!!');
        return back();
    }
    function myEnrolledCourses()
    {
    }

    protected function checkExistsCourse($course)
    {
        $c = EnrollCourse::whereStudentId(auth('student')->id())
            ->whereSemesterId($course->semester_id)
            ->whereSessionId($course->session_id)
            ->first();

        if ($c) {
            return true;
        } else {
            return false;
        }
    }
}
