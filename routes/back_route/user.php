<?php
Route::prefix('user')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\UserController::class, 'index']);
    Route::post('/roles/{mehong}/{id}',[App\Http\Controllers\Backend\UserController::class, 'user_roles']);
    Route::get('/create',[App\Http\Controllers\Backend\UserController::class, 'create']);
    Route::post('/create',[App\Http\Controllers\Backend\UserController::class, 'create']);
    Route::get('/edit/{id}',[App\Http\Controllers\Backend\UserController::class, 'edit']);
    Route::post('/update/{id}',[App\Http\Controllers\Backend\UserController::class, 'update']);
    Route::post('/delete/{id}',[App\Http\Controllers\Backend\UserController::class, 'delete']);
    Route::get('/profile/{id}',[App\Http\Controllers\Backend\UserProfileController::class, 'index']);
    Route::get('/profile/edit/{id}',[App\Http\Controllers\Backend\UserProfileController::class, 'edit']);

    Route::group(['middleware' => ['role:super']], function () {
        Route::get('/roles',[App\Http\Controllers\Backend\UserController::class, 'roles']);
        Route::post('/roles/create',[App\Http\Controllers\Backend\UserController::class, 'create_roles']);
        Route::get('/roles/delete/{apa}/{id}',[App\Http\Controllers\Backend\UserController::class, 'delete_roles']);
        Route::get('/roles/syn_permission',[App\Http\Controllers\Backend\UserController::class, 'syn_permission']);
        Route::get('/roles/revoke_permission',[App\Http\Controllers\Backend\UserController::class, 'revoke_permission']);

    });
});
