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

    public function cartItemsTrashed() {
        return $this->cartItems()
                    ->join('books', 'cart_items.book_id', 'books.id')
                    ->where('books.deleted_at', '<>', '');
    }
    
    public function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    public function wishlistsTrashed(){
        return $this->wishlists()
                    ->join('books', 'wishlists.book_id', 'books.id')
                    ->where('books.deleted_at', '<>', '');
    }

    public function getFullnameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getSuccessfulTransAttribute() {
        $successful_trans = $this->books()->whereIn('id', DetailTransaction::pluck('book_id'))->count();
        if ($successful_trans == 0) return "No succesful transaction";
        else return "{$successful_trans} successful " . Str::plural('transaction', $successful_trans);
    }

    public function getBalanceWithNotationAttribute() {
        return 'IDR ' . number_format($this->attributes['balance']);
    }

    public function sellHeaderTransactions() {
        return $this->hasMany(HeaderTransaction::class, 'seller_id');
    }

    public function buyHeaderTransactions() {
        return $this->hasMany(HeaderTransaction::class, 'buyer_id');
    }
}
