<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Artist\DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('products-collections', \App\Http\Controllers\Artist\ProductCollectionController::class)->shallow();
Route::resource('products', \App\Http\Controllers\Artist\ProductController::class)->only('index', 'edit', 'update', 'store');

Route::resource('requests.reviews', \App\Http\Controllers\Artist\RequestReviewController::class)->only('edit');
Route::resource('requests', \App\Http\Controllers\Artist\RequestController::class);
