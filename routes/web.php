<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// profile
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
// username
Route::post('/profile/username/update',[ProfileController::class,'name_update'])->name('profile.username');
// email
Route::post('/profile/email/update',[ProfileController::class,'email_update'])->name('profile.email');
// password
Route::post('/profile/password/update',[ProfileController::class,'password_update'])->name('profile.password');
// image
Route::post('/profile/image/update',[ProfileController::class,'image_update'])->name('profile.image');
