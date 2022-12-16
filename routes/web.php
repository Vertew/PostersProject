<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, 'index']) -> name('users.index') -> middleware('auth');

Route::get('/users/create', [UserController::class, 'create']) -> name('users.create') -> middleware('auth');

Route::post('/users', [UserController::class, 'store']) -> name('users.store') -> middleware('auth');

Route::get('/users/{id}', [UserController::class, 'show']) -> name('users.show') -> middleware('auth');

Route::get('/login', [LoginController::class, 'show']) -> name('login');

Route::post('/login', [LoginController::class, 'authenticate']) -> name('login.authenticate');

Route::post('/login/logout', [LoginController::class, 'logout']) -> name('login.logout') -> middleware('auth');