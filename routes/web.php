<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegisterArtistController;
use App\Http\Controllers\Auth\RegisterClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Artist\ProfileArtistController;
use App\Http\Controllers\Client\ProfileClientController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// find artist
Route::get('/find-artist', [HomeController::class,'findArtist']);
// view product
Route::get('/product', function () {
    return view('find-artist.view-product');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);

Route::get('register-artist',[RegisterArtistController::class, 'index'])->name('register-artist');
Route::post('create-artist',[RegisterArtistController::class, 'store'])->name('create-artist');
Route::get('register-client',[RegisterClientController::class, 'index'])->name('register-client');
Route::post('create-client',[RegisterClientController::class, 'store'])->name('create-client');

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Route::get('/admin/dashboard', \App\Http\Livewire\Dashboardindex::class);
    Route::get('/admin/dashboard', [AdminController::class, 'index']);

});

// View Profile for all role
Route::middleware(['auth'])->group(function () {
    // get profile by id
    Route::get('/artist/profile/{id}', [ProfileArtistController::class, 'getUserData'])->name('artist.profile');
    //edit profile view
    Route::get('/artist/edit-profile', [ProfileArtistController::class, 'viewEditProfile'])->name('artist.edit-profile');
    // update profile
    Route::post('/artist/profile', [ProfileArtistController::class, 'store'])->name('artist.profile.store');

    // Client profile
    Route::get('/client/profile/{id}', [ProfileClientController::class, 'getUserData'])->name('client.profile');
    //edit profile view
    Route::get('/client/edit-profile', [ProfileClientController::class, 'viewEditProfile'])->name('client.edit-profile');
    // update profile
    Route::post('/client/profile', [ProfileClientController::class, 'store'])->name('client.profile.store');

    Route::get('/delete', [HomeController::class, 'delete'])->name('delete');
});



