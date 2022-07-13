<?php

namespace App\Http\Controllers;

use App\Models\HeaderTransaction;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller {
    public function orders(Request $request) {

        $target = $request->query('tab') ?? 'ongoing';

        $user = auth()->user();

        switch ($target) {
            case 'finish':
                $orders = $user->buyHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->join('detail_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->leftJoin('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where('header_transactions.delivery_status_id', '=', 3)
                    ->where(function ($query) {
                        return $query
                            ->where('detail_transactions.transaction_type_id', '=', 2)
                            ->orWhere(function ($query2) {
                                return $query2->where('detail_transactions.transaction_type_id', '=', 1)
                                    ->where('loan_details.delivery_status_id', '=', 5);
                            });
                    })
                    ->orderBy('created_at', 'DESC')
                    ->distinct()
                    ->get('header_transactions.*');
                break;

            case 'ongoing':
            default:
                $orders = $user->buyHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->join('detail_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->leftJoin('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where(function ($query) {
                        return $query->where(function ($query2) {
                            return $query2
                                ->where('header_transactions.delivery_status_id', '=', 3)
                                ->where('loan_details.delivery_status_id', '<', 5);
                        })->orWhere('header_transactions.delivery_status_id', '<', '3');
                    })
                    ->orderBy('created_at', 'DESC')
                    ->distinct()
                    ->get('header_transactions.*');
                break;
        }

        return view('my-orders', ['groupedOrders' => $orders, 'target' => $target]);
    }

    public function sales(Request $request) {

        $target = $request->query('tab') ?? 'ongoing';

        $user = auth()->user();

        switch ($target) {
            case 'finish':
                $sales = $user->sellHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->join('detail_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->leftJoin('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where('header_transactions.delivery_status_id', '=', 3)
                    ->where(function ($query) {
                        return $query
                            ->where('detail_transactions.transaction_type_id', '=', 2)
                            ->orWhere(function ($query2) {
                                return $query2->where('detail_transactions.transaction_type_id', '=', 1)
                                    ->where('loan_details.delivery_status_id', '=', 5);
                            });
                    })
                    ->orderBy('created_at', 'DESC')
                    ->distinct()
                    ->get('header_transactions.*');
                break;

            case 'ongoing':
            default:
                $sales = $user->sellHeaderTransactions()
                    ->with(['deliveryStatus', 'seller', 'buyer'])
                    ->join('detail_transactions', 'detail_transactions.header_transaction_id', '=', 'header_transactions.id')
                    ->leftJoin('loan_details', 'loan_details.detail_transaction_id', '=', 'detail_transactions.id')
                    ->where(function ($query) {
                        return $query->where(function ($query2) {
                            return $query2
                                ->where('header_transactions.delivery_status_id', '=', 3)
                                ->where('loan_details.delivery_status_id', '<', 5);
                        })->orWhere('header_transactions.delivery_status_id', '<', '3');
                    })
                    ->orderBy('created_at', 'DESC')
                    ->distinct()
                    ->get('header_transactions.*');
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
            $message = 'Item\'s status successfully updated';
        } else {
            $message = 'Cannot update item\'s status';
        }

        return redirect()->back()->with('message', $message);
    }
}
