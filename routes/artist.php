<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Artist\DashboardController::class, 'index'])->name('dashboard.index');

Route::resource('products-collections', \App\Http\Controllers\Artist\ProductCollectionController::class)->shallow()->only('index');
Route::resource('products', \App\Http\Controllers\Artist\ProductController::class)->only('index', 'create', 'store', 'edit', 'update', 'destroy');

Route::resource('requests.reviews', \App\Http\Controllers\Artist\RequestReviewController::class)->only('edit');
Route::resource('requests', \App\Http\Controllers\Artist\RequestController::class);
