<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\EnrollCourse;
use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\EnrollCourseController;

Route::prefix('student')->name('student.')->group(function () {
    Route::get('login', [AuthController::class, 'studentLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'studentLoginProcess'])->name('login');

    // Auth
    Route::middleware(['auth:student'])->group(function () {
        Route::get('home', [AuthController::class, 'studentDashboard'])->name('dashboard');

        // //My Course
        Route::get('enroll-course', [EnrollCourseController::class, 'enrollCourse'])->name('enroll-course');

        Route::post('take-teacher/{course}', [EnrollCourseController::class, 'takeTeacher'])->name('take-teacher');
    });
});
