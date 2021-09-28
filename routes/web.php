<?php

use Illuminate\Support\Facades\Route;

// generic controller
use App\Http\Controllers\PagesController;

// posts controllers
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{name}', [PostsController::class, 'detail'])->where('name', '[a-zA-Z-]+');