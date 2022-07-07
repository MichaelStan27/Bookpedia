<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller {
    public function orders() {

        $user = auth()->user();
        $allTrans = $user->transactions()
            ->with(['user', 'book', 'loanDetails', 'book.user'])
            ->join('books', 'books.id', '=', 'transactions.book_id')
            ->orderBy('transactions.created_at', 'DESC')
            ->orderBy('books.user_id', 'ASC')
            ->get('transactions.*');

        $grouped = $allTrans
            ->groupBy(fn ($item, $idx) => $item->created_at->timestamp . "-" . $item->book->user_id)
            ->map(function ($item) {
                return [
                    'seller' => $item->first()->book->user,
                    'items' => $item,
                    'total' => 'IDR ' . number_format($item->reduce(fn ($carry, $i) => $carry + $i->item_price))
                ];
            });

        return view('my-orders', ['orderItemsList' => $grouped]);
    }
}
