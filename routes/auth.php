<?php

use App\Http\Livewire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
| Here are defined all the authentication & authorization routes based on 
| Laravel UI scaffolding, converted to Livewire components.
|
*/

Route::middleware('guest')->group(function () {
    // * Login

    Route::get('login', Livewire\Auth\Login::class)
        ->name('login');

    // * Sign up

    Route::get('register', Livewire\Auth\Register::class)
        ->name('register');

    // * Password Reset

    Route::get('password/reset', Livewire\Auth\ForgotPassword::class)
        ->name('password.request');

    Route::get('password/reset/{token}', Livewire\Auth\ResetPassword::class)
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    // * Logout

    Route::get('logout', function (Request $request) {
        auth()->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');


    // * Password Confirmation

    Route::get('password/confirm', Livewire\Auth\ConfirmPassword::class)
        ->name('password.confirm');

    // * Email Verification

    Route::get('email/verify', Livewire\Auth\Verification::class)
        ->name('verification.notice');

    Route::get('email/verify/{id}/{hash}', Livewire\Auth\Verification::class)
        ->name('verification.verify');
});
