<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',[HomeController::class,'index'])->name('home.index');
Route::get('login',[HomeController::class,'login'])->name('home.login');
Route::post('login',[HomeController::class,'loginauth'])->name('home.loginauth');
Route::get('register',[HomeController::class,'register'])->name('home.register');
Route::post('register',[HomeController::class,'store'])->name('home.store');
Route::get('payment',[TransferController::class,'index'])->name('payment.index');
Route::post('payment',[TransferController::class,'store'])->name('payment.store');
Route::post('request',[RequestController::class,'store'])->name('request.store');
Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
Route::put('profile',[ProfileController::class,'update'])->name('profile.update');