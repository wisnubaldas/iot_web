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
    return view('paralax');
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
    Route::post('/roles/{mehong}/{id}',[App\Http\Controllers\Backend\UserController::class, 'user_roles']);
    Route::get('/create',[App\Http\Controllers\Backend\UserController::class, 'create']);
    Route::post('/create',[App\Http\Controllers\Backend\UserController::class, 'create']);
    Route::get('/edit/{id}',[App\Http\Controllers\Backend\UserController::class, 'edit']);
    Route::post('/update/{id}',[App\Http\Controllers\Backend\UserController::class, 'update']);
    Route::post('/delete/{id}',[App\Http\Controllers\Backend\UserController::class, 'delete']);
    Route::get('/profile/{id}',[App\Http\Controllers\Backend\UserProfileController::class, 'index']);

    Route::group(['middleware' => ['role:super']], function () {
        Route::get('/roles',[App\Http\Controllers\Backend\UserController::class, 'roles']);
        Route::post('/roles/create',[App\Http\Controllers\Backend\UserController::class, 'create_roles']);
        Route::get('/roles/delete/{apa}/{id}',[App\Http\Controllers\Backend\UserController::class, 'delete_roles']);
        Route::get('/roles/syn_permission',[App\Http\Controllers\Backend\UserController::class, 'syn_permission']);
        Route::get('/roles/revoke_permission',[App\Http\Controllers\Backend\UserController::class, 'revoke_permission']);

    });
});

Route::prefix('gate')->middleware('auth')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\GateController::class, 'index']);
});