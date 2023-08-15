<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialiteController;
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

// Route::get('/', function () {
//     return view('pages.index');
// })->middleware('auth');

Route::controller(PostController::class)->group(function () {
    
    Route::middleware('auth')->group(function () {
        Route::get('/' , 'index')->name('post-homepage');
        Route::get('/post/create' , 'create')->name('post-create');
        Route::post('/post/create' , 'store')->name('post-store');
        Route::post('/post/image/upload' , 'ckimageUploader')->name('ckeditor.upload');

    });

});

Route::controller(SocialiteController::class)->group(function () {
    Route::get('/auth/google' , 'redirectToGoogle')->name('google-auth')->middleware('guest');
    Route::get('/callback/google' , 'googleCallback')->name('google-callback');
});

// Route::controller(ProfileController::class)->group(function (){

//     Route::middleware('auth')->group(function () {
//         Route::get('/profile' , 'index')->name('profile');
//     });
// });

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile' , 'index')->name('profile');
});