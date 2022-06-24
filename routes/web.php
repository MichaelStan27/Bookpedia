<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewControllers;
use App\Http\Controllers\WishlistController;

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
    Route::get('login', 'viewLogin');
    Route::post('/logout', 'logout');
    Route::post('/register', 'store');
    Route::get('/register', 'viewRegister');
});

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/search', [DashboardController::class, 'search'])->name('search');

Route::controller(BookController::class)->group(function () {
    Route::get('/add-book', 'add_book_form')->name('add-book');
    Route::post('/add-book', 'create')->name('add-book');
    Route::get('/update-book/{id}', 'update_book_form')->name('update-book');
    Route::put('/update-book/{book}', 'update')->name('update-book');
    Route::get('/book-detail/{book}', 'viewBookDetail')->name('book-detail');
});

Route::post('/wishlist/{book}', [WishlistController::class, 'store'])->name('wishlist')->middleware('auth');

// Route::get('/update-book/{id}', function(){
//     return view('update-book');
// });

Route::controller(CartController::class)->group(function () {
    Route::get('/your-cart', 'index')->name('cart');
    Route::post('/add-to-cart/{book}', 'add_to_cart')->name('add-to-cart')->middleware('auth');
});

Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
