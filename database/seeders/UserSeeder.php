<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('test123'),
                'phone_number' => '081579468812',
                'city' => 'Jakarta Selatan',
                'postal_code' => '10250',
                'detail_address' => 'Jalan Pulo Raya V No.14',
                'balance' => '1500000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Fernando',
                'last_name' => 'Clemente',
                'email' => 'nando@gmail.com',
                'password' => Hash::make('test124'),
                'phone_number' => '081525412551',
                'city' => 'Manado',
                'postal_code' => '11111',
                'detail_address' => 'Jalan empang budi no 123',
                'balance' => '500000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Vincent',
                'last_name' => 'Lee',
                'email' => 'lee@gmail.com',
                'password' => Hash::make('test122'),
                'phone_number' => '081526475111',
                'city' => 'Jakarta Barat',
                'postal_code' => '10001',
                'detail_address' => 'Jalan empang budi no 124',
                'balance' => '1000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
