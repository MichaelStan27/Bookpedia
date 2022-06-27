<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
use App\Models\CartItem;
use App\Models\LoanTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller {
    public function checkout(Request $request) {
        $user = User::find(auth()->user()->id);
        
        if ($user->balance < $request->total) {
            return redirect()->route("cart")->with('checkout_fails', 'Insufficient Balance!</b>');
        }

        $cartItems = CartItem::where('user_id', $user->id)->get();

        foreach ($cartItems as $cartItem) {
            $seller = User::find($cartItem->book->user_id);
            $user->update([
                'balance' => ($user->balance - $request->total)
            ]);
            $date = Carbon::now();
            if ($cartItem->type_id == 1) {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->loan_price)
                ]);
                $transaction = new LoanTransaction();
                $transaction->book_id = $cartItem->book_id;
                $transaction->user_id = $cartItem->user_id;
                $transaction->deadline = $date->addWeeks($cartItem->duration);
                $transaction->loan_date = now();
                $transaction->return_date = NULL;
                $transaction->duration = $cartItem->duration;
                $cartItem->book->update([
                    'status_id' => 2
                ]);
                $transaction->save();
                $cartItem->delete();
            } else {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->sale_price)
                ]);
                $transaction = new BuyTransaction();
                $transaction->book_id = $cartItem->book_id;
                $transaction->user_id = $cartItem->user_id;
                $transaction->created_at = now();
                $transaction->updated_at = now();
                $transaction->save();
                $cartItem->delete();

                // DB::delete('delete from books where id = ?', [$transaction->book_id]);
            }
        }



        return redirect()->route("cart")->with('checkout_success', $request->count . ' book(s) has successfully been checked out!<br><b>Your total Payment : ' . $request->total . '</b><br> Your Balance: ' . $user->balance . '</b>');
    }
}
