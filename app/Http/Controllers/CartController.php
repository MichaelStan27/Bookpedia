<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
            'total' => $cartTotal,
        ];

        return view('cart')
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }

    public function add_to_cart(Book $book, Request $request) {
        // return $book->status_id;
        if ($book->status_id == 2) {
            return redirect()->back()->with('message', 'Book is currently not available');
        }
        $type = ($book->transaction_type_id == 3) ? $request->type : $book->transaction_type_id;
        if ($type == 1) {
            CartItem::firstOrCreate([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id,
                'type_id' => $type,
                'duration' => 1
            ]);
        } else {
            CartItem::firstOrCreate([
                'book_id' => $book->id,
                'user_id' => Auth::user()->id,
                'type_id' => $type,
                'duration' => NULL
            ]);
        }

        return redirect()->back()->with('message', 'Added to cart');
    }


    public function destroy(CartItem $cartItem) {
        $title = $cartItem->book->title;

        $cartItem->delete();
        return redirect(route("cart"))->with('message', 'Book <b>"' . $title . '"</b> has successfully been deleted from your cart!');
    }

    public function cartContainer(Request $request) {
        $item = auth()->user()->cartItems()->where('id', '=', $request->cartId);
        $toCheck = $item->first();

        if (isset($toCheck)) {
            $item->update([
                'duration' => $request->duration < 1 ? 1 : $request->duration
            ]);
        } else {
            return Response::json(['status' => 'ERROR', 'message' => 'Item not found'], 404);
        }

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
            'total' => $cartTotal
        ];

        return Response::json([
            'status' => 'OK',
            'cartItems' => view('partials.cart-item-container')->with('cartItems', $cartItems)->render(),
            'cartTotal' => view('partials.cart-total-container')->with('count', $count)->render()
        ]);
    }
}
