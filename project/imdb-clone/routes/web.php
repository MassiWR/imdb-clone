<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;


/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */
Route::get('/', [MoviesController::class , 'index'])->name('movies.index');
Route::get('/movie/{id}', [MoviesController::class , 'show'])->name('movies.show');

Route::post('/save', [AuthController::class , 'save'])->name('auth.save');
Route::post('/check', [AuthController::class , 'check'])->name('auth.check');
Route::get('/logout', [AuthController::class , 'logout'])->name('auth.logout');

Route::group(['middleware' => ['AuthCheck']], function () {

    Route::get('/profile', [AuthController::class , 'profile']);
    Route::get('/login', [AuthController::class , 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class , 'register'])->name('auth.register');

});
