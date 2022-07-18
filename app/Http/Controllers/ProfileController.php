<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {
    public function userProfile(Request $request, User $user) {

        // check trashed
        $loggedInUser = auth()->user();
        if ($loggedInUser && $loggedInUser->id == $user->id) {
            $trashes = $user->wishlistsTrashed()
                ->with(['book.transactionType', 'book.category', 'book.user'])
                ->get('wishlists.*');

            foreach ($trashes as $wishlist) {
                $wishlist->delete();
            }
        }

        $myBook = $user->books()
            ->with(['transactionType', 'category', 'user'])
            ->latest()
            ->paginate(6, ['*'], 'booksPage')
            ->appends($request->all());

        $wishlist = $user->wishlists()
            ->with(['book.transactionType', 'book.category', 'book.user'])
            ->paginate(4, ['*'], 'wishlistPage')
            ->appends($request->all());

        return view('profile', [
            "user" => $user,
            "books" => $myBook,
            "wishlist" => $wishlist,
            "trashes" => $trashes ?? false
        ]);
    }
}
