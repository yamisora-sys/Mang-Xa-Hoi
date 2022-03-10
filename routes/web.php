<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth/login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){
    return redirect()->route('index');
});
Route::get('/forum', [App\Http\Controllers\PostController::class, 'index'])->name('index');

Route::get('/newpost', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

Route::get('/viewpost/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::post('/postcomment', [App\Http\Controllers\CommentsController::class, 'store'])->name('comment.store');

//facebook login
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [App\Http\Controllers\FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [App\Http\Controllers\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});


//like post

Route::post('like', [App\Http\Controllers\PostController::class, 'getlike']);
Route::post('like/{id}', [App\Http\Controllers\PostController::class, 'like']);
Route::post('dislike', [App\Http\Controllers\PostController::class, 'getDislike']);
Route::post('dislike/{id}', [App\Http\Controllers\PostController::class, 'dislike']);

//like comment
Route::post('likecomment', [App\Http\Controllers\CommentsController::class, 'getlike']);
Route::post('likecomment/{id}', [App\Http\Controllers\CommentsController::class, 'like']);
Route::post('dislikecomment', [App\Http\Controllers\CommentsController::class, 'getDislike']);
Route::post('dislikecomment/{id}', [App\Http\Controllers\CommentsController::class, 'dislike']);
