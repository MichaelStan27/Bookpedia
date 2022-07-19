<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $now = Carbon::now();
        Coupon::insert([
            [
                'code' => 'AUSPICIOUS10',
                'exp_date' => Carbon::now()->addYears(1),
                'amount' => 100000,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'AUSPICIOUSX',
                'exp_date' => Carbon::now()->addYears(1),
                'amount' => 1000000,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'EXPIREDCODE',
                'exp_date' => Carbon::now()->subYears(1),
                'amount' => 100000000,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'MDPYV',
                'exp_date' => Carbon::now()->addYears(1),
                'amount' => 2000000,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'code' => 'NEWYEAR2023',
                'exp_date' => Carbon::now()->addYears(1),
                'amount' => 223000,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
