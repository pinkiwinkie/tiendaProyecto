<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::group(["middleware" => "auth"], function () {
  Route::get('/', [ProductController::class, 'index'])->name("home");

  Route::get('logout', [LoginController::class, 'logout'])->name('logout');
  Route::resource('cart', CartController::class);
  Route::resource('product', ProductController::class);
  Route::resource('order', OrderController::class);
});

Route::group(["middleware" => "roles:admin"], function () {
  Route::resource('user', UserController::class);
});

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);