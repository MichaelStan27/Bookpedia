<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Get successful transaction
        $sucessTrans = DB::table('detail_transactions')
            ->join('books', 'books.id', '=', 'detail_transactions.book_id')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->groupBy('users.id')
            ->select('users.id', DB::raw('count(users.id) as total_trans'))
            ->get();

        $sucessTrans = $sucessTrans->mapWithKeys(function ($item) {
            return [$item->id => $item->total_trans];
        });

        // Initialization 
        $user = auth()->user();
        $paginate = 9;

        // Base Query
        $query = User::with('city')
            ->join('cities', 'users.city_id', '=', 'cities.id');

        // Exclude auth user from query
        if ($user) $query = $query->where('users.id', '<>', $user->id);

        // Get keyword from searchbar
        $keyword = $request->query('keyword');

        $query = $query->where(function ($query) use ($keyword) {
            $query->Where('users.first_name', 'LIKE', "%$keyword%")
                ->orWhere('users.last_name', 'LIKE', "%$keyword%")
                ->orWhere('cities.city_name', 'LIKE', "%$keyword%");
        });

        return view('search-user', [
            'users' => $query->select('users.*')->paginate($paginate)->appends($request->query()),
            'userTrans' => $sucessTrans
        ]);
    }

    public function updateProfileForm(User $user) {
        return view('update-profile', [
            'cities' => City::all(),
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request, User $user) {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'digits_between:11,13', 'regex:/^[0][0-9]{10,12}/'],
            'city' => ['required', 'exists:cities,id'],
            'postal_code' => ['required', 'digits:5'],
            'detail_address' => ['required', 'min:10'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone,
            'city_id' => $request->city,
            'postal_code' => $request->postal_code,
            'detail_address' => $request->detail_address,
            'balance' => $user->balance,
            'email' => $request->email,
        ]);

        return redirect()->route('profile', $user)->with('message', 'Profile updated successfully');
    }
}
