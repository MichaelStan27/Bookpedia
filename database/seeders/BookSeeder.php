<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
       Book::insert([
            [
                'isbn'=> '9781501110368', 
                'title'=> 'It Ends With Us', 
                'author' =>'Coleen Hoover',
                'released_year'=> 2016,
                'publisher' =>'Atria Books',
                'image'=>'book-image/9781501110368.jpg',
                'summary'=>'In this "brave and heartbreaking novel that digs its claws into you and doesn\'t let go, long after you\'ve finished it" (Anna Todd, New York Times bestselling author) from the #1 New York Times bestselling author of All Your Perfects, a workaholic with a too-good-to-be-true romance can\'t stop thinking about her first love.',
                'description' => '80% in good condition',
                'user_id' => 1,
                'sale_price' => 60000,
                'loan_price' => 10000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],
            [
                'isbn'=> '9781471136726', 
                'title'=> 'Ugly Love', 
                'author' =>'Coleen Hoover',
                'released_year'=> 2014,
                'publisher' =>'Atria Books',
                'image'=>'book-image/9781471136726.jpg',
                'summary'=>'When Tate Collins meets airline pilot Miles Archer, she knows it isn’t love at first sight. They wouldn’t even go so far as to consider themselves friends. The only thing Tate and Miles have in common is an undeniable mutual attraction. Once their desires are out in the open, they realize they have the perfect set-up. He doesn’t want love, she doesn’t have time for love, so that just leaves the sex. Their arrangement could be surprisingly seamless, as long as Tate can stick to the only two rules Miles has for her.',
                'description' => '100% in good condition',
                'user_id' => 1,
                'sale_price' => 100000,
                'loan_price' => 12000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ]
        ]);

    }
}
