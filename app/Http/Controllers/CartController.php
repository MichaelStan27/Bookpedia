<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CartController extends Controller {
    public function index() {
        $user = auth()->user();

        //trash    
        $trashes = $user->cartItemsTrashed()
            ->with('book')->get('cart_items.*');

        foreach ($trashes as $cartItem) {
            $cartItem->delete();
        }

        //borrowed
        $borrowed = $user->cartItems()
            ->with('book')
            ->join('books', 'book_id', 'books.id')
            ->where('status_id', '2')
            ->get('cart_items.*');

        foreach ($borrowed as $cartItem) {
            $cartItem->delete();
        }

        //get valid cart item
        $cartItems = $user->cartItems()
            ->with('book')->get();

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
            ->with('trashes', $trashes)
            ->with('borrowed', $borrowed)
            ->with('cartItems', $cartItems)
            ->with('count', $count);
    }

    public function add_to_cart(Book $book, Request $request) {
        $user = auth()->user();

        $userCartItems = $user->cartItems()->where('book_id', $book->id)->first();
        if ($userCartItems) {
            return Response::json([
                'status' => 'FAIL',
                'toast' => view('partials.toast-notification')->with('message', 'This book already added to your cart before!')->render()
            ]);
        }
        if ($book->status_id == 2) {
            return Response::json([
                'status' => 'FAIL',
                'toast' => view('partials.toast-notification')->with('message', 'Book is currently not available!')->render()
            ]);
        }

        //Creating cartItem object
        $type = ($book->transaction_type_id == 3) ? $request->type : $book->transaction_type_id;

        CartItem::firstOrCreate([
            'book_id' => $book->id,
            'user_id' => $user->id,
            'type_id' => $type,
            'duration' => $type == 1 ? 1 : NULL
        ]);

        $cartQty = $user->cartItems()->count();

        return Response::json([
            'status' => 'OK',
            'cartQty' => $cartQty,
            'toast' => view('partials.toast-notification')->with('message', 'Added to cart!')->render()
        ]);
    }

    public function destroy(CartItem $cartItem) {
        $cartItem->delete();

        return redirect()->back()->with('message', 'Successfully removed from cart!');
    }

    public function cartContainer(Request $request) {
        $user = auth()->user();

        $item = $user->cartItems()->where('id', '=', $request->cartId);
        $toCheck = $item->first();

        if (isset($toCheck)) {
            $item->update([
                'duration' => $request->duration < 1 ? 1 : $request->duration
            ]);
        } else {
            return Response::json(['status' => 'ERROR', 'message' => 'Item not found'], 404);
        }

        $cartItems = $user->cartItems()->with('book')->get();

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
