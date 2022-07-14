<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model {
    use HasFactory;

    public function headerTransaction() {
        return $this->hasOne(HeaderTransaction::class);
    }

    public function loanDetails() {
        return $this->hasOne(DeliveryStatus::class);
    }

    public function getNextStatusAttribute() {
        return DeliveryStatus::find($this->id + 1)->info;
    }

    public function is($status) {
        return strtolower($this->info) == $status;
    }
}
