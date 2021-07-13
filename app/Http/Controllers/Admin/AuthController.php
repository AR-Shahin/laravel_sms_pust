<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\AdminLoginRequest;

class AuthController extends Controller
{
    function adminLoginForm()
    {
        return view('Admin.auth.login');
    }

    public function adminLoginProcess(AdminLoginRequest $request)
    {

        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        } else {
            return back()->with('error', 'Password Error!');
        }
    }


    public function adminDashboard()
    {
        return view('Admin.dashboard');
    }

    function logout(Request $request)
    {
        if ($request->auth === 'admin') {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');
        }
        if ($request->auth === 'dept_admin') {
            Auth::guard('dept_admin')->logout();
            return redirect()->route('d-admin.login');
        }
        if ($request->auth === 'teacher') {
            Auth::guard('teacher')->logout();
            return redirect()->route('teacher.login');
        }
        if ($request->auth === 'student') {
            Auth::guard('student')->logout();
            return redirect()->route('student.login');
        }
    }
}
