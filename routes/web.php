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

Route::get('/', function () {
	return view('welcome');
});

// Front admin panel
Route::middleware('auth')->prefix('admin')->group(function () {
	Route::page('Dashboard', '/');
	Route::front('User');
});

// Livewire admin panel
Route::middleware('auth')->prefix('app')->group(function () {
	Route::get('/', Livewire\App\Dashboard::class);
	Route::get('account', Livewire\AccountManager::class);
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
