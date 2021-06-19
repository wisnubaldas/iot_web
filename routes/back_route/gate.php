<?php
Route::prefix('gate')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\GateController::class, 'index']);
});
