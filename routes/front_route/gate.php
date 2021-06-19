<?php
Route::prefix('gate')->group(function(){
    Route::get('/logging/{station}',[App\Http\Controllers\Backend\GateController::class, 'logging']);
});
