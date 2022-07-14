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
                'info' => 'Dikemas',
            ],
            [
                'info' => 'Dikirim',
            ],
            [
                'info' => 'Diterima',
            ],
            [
                'info' => 'Loan',
            ],
            [
                'info' => 'Dikirim kembali',
            ],
            [
                'info' => 'Diterima kembali',
            ],
        ]);
    }
}
