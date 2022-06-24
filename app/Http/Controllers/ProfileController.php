<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $myBook = Book::where('user_id', '=', auth()->user()->id)
            ->latest()->paginate(3);

        $wishlist = Wishlist::where('user_id', '=', auth()->user()->id)
            ->latest()->paginate(4);

        return view('profile', ["Books" => $myBook, "Wishlist" => $wishlist]);
    }

    // public function detailProfile($id)
    // {
    //     // $book = User::where('id', '=', $id);
    // }
}
