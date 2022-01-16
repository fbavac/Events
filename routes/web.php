<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InviteController;

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

Route::fallback(function () {
    return redirect('/');
});

Route::get('/', [HomeController::class, 'welcome']);
Route::post('/', [HomeController::class, 'welcomeDateRange']);
Route::get('/average-events', [HomeController::class, 'averageEvents']);
Route::get('/all-events', [EventsController::class, 'allActive']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', [HomeController::class, 'index'])->name('home');
	Route::resource('event', EventsController::class);
	Route::resource('invite', InviteController::class);
});

Auth::routes();
