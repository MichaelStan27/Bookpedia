<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model {
    use HasFactory;

    public function courierType() {
        return $this->hasOne(CourierType::class);
    }

    public function headerTransaction() {
        return $this->hasOne(HeaderTransaction::class);
    }
}
