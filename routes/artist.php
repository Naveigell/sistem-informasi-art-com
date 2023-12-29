<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Artist\DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('products', \App\Http\Controllers\Artist\ProductController::class)->only('index', 'edit', 'update', 'store');
Route::get('products/collections', [\App\Http\Controllers\Artist\ProductController::class, 'collectionProduct']);

Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/manage', [\App\Http\Controllers\Artist\RequestArtistController::class, 'index']);
    Route::get('/active', [\App\Http\Controllers\Artist\RequestArtistController::class, 'activeRequest']);
    Route::get('/finish', [\App\Http\Controllers\Artist\RequestArtistController::class, 'finishRequest']);
    Route::get('/review', [\App\Http\Controllers\Artist\RequestArtistController::class, 'reviewRequest']);
});
