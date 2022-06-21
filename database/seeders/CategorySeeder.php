<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'category_name' => 'Fiction',
            ],
            [
                'category_name' => 'Poetry',
            ],
            [
                'category_name' => 'Science',
            ],
            [
                'category_name' => 'Self-help',
            ],
            [
                'category_name' => 'Comic',
            ],
        ]);
    }
}
