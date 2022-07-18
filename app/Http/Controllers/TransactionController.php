<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\HeaderTransaction;
use App\Models\LoanDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        if (!$trashes->isEmpty() || !$borrowed->isEmpty()) {
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
            } else {
                $seller->update([
                    'balance' => ($seller->balance + $cartItem->book->sale_price)
                ]);
                $cartItem->book()->delete();
            }

            $cartItem->delete();
        }

        return redirect()
            ->back()
            ->with('message', $cartItems->count() . ' book(s) has successfully been checked out!<br>Your total Payment :<b> IDR ' . number_format($cartTotal) . '</b><br> Your Balance:<b> IDR  ' . number_format($user->balance) . '</b>');
    }

    public function orders(Request $request) {

        $target = $request->query('tab') ?? 'ondelivery';

        $user = auth()->user();

        switch ($target) {
            case 'finish':
                $orders = $user->buyHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->where('header_transactions.delivery_status_id', '=', 3)
                    ->orderBy('created_at', 'DESC')
                    ->get();
                break;

            case 'onloan':
                $orders = DetailTransaction::with(['loanDetails', 'headerTransaction', 'book', 'transactionType'])
                    ->join('header_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->join('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where('header_transactions.buyer_id', '=', $user->id)
                    ->whereBetween('loan_details.delivery_status_id', [4, 5])
                    ->orderBy('created_at', 'DESC')
                    ->get('detail_transactions.*');
                break;

            case 'ondelivery':
            default:
                $orders = $user->buyHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->where('header_transactions.delivery_status_id', '<', 3)
                    ->orderBy('created_at', 'DESC')
                    ->get();
                break;
        }

        return view('my-orders', ['groupedOrders' => $orders, 'target' => $target]);
    }

    public function sales(Request $request) {

        $target = $request->query('tab') ?? 'ondelivery';

        $user = auth()->user();

        switch ($target) {
            case 'finish':
                $sales = $user->sellHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->where('header_transactions.delivery_status_id', '=', 3)
                    ->orderBy('created_at', 'DESC')
                    ->get();
                break;

            case 'onloan':
                $sales = DetailTransaction::with(['loanDetails', 'headerTransaction', 'book', 'transactionType'])
                    ->join('header_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->join('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where('header_transactions.seller_id', '=', $user->id)
                    ->whereBetween('loan_details.delivery_status_id', [4, 5])
                    ->orderBy('created_at', 'DESC')
                    ->get('detail_transactions.*');
                break;

            case 'ondelivery':
            default:
                $sales = $user->sellHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->where('header_transactions.delivery_status_id', '<', 3)
                    ->orderBy('created_at', 'DESC')
                    ->get();
                break;
        }

        return view('my-sales', ['groupedSales' => $sales, 'target' => $target]);
    }

    public function updateSaleHeader(HeaderTransaction $headerTransaction) {
        $user = auth()->user();

        if ($headerTransaction->deliveryStatus->is('being packaged') && $headerTransaction->seller->id != $user->id) {
            abort(403);
        } else if ($headerTransaction->deliveryStatus->is('shipped') && $headerTransaction->buyer->id != $user->id) {
            abort(403);
        }

        if ($headerTransaction->incrementDeliveryStatus()) {
            if ($headerTransaction->deliveryStatus->is('shipped')) {
                $headerTransaction
                    ->getLoanTransaction()
                    ->each(function ($item) {
                        $loanInfo = $item->loanDetails;
                        $loanInfo->update([
                            'delivery_status_id' => $loanInfo->delivery_status_id + 1,
                            'loan_date' => Carbon::now(),
                            'deadline' => Carbon::now()->addWeeks($loanInfo->duration)
                        ]);
                    });
            }
            $message = 'Item\'s status successfully updated';
        } else {
            $message = 'Cannot update item\'s status';
        }

        return redirect()->back()->with('message', $message);
    }

    public function updateSaleItem(DetailTransaction $transaction) {
        $user = auth()->user();

        $headerTransaction = $transaction->headerTransaction;

        if ($transaction->loanDetails->deliveryStatus->is('shipped back') && $headerTransaction->seller->id != $user->id) {
            abort(403);
        } else if ($transaction->loanDetails->deliveryStatus->is('loan') && $headerTransaction->buyer->id != $user->id) {
            abort(403);
        }

        if ($transaction->loanDetails->incrementDeliveryStatus()) {
            if ($transaction->loanDetails->deliveryStatus->is('shipped back')) {
                $transaction->loanDetails->update([
                    'return_date' => Carbon::now()
                ]);
                $transaction->book->update([
                    'status_id' => 1
                ]);
            }
            $message = 'Item\'s status successfully updated';
        } else {
            $message = 'Cannot update item\'s status';
        }

        return redirect()->back()->with('message', $message);
    }
}
