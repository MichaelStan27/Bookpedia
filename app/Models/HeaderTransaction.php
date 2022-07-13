<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderTransaction extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function seller() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer() {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function detailTransactions() {
        return $this->hasMany(DetailTransaction::class);
    }

    public function deliveryStatus() {
        return $this->belongsTo(DeliveryStatus::class);
    }

    public function delivery() {
        return $this->belongsTo(Delivery::class);
    }

    public function getTotalAttribute() {
        return $this->detailTransactions->reduce(fn ($carry, $trans) => $carry + $trans->item_price);
    }

    public function getTotalWithNotationAttribute() {
        return 'IDR ' . number_format($this->detailTransactions->reduce(fn ($carry, $trans) => $carry + $trans->item_price));
    }

    public function getOrderDateAttribute() {
        $date = $this->created_at;
        $now = Carbon::now();
        return $now->diffInDays($date) ? $date->format('d-m-Y') : $date->diffForHumans();
    }

    public function incrementDeliveryStatus($value = 1) {
        return $this->update([
            'delivery_status_id' => $this->delivery_status_id + $value
        ]);
    }

    public function getLoanTransaction() {
        return $this->detailTransactions()->where('transaction_type_id', '=', 1);
    }
}
