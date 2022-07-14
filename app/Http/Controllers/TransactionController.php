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
        
        //Check for validate cart items
        $trashes = $user->cartItemsTrashed()
            ->with('book')->get('cart_items.*');

        $borrowed = $user->cartItems()
            ->with('book')
            ->join('books', 'book_id', 'books.id')
            ->where('status_id', '2')
            ->get('cart_items.*');  

        if(!$trashes->isEmpty() || !$borrowed->isEmpty()){
            return redirect()->back();
        }

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
                    'delivery_status_id' => 3,
                    'deadline' => NULL,
                    'loan_date' => NULL,
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

        return redirect()
            ->back()
            ->with('message', $cartItems->count() . ' book(s) has successfully been checked out!<br>Your total Payment :<b> IDR ' . number_format($cartTotal) . '</b><br> Your Balance:<b> IDR  ' . number_format($user->balance) . '</b>');
    }
}
