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
                'info' => 'Diterima',
            ],
            [
                'info' => 'Dikirim',
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
