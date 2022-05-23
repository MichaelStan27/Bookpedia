<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller {
    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5)->letters()->numbers()]
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();
            return redirect('/')->with('loginMessage', 'login successful');
        }

        return redirect()->back()->withErrors(['loginMessage' => 'invalid login credentials']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('logoutMessage', 'logout successful');
    }
}
