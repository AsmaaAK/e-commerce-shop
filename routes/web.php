<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Mail\WelcomeEmail;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Mail;

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
Route::get('/product/{id?}', [ShopController::class, 'details'])->name('product.details');
// Route::get('/shop/product-details', [ShopController::class, 'details'])->name('product.details');
Route::get('/admin',[ProductController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products/stot',[ProductController::class,'store'])->name('products.store');
Route::get('/products/show/{id}',[ProductController::class,'show'])->name('products.show');
Route::get('/products/{id?}/edit',[ProductController::class,'edit'])->name('products.edit');
Route::put('/products/{id}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/delete/{id}',[ProductController::class,'destroy'])->name('products.destroy');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/test-mail', function () {
    Mail::to('test@example.com')->send(new WelcomeEmail());
    return "Welcome Email Sent!";
});

Route::get('/test-notification', function () {
    $user = \App\Models\User::first();
    $user->notify(new NewOrderNotification());
    return "Notification Sent!";
});
