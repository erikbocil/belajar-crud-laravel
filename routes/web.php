<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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

Route::group(['middleware' => 'already-login'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', [AuthController::class, 'login'])->name('home');
        Route::get('/login', [AuthController::class, 'login'])->name('login.page');
    });
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user');
    Route::get('/register', [AuthController::class, 'register'])->name('register.page');
    Route::post('/register', [AuthController::class, 'registeruser'])->name('register.user');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('book', BookController::class)->middleware('auth');
