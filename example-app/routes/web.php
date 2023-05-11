<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/home',[HomeController::class, 'index'])->name('home.index');

Route::get('/guestbook', [GuestBookController::class, 'index'])->name('guestbook.index');
Route::post('/guestbook', [GuestBookController::class, 'store'])->name('guestbook.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register/login', [RegisterController::class, 'register'])->name('register.login');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/login', [LoginController::class, 'login']);

Auth::routes();

Route::group(['middleware' => ['redirect']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});


