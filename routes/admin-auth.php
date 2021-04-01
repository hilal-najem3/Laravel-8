<?php

use App\Http\Controllers\Auth\Admin\AuthenticatedSessionController;
use App\Http\Controllers\Auth\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Auth\Admin\NewPasswordController;
use App\Http\Controllers\Auth\Admin\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function() {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                    ->middleware('guest:admin')
                    ->name('admin.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                    ->middleware('guest:admin');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->middleware('guest:admin')
                    ->name('admin.password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->middleware('guest:admin')
                    ->name('admin.password.email');
    
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->middleware('guest')
                    ->name('admin.password.request');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->middleware('guest:admin')
                    ->name('admin.password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
                    ->middleware('guest:admin')
                    ->name('admin.password.update');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->middleware('auth:admin')
                    ->name('admin.password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                    ->middleware('auth:admin');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->middleware('auth:admin')
                    ->name('admin.logout');
});