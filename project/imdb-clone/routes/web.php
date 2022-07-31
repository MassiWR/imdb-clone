<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Auth;




/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::get('/', [MoviesController::class , 'index'])->name('movies.index');
Route::get('/movie/{id}', [MoviesController::class , 'show'])->name('movies.show');
Route::get('/menuMovies', [MoviesController::class , 'showMenu'])->name('menuMovies.showMenu');
Route::get('/watchlist', [MoviesController::class , 'watchlist'])->middleware('auth');

// show register/create form
Route::get('/register', [UserController::class , 'create']);

// Create new user
Route::post('/users', [UserController::class , 'store']);

// log user out
Route::post('/logout', [UserController::class , 'logout']);

// show login form
Route::get('/login', [UserController::class , 'login'])->name('login');

// log in user
Route::post('/users/authenticate', [UserController::class , 'authenticate']);

Route::post('/watchlists', [WatchlistController::class , 'store']);

Route::post('/addmovie', [MoviesController::class , 'add']);
