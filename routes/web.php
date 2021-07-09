<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentAdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\DAdmin\AuthController as DAdminAuthController;
use App\Http\Controllers\DAdmin\StudentController;
use App\Http\Controllers\DAdmin\TeacherController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// logout

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admins Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'adminLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'adminLoginProcess'])->name('login');

    // Auth
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('home', [AuthController::class, 'adminDashboard'])->name('dashboard');
        Route::resource('department', DepartmentController::class);
        Route::get('department-fetch', [DepartmentController::class, 'departmentFetch'])->name('department.fetch');
        Route::resource('course', CourseController::class);
        Route::get('course-fetch', [CourseController::class, 'courseFetch'])->name('course.fetch');

        Route::resource('dept-admin', DepartmentAdminController::class);

        Route::get('teachers', [GlobalController::class, 'teachers'])->name('teachers');
        Route::get('students', [GlobalController::class, 'students'])->name('students');
    });
});


// Department Admin

Route::prefix('d-admin')->name('d-admin.')->group(function () {
    Route::get('login', [DAdminAuthController::class, 'departmentLoginForm'])->name('login');
    Route::post('login', [DAdminAuthController::class, 'departmentLoginProcess'])->name('login');

    // Auth
    Route::middleware(['auth:dept_admin'])->group(function () {
        Route::get('home', [DAdminAuthController::class, 'departmentDashboard'])->name('dashboard');
        Route::resource('teacher', TeacherController::class);
        Route::resource('student', StudentController::class);
        Route::get('department-fetch', [DepartmentController::class, 'departmentFetch'])->name('department.fetch');
        Route::resource('course', CourseController::class);
        Route::get('course-fetch', [CourseController::class, 'courseFetch'])->name('course.fetch');

        Route::resource('dept-admin', DepartmentAdminController::class);
    });
});
