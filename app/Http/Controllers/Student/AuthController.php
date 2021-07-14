<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StudentLoginRequest;

class AuthController extends Controller
{
    function studentLoginForm()
    {
        return view('Student.auth.login');
    }

    public function studentLoginProcess(StudentLoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('student')->attempt($credentials)) {
            return redirect(RouteServiceProvider::STUDENT_HOME);
        } else {
            return back()->with('error', 'Password Error!');
        }
    }


    public function studentDashboard()
    {
        return view('Student.dashboard');
    }
}
