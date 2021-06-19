<?php
Route::prefix('banjir')->group(function(){
    Route::post('/get_data',[App\Http\Controllers\Backend\BanjirController::class, 'get_data']);
    Route::get('/set_status/{id?}',[App\Http\Controllers\Backend\BanjirController::class, 'set_status']);
    Route::get('/send_status',[App\Http\Controllers\Backend\BanjirController::class, 'send_status']);
});
