<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
use App\Models\CartItem;
use App\Models\LoanTransaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller {
    public function checkout(Request $request) {
        // return "hello";
        $user = User::find(auth()->user()->id);
        if ($user->balance < $request->total) {
            return redirect()->route("cart")->with('checkout_fails', 'Insufficient Balance!</b>');
        }

        $cartItems = CartItem::where('user_id', $user->id)->get();
        foreach ($cartItems as $cartItem) {
            if ($cartItem->transaction_type_id == 1) {
                $transaction = new LoanTransaction();
            } else {
                $transaction = new BuyTransaction();
                $transaction->book_id = $cartItem->book_id;
                $transaction->user_id = $cartItem->user_id;
                $transaction->created_at = now();
                $transaction->updated_at = now();
                $transaction->save();
                $cartItem->delete();
            }
        }
        $user->update([
            'balance' => ($user->balance - $request->total)
        ]);
        return redirect()->route("cart")->with('checkout_success', $request->count . ' book(s) has successfully been checked out!<br><b>Your total Payment : ' . $request->total . '</b><br> Your Balance: ' . $user->balance . '</b>');
    }
}
