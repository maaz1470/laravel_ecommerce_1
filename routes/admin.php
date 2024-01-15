<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

$loginPath = 'admin';
$dasboardPath = 'dashboard';

Route::prefix($dasboardPath)->group(function(){
    Route::name('dashboard')->group(function(){
        Route::get('/',[DashboardController::class, 'panel'])->name('panel');
    });
});

Route::prefix($loginPath)->group(function(){
    Route::name('admin.')->group(function(){
        Route::get('/login',[AdminController::class, 'login'])->name('login');
        Route::get('/register',[AdminController::class, 'register'])->name('register');
        Route::post('/registration',[AdminController::class, 'registration'])->name('userRegistration');
    });
});