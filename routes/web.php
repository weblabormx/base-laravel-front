<?php

use App\Http\Livewire;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Livewire\Web\Home::class);

// Front admin panel
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
	Route::page('Dashboard', '/');
	Route::front('User');
});

// Livewire admin panel
Route::middleware('auth')->prefix('app')->name('app.')->group(function () {
	Route::get('/', Livewire\App\Dashboard::class)->name('dashboard');
	Route::get('profile', Livewire\App\MyProfile::class)->name('profile');
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
