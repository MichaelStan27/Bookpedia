<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactionType() {
        return $this->hasOne(TransactionType::class, 'id', 'transaction_type_id');
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function getLoanPriceWithNotationAttribute() {
        return 'IDR ' . number_format($this->attributes['loan_price']);
    }

    public function getSalePriceWithNotationAttribute() {
        return 'IDR ' . number_format($this->attributes['sale_price']);
    }

    public function getAvailablePriceAttribute() {
        $type = $this->attributes['transaction_type_id'];
        switch ($type) {
            case 1:
            case 3:
                return $this->getLoanPriceWithNotationAttribute();
                break;
            case 2:
                return $this->getSalePriceWithNotationAttribute();
                break;
        }
    }

    public function getTransactionTypeStringAttribute() {
        $type = $this->attributes['transaction_type_id'];
        switch ($type) {
            case 1:
                return 'Rent';
                break;
            case 2:
                return 'Sell';
                break;
            case 3:
                return 'Rent & Sell';
                break;
        }
    }

    public function getStatusStringAttribute() {
        $type = $this->attributes['status_id'];
        switch ($type) {
            case 1:
                return 'Available';
                break;
            case 2:
                return 'Not Available';
                break;
        }
    }

    public function getIsAvailableAttribute() {
        return $this->attributes['status_id'] == 1;
    }

    public function getOwnerAttribute() {
        return $this->user->fullname;
    }

    public function detailTransactions() {
        return $this->hasMany(DetailTransaction::class);
    }
}
