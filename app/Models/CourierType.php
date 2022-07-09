<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierType extends Model {
    use HasFactory;

    public function delivery() {
        return $this->belongsTo(Delivery::class);
    }
}
