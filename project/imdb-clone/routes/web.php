<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\WatchlistController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::get('/', [MoviesController::class , 'index']);


Route::get('/movie/{id}', [MoviesController::class , 'show'])->name('movies.show');
Route::get('watchlist/{id}', [WatchlistController::class, 'store'])->name('watchlist.store');

