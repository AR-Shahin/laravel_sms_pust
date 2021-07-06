<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('Admin.course');
    }
    function courseFetch()
    {
        return Course::latest()->get();
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        Course::create($request->all());
    }

    public function destroy(Course $course)
    {
        $course->delete();
    }
    public function show(Course $course)
    {
        return $course;
    }
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
    }
}
