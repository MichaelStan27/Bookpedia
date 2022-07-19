<?php

namespace Database\Seeders;

use App\Models\CartItem;
use App\Models\DeliveryStatus;
use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            CitySeeder::class,
            UserSeeder::class,
            TransactionTypeSeeder::class,
            StatusSeeder::class,
            CategorySeeder::class,
            BookSeeder::class,
            CartItemSeeder::class,
            WishlistSeeder::class,
            DeliveryStatusSeeder::class,
        ]);
    }
}
