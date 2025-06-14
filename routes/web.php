<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationSessionController::class, 'index']);
    Route::post('/login', [AuthenticationSessionController::class, 'store'])
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('/admins', AdminController::class)->parameter('admins', 'user');

    Route::resource('/employees', EmployeeController::class);

    Route::resource('/leaves', LeaveController::class)->parameter('leaves', 'leave');

    Route::post('/logout', [AuthenticationSessionController::class, 'destroy'])
        ->name('logout');
});
