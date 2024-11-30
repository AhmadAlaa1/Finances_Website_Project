<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',[HomeController::class,'index'])->name('home.index');
Route::get('login',[HomeController::class,'login'])->name('home.login');
Route::post('login',[HomeController::class,'loginauth'])->name('home.loginauth');
Route::get('register',[HomeController::class,'register'])->name('home.register');
Route::post('register',[HomeController::class,'store'])->name('home.store');
Route::get('payment',[PaymentController::class,'index'])->name('payment.index');

