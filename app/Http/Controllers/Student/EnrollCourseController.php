<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\CourseTeacher;
use App\Models\EnrollCourse;
use Illuminate\Http\Request;

class EnrollCourseController extends Controller
{
    public  function enrollCourse()
    {
        $courses = CourseTeacher::whereDepartmentId(auth('student')->user()->department_id)->get();
        return view('Student.enroll', compact('courses'));
    }

    public function takeTeacher(CourseTeacher $course)
    {
        // return $this->checkExistsCourse($course);
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

        $this->setSuccessMessage($course->course->name . ' Successfully Enrolled!!');
        return back();
    }
    function myEnrolledCourses()
    {
        $courses = EnrollCourse::whereStudentId(auth('student')->id())->latest()->get();
        return view('Student.my-courses', compact('courses'));
    }

    protected function checkExistsCourse($course)
    {
        $c = EnrollCourse::whereStudentId(auth('student')->id())
            ->whereSemesterId($course->semester_id)
            ->whereSessionId($course->session_id)

            ->whereCourseId($course->course_id)
            ->first();
        //return $c;
        if ($c) {
            return true;
        } else {
            return false;
        }
    }

    function removeEnrolledCourse(CourseTeacher $course)
    {
        EnrollCourse::whereStudentId(auth('student')->id())
            ->whereTeacherId($course->teacher_id)
            ->whereCourseId($course->course_id)
            ->whereSemesterId($course->semester_id)
            ->whereSessionId($course->session_id)
            ->delete();

        $this->setSuccessMessage($course->course->name . ' Remove from enroll List!!');
        return back();
    }
}
