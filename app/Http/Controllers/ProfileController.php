<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function userProfile(User $user) {

        $myBook = Book::where('user_id', '=', $user->id)
            ->latest()->paginate(6);

        $wishlist = Wishlist::with(['book', 'user'])->where('user_id', '=', $user->id)
            ->take(4)->get();

        return view('profile', ["Users" => $user, "Books" => $myBook, "Wishlist" => $wishlist]);
    }
}
