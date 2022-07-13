<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller {
    public function viewLogin(){
        return view('/login');
    }

    public function viewRegister(){
        return view('/register');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(5)->letters()->numbers()]
        ]);
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'login successful!');
        }

        return redirect()->back()->withErrors(['message' => 'invalid login credentials']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'logout successful!');
    }

    public function store(Request $request) {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'phone' => ['required', 'digits_between:11,13', 'regex:/^[0][0-9]{10,12}/'],
            'city' => ['required'],
            'postal_code' => ['required', 'digits:5'],
            'detail_address' => ['required', 'min:10'],
            'balance' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(5)->letters()->numbers(), 'confirmed'],
            'password_confirmation' => ['required', Password::min(5)->letters()->numbers()]
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'detail_address' => $request->detail_address,
            'balance' => $request->balance,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('message', 'Account created successfully');
    }
}
