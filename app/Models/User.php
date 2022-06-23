<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books() {
        return $this->hasMany(Book::class);
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class);
    }

    public function getFullnameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getSuccessfulTransAttribute() {
        $successful_trans = DB::table('users')
            ->join('buy_transactions', 'users.id', '=', 'buy_transactions.user_id')
            ->join('loan_transactions', 'users.id', '=', 'loan_transactions.user_id')
            ->count();
        if ($successful_trans == 0) return "No succesful transaction";
        else return "{$successful_trans} sucessful " . Str::plural('transaction', $successful_trans);
    }
}
