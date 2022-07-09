<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\HeaderTransaction;
use App\Models\LoanDetails;
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

        if ($user->balance < $cartTotal) {
            return redirect()->route("cart")->with('message', '<b>Insufficient Balance!</b>');
        }

        $user->update([
            'balance' => ($user->balance - $cartTotal)
        ]);

        $date = Carbon::now();

        foreach ($cartItems as $cartItem) {
            $seller = $cartItem->book->user;

            $transaction = HeaderTransaction::firstOrCreate([
                'buyer_id' => $user->id,
                'seller_id' => $seller->id,
                'delivery_status_id' => 1,
                'created_at' => $date
            ]);

            $detailTrans = DetailTransaction::create([
                'book_id' => $cartItem->book->id,
                'transaction_type_id' => $cartItem->type_id,
                'header_transaction_id' => $transaction->id
            ]);

            if ($cartItem->type_id == 1) {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->loan_price)
                ]);

                LoanDetails::create([
                    'detail_transaction_id' => $detailTrans->id,
                    'deadline' => NULL,
                    'loan_date' => NULL,
                    'return_date' => NULL,
                    'duration' => $cartItem->duration,
                ]);

                $cartItem->book->update([
                    'status_id' => 2
                ]);
            } else {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->sale_price)
                ]);
            }

            $cartItem->delete();
        }

        return redirect()
            ->route("cart")
            ->with('message', $cartItems->count() . ' book(s) has successfully been checked out!<br><b>Your total Payment : ' . $cartTotal . '</b><br> Your Balance: ' . $user->balance . '</b>');
    }
}
