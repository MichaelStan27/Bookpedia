<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    use HasFactory;
    protected $guarded = 'id';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function transactiontype(){
        return $this->hasOne(TransactionType::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function getLoanPriceWithNotationAttribute(){
        return 'IDR '.number_format($this->attributes['loan_price']);
    }

    public function getSalePriceWithNotationAttribute(){
        return 'IDR '.number_format($this->attributes['sale_price']);
    }
}
