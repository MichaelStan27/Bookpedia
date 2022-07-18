<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller {
    public function store(Book $book) {
        $user = auth()->user();

        $wishlist = $user->wishlists()->where('book_id', $book->id)->first();

        if (!$wishlist) {
            Wishlist::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
            ]);
            return redirect()->back()->with('message', 'Added to wishlist!');
        }

        $wishlist->delete();

        return redirect()->back()->with('message', 'Deleted from wishlist successfully!');
    }
}
