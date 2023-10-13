<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceOrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Models\User;
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


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::put('/users/password-update/{id}', [UserController::class, 'passwordUpdate'])->name('user.password-update');
    Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customer.store');

    Route::get('/service-orders', [ServiceOrderController::class, 'index'])->name('so.index');
    Route::get('/service-orders/create', [ServiceOrderController::class, 'create'])->name('so.create');
    Route::post('/service-orders/store', [ServiceOrderController::class, 'store'])->name('so.store');
    Route::get('/service-orders/{id}', [ServiceOrderController::class, 'show'])->name('so.show');
    Route::get('/service-orders/{id}/edit', [ServiceOrderController::class, 'edit'])->name('so.edit');
    Route::put('/service-orders/update/{id}', [ServiceOrderController::class, 'update'])->name('so.update');
    Route::delete('/service-orders/destroy/{id}', [ServiceOrderController::class, 'destroy'])->name('so.destroy');

    Route::get('/generate-pdf', [PdfController::class, 'generatePdf'])->name('so.print');

});