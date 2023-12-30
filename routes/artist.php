<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Artist\DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('products-collections', \App\Http\Controllers\Artist\ProductCollectionController::class)->only('index');
Route::resource('products', \App\Http\Controllers\Artist\ProductController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

Route::patch('/requests/reviews/{review}/{type}', [\App\Http\Controllers\Artist\RequestReviewController::class, 'update'])
    ->name('requests.reviews.update')
    ->where('type', implode('|', [\App\Enums\RequestStatus::APPROVED, \App\Enums\RequestStatus::REJECTED, \App\Enums\RequestStatus::FINISHED]));
Route::resource('requests.reviews', \App\Http\Controllers\Artist\RequestReviewController::class)->shallow()->only('edit');
Route::prefix('requests')->name('requests.')->group(function () {
    Route::get('/incoming', [\App\Http\Controllers\Artist\RequestController::class, 'incoming'])->name('incoming');
    Route::get('/active', [\App\Http\Controllers\Artist\RequestController::class, 'active'])->name('active');
    Route::get('/finish', [\App\Http\Controllers\Artist\RequestController::class, 'finish'])->name('finish');
});
Route::resource('requests', \App\Http\Controllers\Artist\RequestController::class)->except('index');
