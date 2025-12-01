<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function() {
    Route::resource('chirps', ChirpController::class)
        ->except(['index', 'create', 'show']);
    
    Route::post('/logout', Logout::class)->name('user_logout_action');
});

Route::middleware('guest')->group(function() {
    Route::view('/register', 'auth.register')
        ->name('register');
    Route::post('/register', Register::class)->name('user_register_action');
    
    Route::view('/login', 'auth.login')
        // "login" route name is special and is used internally by Laravel
        ->name('login');
    Route::post('/login', Login::class)->name('user_login_action');
});
