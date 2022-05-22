<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::insert([
            [
                'first_name' => 'Budi',
                'last_name' => 'Sutanto',
                'email' => 'budi@gmail.com',
                'password' => 'test123',
                'phone_number' => '081579468812',
                'city' => 'Jakarta Selatan',
                'postal_code' => '10250',
                'detail_address' => 'Jalan Pulo Raya V No.14',
                'balance' => '1500000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
