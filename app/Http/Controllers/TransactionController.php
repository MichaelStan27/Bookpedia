<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
use App\Models\CartItem;
use App\Models\LoanDetails;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class TransactionController extends Controller {
    public function checkout(Request $request) {
        $user = auth()->user();

        $cartItems = $user->cartItems;

        $cartTotal = $cartItems->reduce(function ($carry, $item) {
            if ($item->type_id == 1) {
                return $carry + $item->book->loan_price * $item->duration;
            } else {
                return $carry + $item->book->sale_price;
            }
        });

        $user->update([
            'balance' => ($user->balance - $cartTotal)
        ]);

        if ($user->balance < $cartTotal) {
            return redirect()->route("cart")->with('message', '<b>Insufficient Balance!</b>');
        }

        foreach ($cartItems as $cartItem) {
            $seller = $cartItem->book->user;

            $date = Carbon::now();

            $transaction = Transaction::create([
                'book_id' => $cartItem->book_id,
                'user_id' => $cartItem->user_id,
                'type_id' => $cartItem->type_id
            ]);

            if ($cartItem->type_id == 1) {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->loan_price)
                ]);

                LoanDetails::create([
                    'transaction_id' => $transaction->id,
                    'deadline' => $date->addWeeks($cartItem->duration),
                    'loan_date' => $date,
                    'return_date' => NULL,
                    'duration' => $cartItem->duration,
                ]);

                $cartItem->book->update([
                    'status_id' => 2
                ]);

                $cartItem->delete();
            } else {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->sale_price)
                ]);
                $cartItem->book()->delete();
                $cartItem->delete();
            }

            $cartItem->delete();
        }

        return redirect()->route("cart")->with('message', $cartItems->count() . ' book(s) has successfully been checked out!<br><b>Your total Payment : ' . $cartTotal . '</b><br> Your Balance: ' . $user->balance . '</b>');
    }
}
