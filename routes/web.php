<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[HomeController::class,'index'])->name('home');


// front end website---------------------------------------------------------------------
Route::get('/deshboard',[HomeController::class,'deshboard_index'])->name('deshboard.index');
Route::get('/blog/see/{slug}',[HomeController::class,'see_index'])->name('newspaper.index');

// auth

Auth::routes(['register'=>false]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');


// management------------------------------------------------------------------------------

route::middleware(['rolecheck'])->group(function(){

    Route::get('/management', [ ManagementController::class, 'index'])->name('management.index');
    // regiter form
    Route::post('/management/user/register', [ ManagementController::class, 'store_register'])->name('management.store');
    // make role manager or user or blogger
    Route::post('/management/user/manager/down/{id}', [ ManagementController::class, 'manager_down'])->name('management.down');
    // management existing role
    Route::get('/management/role', [ ManagementController::class, 'role_index'])->name('management.role.index');
    // role assign
    Route::post('/management/role/assign', [ ManagementController::class, 'role_assign'])->name('management.role.assign');
    // blogger grade down
    Route::post('/management/role/undo/blogger/{id}', [ ManagementController::class, 'blogger_down'])->name('management.role.blogger.down');
    // blogger grade down
    Route::post('/management/role/undo/user/{id}', [ ManagementController::class, 'user_down'])->name('management.role.user.down');


});


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

// blogs-----------------------------------------------------------------------------------

Route::resource('/blog',BlogController::class);
// delete
Route::get('/Blog/delete/{id}',[BlogController::class,'blog_delete'])->name('blog.delete');
// status
Route::post('/Blog/status/{id}',[BlogController::class,'blog_status'])->name('Blog.status');

// services--------------------------------------------------------------------------------------

Route::resource('/service',ServiceController::class);
// delete
Route::get('/service/delete/{id}',[ServiceController::class,'service_delete'])->name('service.delete');
// status
Route::post('/service/status/{id}',[ServiceController::class,'service_status'])->name('service.status');

// portfolio--------------------------------------------------------------------------------

Route::resource('/portfolio',PortfolioController::class);
// delete
Route::get('/portfolio/delete/{id}',[PortfolioController::class,'portfolio_delete'])->name('portfolio.delete');
// status
Route::post('/portfolio/status/{id}',[PortfolioController::class,'portfolio_status'])->name('portfolio.status');

// testimonials---------------------------------------------------------------------------------

Route::resource('/testimonial',TestimonialController::class);
// delete
Route::get('/testimonial/delete/{id}',[TestimonialController::class,'testimonial_delete'])->name('testimonial.delete');
// status
Route::post('/testimonial/status/{id}',[TestimonialController::class,'testimonial_status'])->name('testimonial.status');

// pricing-------------------------------------------------------------------------------------
Route::resource('/pricing',PricingController::class);
// delete
Route::get('/pricing/delete/{id}',[PricingController::class,'pricing_delete'])->name('pricing.delete');
Route::post('/pricing/status/{id}',[PricingController::class,'pricing_status'])->name('pricing.status');
// to do list
Route::get('/todos',[ToDoController::class,'index'])->name('todo.index');

Route::post('/todos/store', [ ToDoController::class, 'store'])->name('todo.store');
Route::get('/todo/delete/{id}',[ToDoController::class,'todo_delete'])->name('todo.delete');




