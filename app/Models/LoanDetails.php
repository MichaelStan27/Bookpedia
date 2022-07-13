<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'detail_transaction_id',
        'delivery_status_id',
        'deadline',
        'loan_date',
        'return_date',
        'duration'
    ];

    public function transaction() {
        return $this->belongsTo(DetailTransaction::class);
    }

    public function deliveryStatus() {
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function incrementDeliveryStatus($value = 1) {
        return $this->update([
            'delivery_status_id' => $this->delivery_status_id + $value
        ]);
    }
}
