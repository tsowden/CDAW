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



// Route::get('/home', [AccueilController::class, 'index'])->name('home');
// Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
// Route::get('/about', [AboutController::class, 'index'])->name('about');
// Route::get('/cv', [CvController::class, 'index'])->name('cv');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::get('/heroes', function () {
//     // Your logic here
// })->name('heroes');

// Route::get('/gallery', function () {
//     // Your logic here
// })->name('gallery');

// Route::get('/store', function () {
//     // Your logic here
// })->name('store');


