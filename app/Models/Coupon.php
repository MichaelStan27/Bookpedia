<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at', 'exp_date'];

    public function couponHistory() {
        return $this->hasMany(CouponHistory::class);
    }

    public function getAmountWithNotationAttribute() {
        return 'IDR ' . number_format($this->attributes['amount']);
    }
}
