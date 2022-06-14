<?php

namespace Database\Seeders;

use App\Models\TransactionType;
use Illuminate\Database\Seeder;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionType::insert([
            [
                'type' => 'loan',
            ],
            [
                'type' => 'sale',
            ],
            [
                'type' => 'loan and sale',
            ]
        ]);
    }
}
