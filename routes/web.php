<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/food-delivery', [MenuController::class, 'showAll'])->name('menu');
Route::get('/food-delivery/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/food-delivery/cart', [CartController::class, 'showCart'])->name('showCart');
Route::post('/food-delivery/menu', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/food-delivery/cart-confirmed', [CartController::class, 'confirmOrder'])->name('confirmOrder');

Route::group(['middleware'=>'guest'], function(){
    Route::get('food-delivery/register', [UserController::class, 'create'])->name('register.create');
    Route::post('food-delivery/register', [UserController::class, 'store'])->name('register.store');
    Route::get('food-delivery/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('food-delivery/login', [UserController::class, 'login'])->name('login');
});

Route::group(['prefix'=>'food-delivery/admin', 'middleware'=>'admin'],function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/menu', AdminMenuController::class);
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('showOrders');
    Route::get('/orders/{id}', [OrderController::class, 'orderInfo'])->name('orderInfo');
    Route::post('/orders/{id}', [OrderController::class, 'takeOrder'])->name('takeOrder');
});


Route::get('food-delivery/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

