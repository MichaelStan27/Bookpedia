<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use Illuminate\Database\Seeder;

class DeliveryStatusSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DeliveryStatus::insert([
            [
                'info' => 'Being packaged',
            ],
            [
                'info' => 'Shipped',
            ],
            [
                'info' => 'Received',
            ],
            [
                'info' => 'Loan',
            ],
            [
                'info' => 'Shipped back',
            ],
            [
                'info' => 'Received back',
            ],
        ]);
    }
}
