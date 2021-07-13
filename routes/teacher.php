<?php

use App\Http\Controllers\Teacher\AuthController;
use App\Http\Controllers\Teacher\MyCourseController;
use Illuminate\Support\Facades\Route;


Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('login', [AuthController::class, 'teacherLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'teacherLoginProcess'])->name('login');

    // Auth
    Route::middleware(['auth:teacher'])->group(function () {
        Route::get('home', [AuthController::class, 'teacherDashboard'])->name('dashboard');

        //My Course
        Route::get('my-course', [MyCourseController::class, 'myAssignedCourses'])->name('my-course');
    });
});
