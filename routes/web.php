<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/dashboard');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/store', [AuthenticationController::class, 'store'])->name('store');
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthenticationController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AuthenticationController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::resource('books', BookController::class);
