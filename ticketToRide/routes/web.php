<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\AboutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('accueil'); // Ensure this matches the view file name.
})->name('home'); // The route name can still be 'home'.





Route::get('/home', [AccueilController::class, 'index'])->name('accueil');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/cv', [CvController::class, 'index'])->name('cv');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/heroes', function () {
    // Your logic here
})->name('heroes');

Route::get('/gallery', function () {
    // Your logic here
})->name('gallery');

Route::get('/store', function () {
    // Your logic here
})->name('store');


