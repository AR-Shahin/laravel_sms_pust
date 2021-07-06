<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('layouts.master');
});


// Admins Routes

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'adminLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'adminLoginProcess'])->name('login');
    Route::get('home', [AuthController::class, 'adminDashboard'])->name('dashboard');
});
