<?php

namespace App\Http\Controllers\DAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseTeacher;
use App\Models\Semester;
use App\Models\Session;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AssignCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = CourseTeacher::with(
            ['teacher' => function ($query) {
                $query->where('department_id', auth('dept_admin')->user()->department_id);
            }],
            'course',
            'session',
            'semester'

        )->paginate(10);
        return view('Department.Assign.index', compact('courses'));
    }
    // ->with(['payments' => function ($query) {
    //     $query->where('type', '<>', 'point');
    // }])
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::latest()->get();
        $sessions = Session::latest()->get();
        $semesters = Semester::latest()->get();
        $teachers = Teacher::where('department_id', auth('dept_admin')->user()->department_id)->latest()->get();
        return view('Department.Assign.create', compact('courses', 'sessions', 'semesters', 'teachers'));
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
            'session_id' => 'required',
            'semester_id' => 'required',
            'teacher_id' => 'required',
            'course_id' => 'required',
        ]);
        // dd($this->checkExistsAssignCourse($request->all()));
        if ($this->checkExistsAssignCourse($request->all())) {
            CourseTeacher::create($request->all());
            $this->setSuccessMessage();
        } else {
            $this->setErrorMessage('Already Assigned!');
        }

        return back();
    }

    protected function checkExistsAssignCourse($request): bool
    {
        // $course = CourseTeacher::where([
        //     ['session_id', $request['session_id']],
        //     ['semester_id', $request['semester_id]'],
        //     ['teacher_id', $request['teacher_id']],
        //     ['course_id', $request->['course_id']]
        // ])->first();
        // dd($request->semester_id);
        $course = CourseTeacher::where('session_id', $request['session_id'])
            ->where('semester_id', $request['semester_id'])
            ->where('teacher_id', $request['teacher_id'])
            ->where('course_id', $request['course_id'])
            ->first();

        if ($course) {
            return false;
        }
        return true;
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
    public function edit(CourseTeacher $assign_course)
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
    public function update(Request $request, CourseTeacher $assign_course)
    {
        $request->validate([
            'name' => 'required',
            'registration' => ['numeric', "unique:students,registration,{$assign_course->id}"],
            'email' => "required|unique:students,email,{$assign_course->id}",
            'phone' => 'required',
        ]);
        $assign_course->update($request->all());
        $this->setSuccessMessage('Data Updated Successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseTeacher $assign_course)
    {
        if ($assign_course->delete()) {
            $this->setSuccessMessage('Data Delete Successfully!');
            return back();
        }
    }
}
