<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Category;

Route::get('/', function () {
    return view('welcome');
});

// Products Routing
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product/edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

// Customers Routing
Route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.delete');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'proccessLogin'])->name('login.process');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Cart API Routing
Route::post('/cart/add', [CartController::class, 'adminAddToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateQuantity']);
Route::delete('/cart/{cart}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Cart Routing
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//Route::get('about', function () {
//    return view('about');
//});
