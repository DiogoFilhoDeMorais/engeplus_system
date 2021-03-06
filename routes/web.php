<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellingController;

Route::get('/', function () {
    return redirect()->route('login.index');
});

Route::resource('login', LoginController::class);

Route::post('authenticate', [
    LoginController::class, 
    'authenticate'
])->name('authenticate');

Route::resource('home', HomeController::class);

Route::resource('selling', SellingController::class);