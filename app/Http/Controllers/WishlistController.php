<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller {
    public function store(Book $book) {
        $user = Auth::user();
        $wishlist = Wishlist::where('book_id', $book->id)->where('user_id', $user->id)->first();
        if (!$wishlist) {
            Wishlist::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
            ]);
            return redirect()->back()->with('message', 'Added to wishlist');
        }
        $wishlist->delete();
        return redirect()->back()->with('message', 'Deleted from wishlist');
    }

    public function delete_trash(){
        $trashes = auth()->user()->wishlistsTrashed()->get('wishlists.*');
        
        foreach($trashes as $wishlist){
            $wishlist = Wishlist::find($wishlist->id);
            $wishlist->delete();
        }

        return redirect()->back();
    }
}
