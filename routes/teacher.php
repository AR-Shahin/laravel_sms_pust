<?php

use App\Http\Controllers\MarkController;
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
        Route::get('my-enroll-course', [MyCourseController::class, 'myEnrolledCourses'])->name('my-enroll-course');

        // Marks
        Route::get('marks', [MarkController::class, 'getMarksFromTeacher'])->name('marks');
        Route::get('assign-marks/{course}', [MarkController::class, 'assignMarksFromTeacher'])->name('assign.marks');
        Route::post('assign--marks/{course}', [MarkController::class, 'assignMarks'])->name('store.assign.marks');
        Route::get('assign-marks-edit/{course}', [MarkController::class, 'editAssignMarksFromTeacher'])->name('assign.marks.edit');
        Route::put('assign--marks/{student_mark}', [MarkController::class, 'updateMarks'])->name('update.assign.marks');
    });
});
