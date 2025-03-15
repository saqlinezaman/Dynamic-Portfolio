<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
// management-------------------------------------------------------------------------------

Route::get('/management', [ ManagementController::class, 'index'])->name('management.index');
// regiter form
Route::post('/management/user/register', [ ManagementController::class, 'store_register'])->name('management.store');
// make role manager or user or blogger
Route::post('/management/user/manager/down/{id}', [ ManagementController::class, 'manager_down'])->name('management.down');





// profile----------------------------------------------------------------

Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
// username
Route::post('/profile/username/update',[ProfileController::class,'name_update'])->name('profile.username');
// email
Route::post('/profile/email/update',[ProfileController::class,'email_update'])->name('profile.email');
// password
Route::post('/profile/password/update',[ProfileController::class,'password_update'])->name('profile.password');
// image
Route::post('/profile/image/update',[ProfileController::class,'image_update'])->name('profile.image');

// Category----------------------------------------------------------------
Route::get('/category',[CategoryController::class,'index'])->name('category.index');
// store
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
// edit
Route::get('/category/edit/{slug}',[CategoryController::class,'edit'])->name('category.edit');
// edit update
Route::post('/category/update/{slug}',[CategoryController::class,'update'])->name('category.update');
// catagory delete
Route::get('/category/destroy/{slug}',[CategoryController::class,'destroy'])->name('category.destroy');
// status
Route::post('/category/status/{id}',[CategoryController::class,'status'])->name('category.status');
// front end website---------------------------------------------------------------------
Route::get('/homeWebsite',[FrontendController::class,'index'])->name('home.index');
