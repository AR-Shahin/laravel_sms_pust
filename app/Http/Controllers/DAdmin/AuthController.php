<?php

namespace App\Http\Controllers\DAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DAdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AuthController extends Controller
{
    function departmentLoginForm()
    {
        return view('Department.auth.login');
    }

    public function departmentLoginProcess(DAdminLoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('dept_admin')->attempt($credentials)) {
            return redirect(RouteServiceProvider::DEPARTMENT_ADMIN_HOME);
        } else {
            return back()->with('error', 'Password Error!');
        }
    }


    public function departmentDashboard()
    {
        return view('Department.dashboard');
    }
}
