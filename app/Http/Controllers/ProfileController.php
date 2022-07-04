<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function userProfile(Request $request, User $user) {

        $myBook = $user->books()
            ->with(['transaction', 'category', 'user'])
            ->latest()
            ->paginate(9, ['*'], 'booksPage')
            ->appends($request->all());

        $wishlist = $user->wishlists()
            ->with(['book.transaction', 'book.category', 'book.user'])
            ->paginate(4, ['*'], 'wishlistPage')
            ->appends($request->all());

        return view('profile', ["user" => $user, "books" => $myBook, "wishlist" => $wishlist]);
    }
}
