<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    public function index(Request $request) {
        return view('dashboard', [
            'books' => Book::limit(10)->get(),
            'users' => User::limit(5)->get()
        ]);
    }
}
