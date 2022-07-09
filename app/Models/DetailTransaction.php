<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function transactionType() {
        return $this->belongsTo(TransactionType::class);
    }

    public function headerTransaction() {
        return $this->belongsTo(HeaderTransaction::class);
    }

    public function loanDetails() {
        return $this->hasOne(LoanDetails::class);
    }

    public function getIsLoanTransAttribute() {
        return isset($this->loanDetails);
    }

    public function getItemPriceAttribute() {
        switch ($this->transaction_type_id) {
            case 1:
                return $this->book->loan_price * $this->loanDetails->duration;
                break;
            case 2:
                return $this->book->sale_price;
                break;
        }
    }

    public function getItemPriceWithNotationAttribute() {
        return 'IDR ' . number_format($this->getItemPriceAttribute());
    }
}
