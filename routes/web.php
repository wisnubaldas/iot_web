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
    // return view('welcome');
    return redirect('/login');
});
Route::prefix('banjir')->group(function(){
    Route::post('/get_data',[App\Http\Controllers\Backend\BanjirController::class, 'get_data']);
    Route::get('/set_status/{id?}',[App\Http\Controllers\Backend\BanjirController::class, 'set_status']);
    Route::get('/send_status',[App\Http\Controllers\Backend\BanjirController::class, 'send_status']);
});
Route::prefix('gate')->group(function(){
    Route::get('/logging/{station}',[App\Http\Controllers\Backend\GateController::class, 'logging']);
});

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('banjir')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\BanjirController::class, 'index']);
    // Route::get('/get_data',[App\Http\Controllers\Backend\BanjirController::class, 'get_data']);
});
Route::prefix('suhu')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\SuhuController::class, 'index']);
});

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\UserController::class, 'index']);
    Route::get('/roles',[App\Http\Controllers\Backend\UserController::class, 'roles']);

});

Route::prefix('gate')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\GateController::class, 'index']);
});