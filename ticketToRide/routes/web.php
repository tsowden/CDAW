<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\CvController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\GameController;


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
    return view('accueil'); 
})->name('home'); 


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/play', [GameController::class, 'index'])->name('play');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    return view('welcome');
});

Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/cv', [CvController::class, 'index'])->name('cv')->middleware('auth');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');




Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::get('/game', [GameController::class, 'index'])->name('game');
Route::post('/game', [GameController::class, 'store'])->name('game.store');


Route::get('/games', [GameController::class, 'games'])->name('games');




Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';// Route::get('/chat', function () {
//     return view('chat');
// });
