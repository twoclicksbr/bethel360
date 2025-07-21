<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Auth\LoginController;
use App\Http\Controllers\Front\Admin\DashboardController;

Route::get('/', function () {
    return view('site');
});

Route::get('/auth/login', [LoginController::class, 'showForm']);
Route::post('/auth/login', [LoginController::class, 'login']);


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
});
