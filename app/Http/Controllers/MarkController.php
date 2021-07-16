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

        $this->setSuccessMessage("Assign marks of ({$course->course->name}) this course. Marks is {$request->marks}");
        return redirect()->route('teacher.marks');
    }

    function editAssignMarksFromTeacher(EnrollCourse $course)
    {

        $marks =  $this->getMarks($course);
        return view('Teacher.assign-marks-edit', compact('course', 'marks'));
    }


    protected function getMarks($course)
    {
        $m = StudentMark::select('id', 'marks')->whereTeacherId(auth('teacher')->id())
            ->whereCourseId($course->course_id)
            ->whereSemesterId($course->semester_id)
            ->whereSessionId($course->session_id)
            ->whereStudentId($course->student_id)
            ->first();

        return $m;
    }

    function updateMarks(Request $request, StudentMark $student_mark)
    {
        $student_mark->marks = $request->marks;
        $student_mark->save();
        $this->setSuccessMessage("Mark Has Updated!");
        return redirect()->route('teacher.marks');
    }

    // Student

    public function getMarksFromStudent()
    {
        $courses = StudentMark::without('student')->whereStudentId(auth('student')->id())->latest()->get();
        return view('Student.marks', compact('courses'));
    }
}
