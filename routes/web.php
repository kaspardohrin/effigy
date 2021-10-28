<?php

use Illuminate\Support\Facades\Route;

// generic controller
use App\Http\Controllers\PagesController;

// posts controllers
use App\Http\Controllers\PostsController;

// comments controllers
use App\Http\Controllers\CommentsController;

// likes controllers
use App\Http\Controllers\LikesController;

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

Auth::routes();

Route::get('/', [PagesController::class, 'index']);

Route::resource('/posts', PostsController::class);
Route::get('/posts/{id}', [CommentsController::class, 'index']);

Route::resource('/comments', CommentsController::class);

Route::resource('/likes', LikesController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
