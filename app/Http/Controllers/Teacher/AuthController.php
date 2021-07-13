<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\TeacherLoginRequest;

class AuthController extends Controller
{
    function teacherLoginForm()
    {
        return view('Teacher.auth.login');
    }

    public function teacherLoginProcess(TeacherLoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('teacher')->attempt($credentials)) {
            return redirect(RouteServiceProvider::TEACHER_HOME);
        } else {
            return back()->with('error', 'Password Error!');
        }
    }


    public function teacherDashboard()
    {
        return view('Teacher.dashboard');
    }
}
