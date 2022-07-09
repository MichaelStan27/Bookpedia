<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index(Request $request) {
        $user = auth()->user();

        if ($user) {
            $users = User::where('id', '<>', $user->id)->limit(5)->get();
            $books = Book::with(['transactionType', 'category', 'user'])
                ->where('user_id', '<>', $user->id)
                ->limit(12)->get();
        } else {
            $users = User::limit(5)->get();
            $books = Book::with(['transactionType', 'category', 'user'])
                ->limit(12)->get();
        }

        return view('dashboard', [
            'books' => $books,
            'users' => $users
        ]);
    }

    public function search(Request $request) {
        $user = auth()->user();
        // Base query
        $query = Book::with(['category', 'transactionType'])
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('transaction_types', 'books.transaction_type_id', '=', 'transaction_types.id');

        if ($user) $query = $query->where('user_id', '<>', $user->id);

        // Categories filtering
        $categories = $request->query('category');
        if (!empty($categories)) {
            $query = $query->where(function ($whereQuery) use ($categories) {
                foreach ($categories as $category_id) {
                    $whereQuery = $whereQuery->orWhere('categories.id', '=', $category_id);
                }
            });
        }

        // Availability filter
        $availability = $request->query('availability');
        if (isset($availability)) {
            switch ($availability) {
                case 1:
                    $query = $query->where('status_id', '=', 1);
                    break;
                case 2:
                    $query = $query->where('status_id', '=', 2);
                    break;
            }
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
            $query = $query->where(function ($whereQuery) use ($keyword) {
                $whereQuery = $whereQuery->orWhere('books.title', 'LIKE', "%$keyword%")
                    ->orWhere('books.author', 'LIKE', "%$keyword%");
            });
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
            'books' => $query->select('books.*')->paginate(12)->appends($request->query()),
            'category' => $categories,
            'type' => $type,
            'priceSort' => $priceSortOption,
            'titleSort' => $titleSortOption,
            'availability' => $availability,
            'keyword' => $request->keyword
        ]);
    }
}
