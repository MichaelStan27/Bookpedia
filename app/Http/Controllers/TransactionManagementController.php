<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionManagementController extends Controller {
    public function orders() {

        $user = auth()->user();

        $orders = $user->buyHeaderTransactions()->orderBy('created_at', 'DESC')->get();

        return view('my-orders', ['groupedOrders' => $orders]);
    }
}
