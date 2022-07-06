<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TransactionManagementController extends Controller {
    public function orders() {
        return view('my-orders');
    }
}
