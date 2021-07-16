<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use App\Models\StudentMark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function getMarksFromTeacher()
    {
        $courses = EnrollCourse::whereTeacherId(auth('teacher')->id())->latest()->get();
        return view('Teacher.marks', compact('courses'));
    }

    public function assignMarksFromTeacher(EnrollCourse $course)
    {
        return view('Teacher.assign-marks', compact('course'));
    }

    function assignMarks(Request $request, EnrollCourse $course)
    {
        $request->validate([
            'marks' => ['required', 'numeric']
        ]);
        StudentMark::create([
            'course_id' => $course->course_id,
            'teacher_id' => auth('teacher')->id(),
            'student_id' => $course->student_id,
            'session_id' => $course->session_id,
            'semester_id' => $course->semester_id,
            'marks' => $request->marks
        ]);

        $this->setSuccessMessage("Assign marks of ({$course->course->name}) this course");
        return redirect()->route('teacher.marks');
    }

    function editAssignMarksFromTeacher(EnrollCourse $course)
    {
        return $course;
    }
}
