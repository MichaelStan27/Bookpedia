<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function loanDetails() {
        return $this->hasOne(LoanDetails::class);
    }

    public function getIsLoanTransAttribute() {
        return isset($this->loanDetails);
    }

    public function getItemPriceAttribute() {
        switch ($this->type_id) {
            case 1:
                return $this->book->loan_price * $this->loanDetails->duration;
                break;
            case 2:
                return $this->book->sale_price;
                break;
        }
    }

    public function getItemPriceWithNotationAttribute() {
        switch ($this->type_id) {
            case 1:
                return 'IDR ' .  number_format($this->book->loan_price * $this->loanDetails->duration);
                break;
            case 2:
                return $this->book->sale_price_with_notation;
                break;
        }
    }
}
