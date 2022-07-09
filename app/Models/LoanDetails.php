<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'detail_transaction_id',
        'deadline',
        'loan_date',
        'return_date',
        'duration'
    ];

    public function transaction() {
        return $this->belongsTo(DetailTransaction::class);
    }
}
