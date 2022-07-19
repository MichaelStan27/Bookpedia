<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHistory extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function coupon() {
        return $this->hasOne(Coupon::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
