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

    public function searchUser(Request $request) {
        // Initialization 
        $user = auth()->user();
        $paginate = 9;

        // Base Query
        $query = User::with('city')
            ->join('cities', 'users.city_id', '=', 'cities.id');

        // Exclude auth user from query
        $query = $query->where('users.id', '<>', $user->id);

        // Get keyword from searchbar
        $keyword = $request->query('keyword');

        $query = $query->where(function ($query) use ($keyword) {
            $query->Where('users.first_name', 'LIKE', "%$keyword%")
                ->orWhere('users.last_name', 'LIKE', "%$keyword%")
                ->orWhere('cities.city_name', 'LIKE', "%$keyword%");
        });

        return view('search-user', [
            'users' => $query->select('users.*')->paginate($paginate)->appends($request->query())
        ]);
    }
}
