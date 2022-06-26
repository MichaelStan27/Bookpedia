<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function index() {
        $cartItems = auth()->user()->cartItems;

        $cartTotal = $cartItems->reduce(function ($carry, $item) {
            if ($item->type_id == 1) {
                return $carry + $item->book->loan_price * $item->duration;
            } else {
                return $carry + $item->book->sale_price;
            }
        });

        $count = [
            'counter' => $cartItems->count(),
            'total' => 'IDR ' . number_format($cartTotal),
        ];

        return view('cart')
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }

    public function add_to_cart(Book $book, Request $request) {
        $type = ($book->transaction_type_id == 3) ? $request->type : $book->transaction_type_id;
        CartItem::firstOrCreate([
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
            'type_id' => $type,
        ]);
        return redirect()->back()->with('message', 'Added to cart');
    }


    public function destroy(CartItem $cartItem) {
        // return dd($cartItem);
        $title = $cartItem->book->title;

        $cartItem->delete();
        return redirect(route("cart"))->with('message', 'Book <b>"' . $title . '"</b> has successfully been deleted from your cart!');
    }
}
