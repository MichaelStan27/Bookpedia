<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\HeaderTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller {
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

        if ($headerTransaction->deliveryStatus->is('dikemas') && $headerTransaction->seller->id != $user->id) {
            abort(403);
        } else if ($headerTransaction->deliveryStatus->is('dikirim') && $headerTransaction->buyer->id != $user->id) {
            abort(403);
        }

        if ($headerTransaction->incrementDeliveryStatus()) {
            if ($headerTransaction->deliveryStatus->is('dikirim')) {
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

        if ($transaction->loanDetails->deliveryStatus->is('dikirim kembali') && $headerTransaction->seller->id != $user->id) {
            abort(403);
        } else if ($transaction->loanDetails->deliveryStatus->is('loan') && $headerTransaction->buyer->id != $user->id) {
            abort(403);
        }

        if ($transaction->loanDetails->incrementDeliveryStatus()) {
            if ($transaction->loanDetails->deliveryStatus->is('dikirim kembali')) {
                $transaction->loanDetails->update([
                    'return_date' => Carbon::now()
                ]);
            }
            $message = 'Item\'s status successfully updated';
        } else {
            $message = 'Cannot update item\'s status';
        }

        return redirect()->back()->with('message', $message);
    }
}
