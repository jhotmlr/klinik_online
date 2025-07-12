<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::resource('pasiens', PasienController::class);
