<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionManagementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewControllers;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;

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
    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout');
    });

    Route::middleware('guest')->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::get('login', 'viewLogin');
        Route::post('/register', 'store');
        Route::get('/register', 'viewRegister');
    });
});

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/search', [DashboardController::class, 'search'])->name('search');

Route::controller(BookController::class)->group(function () {
    Route::get('/add-book', 'add_book_form')->name('add-book');
    Route::post('/add-book', 'create');
    Route::get('/update-book/{id}', 'update_book_form')->name('update-book');
    Route::put('/update-book/{book}', 'update');
    Route::delete('/delete-book/{book}', 'destroy')->name('delete-book');
    Route::get('/book-detail/{book}', 'viewBookDetail')->name('book-detail');
});

Route::controller(WishlistController::class)->group(function () {
    Route::post('/wishlist/{book}', [WishlistController::class, 'store'])->name('wishlist')->middleware('auth');
    Route::delete('/remove-wishlist', [WishlistController::class, 'delete_trash'])->name('wishlist.remove-trashed');
});


Route::controller(TransactionManagementController::class)->middleware('auth')->group(function () {
    Route::get('/user/orders', 'orders')->name('orders');
});

// Route::get('/update-book/{id}', function(){
//     return view('update-book');
// });

Route::controller(CartController::class)->group(function () {
    Route::get('/your-cart', 'index')->name('cart');
    Route::delete('/your-cart/{cartItem}', 'destroy')->name('delete');
    Route::get('/api/cart-container', 'cartContainer');
    Route::post('/add-to-cart/{book}', 'add_to_cart')->middleware('auth');
    Route::delete('/trashed-cart', 'delete_trash')->middleware('auth')->name('cart.remove-trashed');
});

Route::get('/user/{user}/profile', [ProfileController::class, 'userProfile'])->name('profile');

Route::post('/checkout', [TransactionController::class, 'checkout'])->middleware('auth')->name('checkout');
