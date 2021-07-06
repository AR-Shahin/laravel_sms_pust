<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DepartmentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layouts.master');
});


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
    });
});
