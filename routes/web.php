<?php

use App\Http\Controllers\UserController;
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

Route::get('food-delivery/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

