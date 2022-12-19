<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;

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
