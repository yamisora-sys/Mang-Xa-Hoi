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

Route::get('/show', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');