<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/{receiver}', 'App\Http\Controllers\MainController@indexWithReceiver')->name('admin.dashboard');
Route::any('/', 'App\Http\Controllers\MainController@index')->name('admin.dashboard');
Route::get('/home', 'App\Http\Controllers\MainController@index')->name('admin.dashboard');
Route::get('/dashboard', 'App\Http\Controllers\MainController@index')->name('admin.dashboard');
