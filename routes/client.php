<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\RequestClientController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [ClientController::class,'index']);
Route::prefix('requests')
    ->name('requests.')
    ->group(function () {
        Route::get('/', [RequestClientController::class,'index']);
        Route::get('/detail', [RequestClientController::class,'detailRequest']);
        Route::get('/pay', [RequestClientController::class,'payRequest']);
        Route::get('/payment', [RequestClientController::class,'payment']);
        Route::get('/active-request', [RequestClientController::class,'activeRequest']);
        Route::get('/ready-review', [RequestClientController::class,'readyReview']);
});
