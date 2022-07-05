<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

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

Route::name('auth.')->group(function () {
    Route::get('/register', [AuthController::class, 'register_show'])->name('register');
    Route::post('/register', [AuthController::class, 'register_perform'])->name('register');
    Route::get('/login', [AuthController::class, 'login_show'])->name('login');
    Route::post('/login', [AuthController::class, 'login_perform'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/password', [AuthController::class, 'password_show'])->name('password');
    Route::post('/password', [AuthController::class, 'password_update'])->name('password');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);
});
