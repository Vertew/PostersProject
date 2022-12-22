<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'show']) -> name('login');

Route::post('/login', [LoginController::class, 'authenticate']) -> name('login.authenticate');

Route::post('/login/logout', [LoginController::class, 'logout']) -> name('login.logout') -> middleware('auth');

Route::get('/users', [UserController::class, 'index']) -> name('users.index') -> middleware('auth');

Route::get('/users/create', [UserController::class, 'create']) -> name('users.create');

Route::post('/users', [UserController::class, 'store']) -> name('users.store');

Route::get('/users/{id}', [UserController::class, 'show']) -> name('users.show') -> middleware('auth');

Route::get('/posts', [PostController::class, 'index']) -> name('posts.index') -> middleware('auth');

Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create') -> middleware('auth');

Route::post('/posts', [PostController::class, 'store']) -> name('posts.store') -> middleware('auth');

Route::get('/posts/{id}', [PostController::class, 'show']) -> name('posts.show') -> middleware('auth');

Route::delete('/posts/{id}', [PostController::class, 'destroy']) -> name('posts.destroy') -> middleware('auth');

Route::get('/posts/edit/{id}', [PostController::class, 'edit']) -> name('posts.edit') -> middleware('auth');

Route::post('/posts/update/{id}', [PostController::class, 'update']) -> name('posts.update') -> middleware('auth');

Route::get('/profiles/{id}', [ProfileController::class, 'show']) -> name('profiles.show') -> middleware('auth');

Route::get('/comments/{id}', [CommentController::class, 'show']) -> name('comments.show') -> middleware('auth');

Route::delete('/comments/{id}', [CommentController::class, 'destroy']) -> name('comments.destroy') -> middleware('auth');

Route::get('/comments/edit/{id}', [CommentController::class, 'edit']) -> name('comments.edit') -> middleware('auth');

Route::post('/comments/update/{id}', [CommentController::class, 'update']) -> name('comments.update') -> middleware('auth');
