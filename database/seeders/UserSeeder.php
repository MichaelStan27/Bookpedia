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
                'city_id' => 13,
                'postal_code' => '10250',
                'detail_address' => 'Jalan Pulo Raya V No.14',
                'balance' => '1000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Fernando',
                'last_name' => 'Clemente',
                'email' => 'nando@gmail.com',
                'password' => Hash::make('test124'),
                'phone_number' => '081525412551',
                'city_id' => 31,
                'postal_code' => '95000',
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
                'city_id' => 11,
                'postal_code' => '10001',
                'detail_address' => 'Jalan empang budi no 124',
                'balance' => '1000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Saipul',
                'last_name' => 'Jamil',
                'email' => 'saipuljamil@gmail.com',
                'password' => Hash::make('test125'),
                'phone_number' => '087612346758',
                'city_id' => 11,
                'postal_code' => '10002',
                'detail_address' => 'Jalan Pakuan no 07',
                'balance' => '1000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Stanley',
                'email' => 'michaelstanley@gmail.com',
                'password' => Hash::make('test126'),
                'phone_number' => '089612346676',
                'city_id' => 11,
                'postal_code' => '10003',
                'detail_address' => 'Jalan Rawa benteur no 07',
                'balance' => '1000000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
