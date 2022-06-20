<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewControllers;



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

// Route::get('/{view?}', [ViewControllers::class, 'index']);

Route::controller(AccountController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
    Route::post('/register', 'store');
});

Route::get('/', fn () => view('dashboard'));
Route::get('/search', fn () => view('search'));
Route::controller(BookController::class)->name('crud-book')->group(function () {
    Route::get('/add-book', 'add_book_form');
    Route::post('/add-book', 'create');
});

// Route::get('/your-cart', function(){
//     return view('cart');
// });

Route::get('/your-cart', [CartController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'profile']);
