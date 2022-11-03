<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\AdminMenuController;
use Illuminate\Support\Facades\Route;


Route::get('/food-delivery', function () {
    return view('home');
})->name('home');

Route::group(['middleware'=>'guest'], function(){
    Route::get('food-delivery/register', [UserController::class, 'create'])->name('register.create');
    Route::post('food-delivery/register', [UserController::class, 'store'])->name('register.store');
    Route::get('food-delivery/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('food-delivery/login', [UserController::class, 'login'])->name('login');
});

Route::group(['prefix'=>'food-delivery/admin', 'middleware'=>'admin'],function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::resource('/menu', AdminMenuController::class);
});

Route::get('/food-delivery/menu', [MenuController::class, 'showAll'])->name('menu');

Route::get('food-delivery/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

