<?php
Route::prefix('blog')->group(function(){
    Route::get('about',[App\Http\Controllers\Blog\AboutController::class, 'index']);
});
