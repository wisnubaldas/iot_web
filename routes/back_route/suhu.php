<?php
Route::prefix('suhu')->group(function(){
    Route::get('/',[App\Http\Controllers\Backend\SuhuController::class, 'index']);
});
