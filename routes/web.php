<?php

use App\Http\Middleware\ValidUser;
use App\Http\Middleware\NotLoggedIn;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Middleware\EnsureEmailIsVerified;

Route::view('verifyemail','/verifyemail')->name('verifyemail');
// Route::view('emails/notverified','/notverified')->name('notverifyemail');

// EmailVerificationController
Route::get('/emails/verify/{token}', [EmailVerificationController::class, 'verify'])->name('verify.email');




// UserController
Route::middleware(['ok-user'])->group(function(){

    Route::controller(UserController::class)->group(function(){

        Route::get('/addpost','addPostPage')->name('addpost');
        Route::get('/update','updatePostPage')->name('update');
        Route::get('/allposts','allPostsPage')->name('allposts');
        Route::get('/viewpost','viewPostPage')->name('viewpost');
        Route::get('/updateById','updateById')->name('updateById');
        Route::get('/dashboard','dashboardPage')->name('dashboard');
        Route::get('/allusers','showAllUsersPage')->name('allusers');
        Route::post('/addcategory','addcategory')->name('addcategory');
        Route::get('/deletebyid','deletePostPage')->name('deletebyid');
        Route::get('/categories','showCategoriesPage')->name('categories');
        Route::delete('/deleteUser/{id}','destroyUser')->name('deleteUser');
        Route::get('/destroyCategory/{id}','destroyCategory')->name('destroyCategory');
        Route::get('/categories/addcategory','showAddCategoryPage')->name('addcategorypage');
    
    });

});



// UserController
Route::controller(UserController::class)->group(function(){

    Route::get('/','showLoginForm')->name('loginPage');
    Route::get('/homepage','showHomePage')->name('homepage');
    Route::get('/homepage/postblog/','showPostBlogPage')->name('postblog');
    Route::get('/blogposts/{id}','showBlogPosts')->name('blogposts');
    Route::get('/register','showRegistrationForm')->name('registerPage');
    Route::post('/registerUser','register')->name('registerUser');
    Route::post('/loginMatch','login')->name('loginMatch');
    Route::get('/logoutUser','logout')->name('logoutUser');

});



// CommentController
Route::controller(CommentController::class)->group(function(){
    Route::post('/pushComment','pushComment')->name('pushComment');

    Route::middleware([ValidUser::class])->group(function(){
        Route::get('/comments','showComments')->name('comments');
        Route::delete('/destroyComment/{id}','destroyComment')->name('destroyComment');
    });
});


// PostController
Route::controller(PostController::class)->group(function(){

    Route::get('/showPostById','showPostById')->name('showPostById');
    Route::get('/showPostOnDelete','showPostOnDelete')->name('showPostOnDelete');
    Route::delete('/destroyById','destroyById')->name('destroyById');
    Route::resource('post', PostController::class);

})->middleware(ValidUser::class);




// GoogleController
Route::controller(GoogleController::class)->group(function(){

    Route::get('auth/google','redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback','handleGoogleCallback')->name('auth.google.callback');

});










