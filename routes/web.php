<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('login', LoginController::class);

Route::post('authenticate', [
    LoginController::class, 
    'authenticate'
])->name('authenticate');

Route::resource('home', HomeController::class);