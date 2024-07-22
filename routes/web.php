<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;

Route::get('/homepage',[UserController::class,'showHomePage'])->name('homepage');
Route::get('/homepage/postblog',[UserController::class,'showPostBlogPage'])->name('postblog');
Route::get('/',[UserController::class,'showLoginForm'])->name('loginPage');
Route::get('/register',[UserController::class,'showRegistrationForm'])->name('registerPage');
Route::get('/addpost',[UserController::class,'addPostPage'])->name('addpost')->middleware(ValidUser::class);
Route::get('/allposts',[UserController::class,'allPostsPage'])->name('allposts')->middleware(ValidUser::class);
Route::get('/deletebyid',[UserController::class,'deletePostPage'])->name('deletebyid')->middleware(ValidUser::class);
Route::get('/update',[UserController::class,'updatePostPage'])->name('update')->middleware(ValidUser::class);
Route::get('/viewpost',[UserController::class,'viewPostPage'])->name('viewpost')->middleware(ValidUser::class);
Route::get('/dashboard',[UserController::class,'dashboardPage'])->name('dashboard')->middleware(ValidUser::class);
Route::get('/updateById',[UserController::class,'updateById'])->name('updateById')->middleware(ValidUser::class);


Route::post('/registerUser',[UserController::class,'register'])->name('registerUser');
Route::post('/loginMatch',[UserController::class,'login'])->name('loginMatch');
Route::get('/logoutUser',[UserController::class,'logout'])->name('logoutUser');

Route::get('/showPostById', [PostController::class,'showPostById'])->name('showPostById')->middleware(ValidUser::class);
Route::get('/showPostOnDelete', [PostController::class,'showPostOnDelete'])->name('showPostOnDelete')->middleware(ValidUser::class);
Route::delete('/destroyById', [PostController::class,'destroyById'])->name('destroyById')->middleware(ValidUser::class);
Route::resource('post', PostController::class)->middleware(ValidUser::class);


// Route for GoogleContoller methonds
Route::get('auth/google',[GoogleController::class,'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback'])->name('auth.google.callback');