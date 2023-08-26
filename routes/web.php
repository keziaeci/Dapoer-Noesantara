<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');


Route::controller(PostController::class)->group(function () {
    
    Route::middleware('auth')->group(function () {
        Route::get('/' , 'index')->name('post-homepage');
        Route::get('/posts/{post}' , 'show')->name('post-detail');
        Route::get('/post/create' , 'create')->name('post-create');
        Route::get('/post/{post}/edit' , 'edit')->name('post-edit');

        Route::delete('/post/{post}' , 'destroy')->name('post-delete');
        Route::patch('/post/{post}/update' , 'update')->name('post-update');
        Route::post('/post/store' , 'store')->name('post-store');
        Route::post('/post/image/upload' , 'ckimageUploader')->name('ckeditor.upload');

    });

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories/{category}', 'show')->name('categories');
});


Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google' , 'redirectToGoogle')->name('google-auth')->middleware('guest');
    Route::get('/callback/google' , 'googleCallback')->name('google-callback');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile')->middleware('auth');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/posts/{post}/comment' , 'store')->name('comment-store');
});