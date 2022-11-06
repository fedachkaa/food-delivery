<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'food-delivery'], function (){
    Route::get('/',  [MenuController::class, 'showAll'])->name('menu');
    Route::get('contacts', function () {
        return view('contacts');
    })->name('contacts');
    Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');
    Route::post('/menu', [CartController::class, 'addToCart'])->name('addToCart');
    Route::post('/cart-confirmed', [CartController::class, 'confirmOrder'])->name('confirmOrder');
    Route::get('/menu/{category}', [MenuController::class, 'showCategory'])->name('showCategory');

    Route::group(['middleware'=>'guest'], function(){
        Route::get('/register', [UserController::class, 'create'])->name('register.create');
        Route::post('/register', [UserController::class, 'store'])->name('register.store');
        Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
        Route::post('/login', [UserController::class, 'login'])->name('login');
    });

    Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

});


Route::group(['prefix'=>'food-delivery/admin', 'middleware'=>'admin'],function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/menu', AdminMenuController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('/orders', [OrderController::class, 'showOrders'])->name('showOrders');
    Route::get('/orders/{id}', [OrderController::class, 'orderInfo'])->name('orderInfo');
    Route::post('/orders/{id}', [OrderController::class, 'takeOrder'])->name('takeOrder');
    Route::get('/clients', [AdminController::class, 'showClients'])->name('showClients');
});



