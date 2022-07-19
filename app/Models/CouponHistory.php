<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponHistory extends Model {
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRedeemDateAttribute() {
        return $this->created_at->format('d F Y');
    }
}
