<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/products', [StoreController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [StoreController::class, 'show'])->name('product.show');
Route::get('/cart', [StoreController::class, 'cart'])->name('cart');
Route::get('/about', [StoreController::class, 'about'])->name('about');
Route::get('/contact', [StoreController::class, 'contact'])->name('contact');
Route::get('/shopcart', [ShopController::class, 'cart'])->name('shopcart.cart');
Route::get('/shop/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::get('/product/{id}', [ShopController::class, 'details'])->name('product.details');
// Route::get('/shop/product-details', [ShopController::class, 'details'])->name('product.details');