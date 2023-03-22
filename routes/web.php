<?php

use App\Http\Controllers\auth\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\BougthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Only for logged
Route::middleware('auth')->group(function () {
  // Brands
  // read
  Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
  // create
  Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
  Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
  // update
  Route::get('/brands/edit/{brand:slug}', [BrandController::class, 'edit'])->name('brands.edit');
  Route::put('/brands/update/{brand:slug}', [BrandController::class, 'update'])->name('brands.update');
  // delete
  Route::delete('/brands/delete/{brand:slug}', [BrandController::class, 'destroy'])->name('brands.delete');
  // show
  Route::get('/brands/show/{brand:slug}', [BrandController::class, 'show'])->name('brands.show');


  // Products
  // read
  Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  // create
  Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
  Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
  // update
  Route::get('/products/edit/{product:slug}', [ProductController::class, 'edit'])->name('products.edit');
  Route::put('/products/update/{product:slug}', [ProductController::class, 'update'])->name('products.update');
  // delete
  Route::delete('/products/delete/{product:slug}', [ProductController::class, 'destroy'])->name('products.delete');
  // show
  Route::get('/products/show/{product:slug}', [ProductController::class, 'show'])->name('products.show');
  // buy
  Route::post('/products/buy/{product:slug}', [BougthController::class, 'buy'])->name('products.buy');
  // bought
  Route::get('/products/bougth/{user:email}', [BougthController::class, 'bougth'])->name('products.bougth');

  // Logout
  Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
  // Dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Only for guest
Route::middleware('guest')->group(function () {
  // Login
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'login'])->name('login.post');
  // Register
  Route::get('/register', [RegisterController::class, 'index'])->name('register');
  Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

// Explore
Route::get('/explore', [ExploreController::class, 'index'])->name('explore');
// Landing
Route::get('/', [LandingController::class, 'index'])->name('landing');
