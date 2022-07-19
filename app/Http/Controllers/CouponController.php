<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller {
    public function index() {
        return view('coupon', [
            'coupons' => Coupon::all(),
        ]);
    }

    public function redeem(Request $req) {
        $coupon = Coupon::where('code', $req->coupon)->first();
        $user = Auth::user();
        if (!$coupon) {
            return redirect()->back()->with('message', 'Invalid Coupon Code')->withErrors(['coupon' => 'invalid coupon code']);
        } else if (!$coupon->exp_date->isFuture()) {
            return redirect()->back()->with('message', 'Coupon is expired')->withErrors(['coupon' => 'invalid coupon code']);
        } else if ($user->couponHistories()->where('coupon_id', $coupon->id)->first()) {
            return redirect()->back()->with('message', 'You\'ve already redeemed this code')->withErrors(['coupon' => 'invalid coupon code']);
        }

        CouponHistory::create([
            'user_id' => $user->id,
            'coupon_id' => $coupon->id,
        ]);

        $user->update([
            'balance' => $user->balance + $coupon->amount
        ]);

        return redirect()->back()->with('message', "Redeem successful <br> Balance Added: $coupon->amount_with_notation");
    }
}
