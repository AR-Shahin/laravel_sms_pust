<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        return view('Admin.semester');
    }
    function semesterFetch()
    {
        return Semester::latest()->get();
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:semesters,name']
        ]);
        Semester::create($request->all());
    }

    public function destroy(Semester $Semester)
    {
        $Semester->delete();
    }
    public function show(Semester $Semester)
    {
        return $Semester;
    }
    public function update(Request $request, Semester $Semester)
    {
        $request->validate([
            'name' => ['required', "unique:semesters,name,{$Semester->id}"]
        ]);
        $Semester->update($request->all());
    }
}
