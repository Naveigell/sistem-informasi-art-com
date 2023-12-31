<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\RequestClientController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [ClientController::class,'index']);
Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/history', [\App\Http\Controllers\Client\RequestController::class, 'history'])->name('history');
    Route::get('/ready-payment', [\App\Http\Controllers\Client\RequestController::class, 'readyPayment'])->name('ready-payment');
    Route::get('/active', [\App\Http\Controllers\Client\RequestController::class, 'active'])->name('active');
    Route::get('/ready-review', [\App\Http\Controllers\Client\RequestController::class, 'readyReview'])->name('ready-review');
});
Route::resource('requests.payments', \App\Http\Controllers\Client\RequestPaymentController::class)->shallow()->only('edit', 'update');
Route::resource('requests', \App\Http\Controllers\Client\RequestController::class)->except('index');
