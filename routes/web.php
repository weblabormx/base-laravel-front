<?php

use App\Livewire;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

// * Front admin panel
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
	Route::page('Dashboard', '/');
	Route::front('User');

	Route::get('logs', [LogViewerController::class, 'index']);
});

// * Livewire user platform
Route::middleware('auth')->prefix('app')->name('app.')->group(function () {
	Route::get('/', Livewire\App\Dashboard::class)->name('dashboard');
	Route::get('profile', Livewire\App\MyProfile::class)->name('profile');
});

// * Public home page
Route::get('/', Livewire\Web\Home::class);
