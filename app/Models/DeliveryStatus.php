<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model {
    use HasFactory;

    public function headerTransaction() {
        return $this->hasOne(HeaderTransaction::class);
    }
}
