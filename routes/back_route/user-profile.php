<?php
Route::prefix('user-profile')->group(function(){
    Route::get('/{id}',[App\Http\Controllers\Backend\UserProfileController::class, 'index']);
    Route::post('/update',[App\Http\Controllers\Backend\UserProfileController::class, 'update']);
    Route::get('/edit/{id}',[App\Http\Controllers\Backend\UserProfileController::class, 'edit']);
});
