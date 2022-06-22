<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    // public function detailProfile($id)
    // {
    //     // $book = User::where('id', '=', $id);
    // }
}
