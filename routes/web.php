<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SocialiteController;
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

// Route::get('/', function () {
//     return view('home', ['title' => 'Home']);
// })->name('home');

Route::get('/', [UserController::class, 'login'])->name('login');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('login/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

// Untuk logout
Route::post('logout', [SocialiteController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');

Route::get('admin/dashboard', [ProductController::class, 'showData'])->name('admin.dashboard');
Route::get('admin/create', [ProductController::class, 'create'])->name('admin/create');
Route::post('store', [ProductController::class, 'store'])->name('admin/store');
Route::get('edit', [ProductController::class, 'edit'])->name('admin/edit');
Route::patch('update', [ProductController::class, 'update'])->name('admin/update');
Route::delete('destroy', [ProductController::class, 'destroy'])->name('admin.delete');
Route::get('home', [ProductController::class, 'index'])->name('home');
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('payment/{id}', [PaymentController::class, 'index'])->name('payment');
Route::post('payment/pay', [PaymentController::class, 'pay'])->name('payment.pay')->middleware('web');