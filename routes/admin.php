<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:admin'
], function() {
    Route::get('/', function () {

        $data = [
            'header' => 'Admin Dashboard'
        ];

        return view('admin.dashboard')->with($data);

    })->name('admin.main');

    Route::get('/dashboard', function () {

        $data = [
            'header' => 'Admin Dashboard'
        ];

        return view('admin.dashboard')->with($data);

    })->name('admin.dashboard');
});
