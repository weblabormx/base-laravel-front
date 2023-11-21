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

Route::group([], function () {

    // * Login

    $this->get('login', Livewire\Auth\Login::class)
        ->name('login');


    // * Logout

    $this->get('logout', function (Request $request) {
        auth()->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    })->name('logout');


    // * Sign up

    $this->get('register', Livewire\Auth\Register::class)
        ->name('register');


    // * Password Reset

    $this->get('password/reset', Livewire\Auth\ForgotPassword::class)
        ->name('password.request');

    $this->get('password/reset/{token}', Livewire\Auth\ResetPassword::class)
        ->name('password.reset');


    // * Password Confirmation

    $this->get('password/confirm', Livewire\Auth\ConfirmPassword::class)
        ->name('password.confirm');

    $this->post('password/confirm', Livewire\Auth\ConfirmPassword::class);


    // * Email Verification

    $this->get('email/verify', Livewire\Auth\Verification::class)
        ->name('verification.notice');

    $this->get('email/verify/{id}/{hash}', Livewire\Auth\Verification::class)
        ->name('verification.verify');

    $this->post('email/resend', Livewire\Auth\Verification::class)
        ->name('verification.resend');
});
