<?php

use Illuminate\Support\Facades\Route;
use App\Traits\CorengTrait;
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
    return view('paralax');
});

CorengTrait::include_route_files(__DIR__.'/front_route/');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {
    CorengTrait::include_route_files(__DIR__.'/back_route/');
});
