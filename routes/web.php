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

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('banjir')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\BanjirController::class, 'index']);
});
Route::prefix('suhu')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\SuhuController::class, 'index']);
});

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\UserController::class, 'index']);
});
