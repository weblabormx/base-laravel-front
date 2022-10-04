<?php

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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () 
{
	Route::page('Dashboard', '/');
	Route::front('User');
});

// Route::get('pay/{wallet:slug}', App\Http\Livewire\LinkPayment::class); // Example of how implement Livewire, erase it once its used

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
