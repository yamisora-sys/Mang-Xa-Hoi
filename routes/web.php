<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
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
Route::get('/forum', [PostController::class, 'index'])->name('index');

Route::get('/newpost', [PostController::class, 'create'])->name('post.create');

Route::post('/store', [PostController::class, 'store'])->name('post.store');

Route::get('/viewpost/{post}', [PostController::class, 'show'])->name('post.show');

Route::post('/postcomment', [CommentsController::class, 'store'])->name('comment.store');

//facebook login
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [App\Http\Controllers\FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [App\Http\Controllers\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});


//like post

Route::post('like', [PostController::class, 'getlike']);
Route::post('like/{id}', [PostController::class, 'like']);
Route::post('dislike', [PostController::class, 'getDislike']);
Route::post('dislike/{id}', [PostController::class, 'dislike']);

//like comment
Route::post('likecomment', [CommentsController::class, 'getlike']);
Route::post('likecomment/{id}', [CommentsController::class, 'like']);
Route::post('dislikecomment', [CommentsController::class, 'getDislike']);
Route::post('dislikecomment/{id}', [CommentsController::class, 'dislike']);

Route::post('/storecomment', [CommentsController::class, 'store'])->name('comment.store');

Route::post('/bookmark', [BookmarkController::class, 'bookmark'])->name('bookmark');