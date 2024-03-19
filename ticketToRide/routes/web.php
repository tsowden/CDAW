<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('accueil'); 
})->name('home'); 


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/play', [GameController::class, 'index'])->name('play');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');




