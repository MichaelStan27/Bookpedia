<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index(Request $request) {
        $user = auth()->user();

        $users = $user ? User::where('id', '<>', $user->id)->limit(5)->get() : User::limit(5)->get();

        return view('dashboard', [
            'books' => Book::with(['transaction', 'category'])->limit(10)->get(),
            'users' => $users
        ]);
    }

    public function search(Request $request) {
        // Base query
        $query = Book::with(['category', 'transaction'])
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('transaction_types', 'books.transaction_type_id', '=', 'transaction_types.id');

        // Categories filtering
        $categories = $request->query('category');
        if (!empty($categories)) {
            $query = $query->orWhere(function ($whereQuery) use ($categories) {
                foreach ($categories as $category_id) {
                    $whereQuery = $whereQuery->orWhere('categories.id', '=', $category_id);
                }
            });
        }

        // Transaction type filter
        $type = $request->query('type');
        if (isset($type)) {
            switch ($type) {
                case 1:
                    $query = $query->where('transaction_type_id', '<>', 2);
                    break;
                case 2:
                    $query = $query->where('transaction_type_id', '<>', 1);
                    break;
            }
        }

        // Keyword filtering
        $keyword = $request->query('keyword');
        if (isset($keyword)) {
            $query = $query->where('books.title', 'LIKE', "%$keyword%");
        }

        // Sorting price
        $priceSortOption = $request->query('price');
        if (isset($type) && $priceSortOption) {
            $option = $priceSortOption == 'desc' ? 'DESC' : 'ASC';
            switch ($type) {
                case 1:
                    $query = $query->orderBy('books.loan_price', $option);
                case 2:
                    $query = $query->orderBy('books.sale_price', $option);
                    break;
            }
        }

        // Sorting title
        $titleSortOption = $request->query('title');
        if (isset($titleSortOption)) {
            $option = $titleSortOption == 'desc' ? 'DESC' : 'ASC';
            $query = $query->orderBy('books.title', $option);
        }

        return view('search', [
            'books' => $query->select('books.*')->paginate(8)->appends($request->query()),
            'category' => $categories,
            'type' => $type,
            'priceSort' => $priceSortOption,
            'titleSort' => $titleSortOption,
            'keyword' => $request->keyword
        ]);
    }
}
