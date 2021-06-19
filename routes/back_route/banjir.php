<?php
Route::prefix('banjir')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\BanjirController::class, 'index']);
    // Route::get('/get_data',[App\Http\Controllers\Backend\BanjirController::class, 'get_data']);
});
