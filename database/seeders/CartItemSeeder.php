<?php

namespace Database\Seeders;

use App\Models\CartItem;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        CartItem::insert([
            // [
            //     'book_id' => 1,
            //     'user_id' => 1,
            //     'type_id' => 1
            // ],

            [
                'book_id' => 2,
                'user_id' => 1,
                'type_id' => 2,
                'duration' => NULL
            ],

            [
                'book_id' => 1,
                'user_id' => 1,
                'type_id' => 1,
                'duration' => 2
            ],

            // [
            //     'book_id' => 2,
            //     'user_id' => 1,
            //     'type_id' =>1
            // ]

        ]);
    }
}
