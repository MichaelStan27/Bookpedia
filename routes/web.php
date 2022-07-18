<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function () {
    Route::controller(AccountController::class)->group(function () {
        Route::get('login', 'viewLogin')->name('login');
        Route::post('/login', 'login');

        Route::get('/register', 'viewRegister')->name('register');
        Route::post('/register', 'store');
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AccountController::class, 'logout']);

    Route::controller(BookController::class)->group(function () {
        Route::get('/add-book', 'add_book_form')->name('add-book');
        Route::post('/add-book', 'create');

        Route::get('/update-book/{book}', 'update_book_form')->name('update-book');
        Route::put('/update-book/{book}', 'update');

        Route::delete('/delete-book/{book}', 'destroy')->name('delete-book');
    });

    Route::controller(WishlistController::class)->group(function () {
        Route::post('/wishlist/{book}', 'store')->name('wishlist');
        Route::delete('/remove-wishlist', 'delete_trash')->name('wishlist.remove-trashed');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart');
        Route::post('/cart/{book}', 'add_to_cart');
        Route::delete('/cart/{cartItem}', 'destroy')->name('cart.destroy');
    });

    Route::get('/api/cart-container', [CartController::class, 'cartContainer']);

    Route::controller(TransactionController::class)->group(function () {
        Route::get('/user/orders', 'orders')->name('orders');
        Route::get('/user/sales', 'sales')->name('sales');
        Route::post('/user/sales/header/{headerTransaction}', 'updateSaleHeader')->name('update-sale-header');
        Route::post('/user/sales/item/{transaction}', 'updateSaleItem')->name('update-sale-item');
        Route::post('/checkout', 'checkout')->name('checkout');
    });
});

// Can be accessed by all users
Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/search', 'search')->name('search');
});

Route::get('/book/{book}', [BookController::class, 'viewBookDetail'])->name('book-detail');

Route::get('/user/{user}/profile', [ProfileController::class, 'userProfile'])->name('profile');
