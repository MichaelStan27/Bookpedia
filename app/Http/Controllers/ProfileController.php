<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function userProfile(Request $request, User $user) {

        $myBook = $user->books()
            ->with(['transactionType', 'category', 'user'])
            ->latest()
            ->paginate(6, ['*'], 'booksPage')
            ->appends($request->all());

        $wishlist = $user->wishlists()
            ->with(['book.transactionType', 'book.category', 'book.user'])
            ->paginate(4, ['*'], 'wishlistPage')
            ->appends($request->all());

        $wishlist_trash = $user->wishlistsTrashed()
            ->with(['book.transactionType', 'book.category', 'book.user'])
            ->get();

        return view('profile', [
            "user" => $user, 
            "books" => $myBook, 
            "wishlist" => $wishlist,
            "trashes" => $user->wishlistsTrashed
        ]);
    }
}
