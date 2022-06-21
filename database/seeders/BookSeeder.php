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
            ],
            [
                'isbn'=> '9781542094085', 
                'title'=> '400 Days', 
                'author' =>'Chetan Bhagat',
                'released_year'=> 2021,
                'publisher' =>'Westland Publications',
                'image'=>'book-image/9781542094085.jpg',
                'summary'=>'Welcome to 400 Days. A mystery and romance story like none other. An unputdownable tale of suspense, human relationships, love, friendship, the crazy world we live in and, above all, a mother\'s determination to never give up.',
                'description' => '70% in good condition',
                'user_id' => 1,
                'sale_price' => NULL,
                'loan_price' => 10000,
                'status_id' => 1,
                'transaction_type_id' => 1
            ],
            [
                'isbn'=> '9781501139239', 
                'title'=> 'The Seven Husbands of Evelyn Hugo',
                'author' =>'Taylor Jenkins Reid',
                'released_year'=> 2018,
                'publisher' =>'Washington Square Press',
                'image'=>'book-image/9781501139239.jpg',
                'summary'=>'Aging and reclusive Hollywood movie icon Evelyn Hugo is finally ready to tell the truth about her glamorous and scandalous life. But when she chooses unknown magazine reporter Monique Grant for the job, no one is more astounded than Monique herself. Why her? Why now?',
                'description' => '90% in good condition',
                'user_id' => 1,
                'sale_price' => NULL,
                'loan_price' => 12000,
                'status_id' => 1,
                'transaction_type_id' => 2
            ],
            [
                'isbn'=> '0747532699', 
                'title'=> 'Harry Potter and the Philosopher\'s Stone', 
                'author' =>'J. K. Rowling',
                'released_year'=> 1997,
                'publisher' =>'Bloomsbury Publishing PLC',
                'image'=>'book-image/0747532699.jpg',
                'summary'=>'When a letter arrives for unhappy but ordinary Harry Potter, a decade-old secret is revealed to him that apparently he’s the last to know. His parents were wizards, killed by a Dark Lord’s curse when Harry was just a baby, and which he somehow survived. Leaving his unsympathetic aunt and uncle for Hogwarts, a wizarding school brimming with ghosts and enchantments, Harry stumbles upon a sinister mystery when he finds a three-headed dog guarding a room on the third floor. Then he hears of a missing stone with astonishing powers which could be valuable, dangerous – or both. An incredible adventure is about to begin!',
                'description' => '60% in good condition',
                'user_id' => 1,
                'sale_price' => 120000,
                'loan_price' => NULL,
                'status_id' => 1,
                'transaction_type_id' => 2
            ],
            [
                'isbn'=> '9781449486792', 
                'title'=> 'The Sun and Her Flowers', 
                'author' =>'Rupi Kaur',
                'released_year'=> 2017,
                'publisher' =>'Andrews McMeel Publishing',
                'image'=>'book-image/9781449486792.jpg',
                'summary'=>'Divided into five chapters and illustrated by Kaur, the sun and her flowers is a journey of wilting, falling, rooting, rising, and blooming. A celebration of love in all its forms. this is the recipe of life said my mother as she held me in her arms as I wept think of those flowers you plant in the garden each year they will teach you that people too must wilt fall root risen order to bloom.',
                'description' => '100% in good condition',
                'user_id' => 1,
                'sale_price' => 120000,
                'loan_price' => 10000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],

            [
                'isbn'=> '9781524868697', 
                'title'=> 'Please Love Me At My Worst', 
                'author' =>'Michaela Angemeer',
                'released_year'=> 2021,
                'publisher' =>'Andrews McMeel Publishing',
                'image'=>'book-image/9781524868697.jpg',
                'summary'=>'Please Love Me At My Worst is a collection of four sections of poetry inspired by loneliness, unrequited love, and not being able to let go of past relationships. Written during the 2020 COVID-19 quarantine, the book is a reflection of what it means to yearn for people who are unavailable and how important it is to focus on self-love and healing.',
                'description' => '70% in good condition',
                'user_id' => 1,
                'sale_price' => NULL,
                'loan_price' => 10000,
                'status_id' => 1,
                'transaction_type_id' => 1
            ],
            [
                'isbn'=> '9781493434022', 
                'title'=> 'Living Slower: Simple Ideas to Eliminate Excess and Make Time for What Matters',
                'author' =>'Merissa A. ALink',
                'released_year'=> 2022,
                'publisher' =>'Baker Books',
                'image'=>'book-image/9781493434022.jpg',
                'summary'=>'In an increasingly complex and chaotic world, we yearn to live a little slower, a little simpler.',
                'description' => '85% in good condition',
                'user_id' => 1,
                'sale_price' => 135000,
                'loan_price' => 12000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],

            //
            [
                'isbn'=> '9781250820006', 
                'title'=> 'A Rip Through Time', 
                'author' =>'Kelley Armstrong',
                'released_year'=> 2022,
                'publisher' =>'Minotaur Books',
                'image'=>'book-image/9781250820006.jpg',
                'summary'=>'When Mallory wakes up in Catriona\'s body in 1869, she must put aside her shock and adjust quickly to the reality: life as a housemaid to an undertaker in Victorian Scotland. She soon discovers that her boss, Dr. Gray, also moonlights as a medical examiner and has just taken on an intriguing case, the strangulation of a young man, similar to the attack on herself. Her only hope is that catching the murderer can lead her back to her modern life . . . before it\'s too late.',
                'description' => '75% in good condition',
                'user_id' => 1,
                'sale_price' => 150000,
                'loan_price' => NULL,
                'status_id' => 1,
                'transaction_type_id' => 2
            ],
            [
                'isbn'=> '0316310409', 
                'title'=> 'The Queen of Nothing', 
                'author' =>'Holly Black',
                'released_year'=> 2019,
                'publisher' =>'Atria Books',
                'image'=>'book-image/0316310409.jpg',
                'summary'=>'Jude must risk venturing back into the treacherous Faerie Court, and confront her lingering feelings for Cardan, if she wishes to save her sister. But Elfhame is not as she left it. War is brewing. As Jude slips deep within enemy lines she becomes ensnared in the conflict’s bloody politics.

                And, when a dormant yet powerful curse is unleashed, panic spreads throughout the land, forcing her to choose between her ambition and her humanity…',
                'description' => '60% in good condition',
                'user_id' => 1,
                'sale_price' => 160000,
                'loan_price' => 15000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],

            [
                'isbn'=> '9781529157147', 
                'title'=> 'Malibu Rising', 
                'author' =>'Taylor Jenkins Reid',
                'released_year'=> 2021,
                'publisher' =>'Ballantine Books',
                'image'=>'book-image/9781529157147.jpg',
                'summary'=>'Malibu Rising is a story about one unforgettable night in the life of a family: the night they each have to choose what they will keep from the people who made them... and what they will leave behind.',
                'description' => '85% in good condition',
                'user_id' => 1,
                'sale_price' => NULL,
                'loan_price' => 15000,
                'status_id' => 1,
                'transaction_type_id' => 1
            ],
            [
                'isbn'=> '9780593592342', 
                'title'=> 'The Murder of Mr. Wickham',
                'author' =>'Claudia Gray',
                'released_year'=> 2022,
                'publisher' =>'Vintage Publishing',
                'image'=>'book-image/9780593592342.jpg',
                'summary'=>'A summer house party turns into a whodunit when Mr. Wickham, one of literature’s most notorious villains, meets a sudden and suspicious end in this mystery featuring Jane Austen’s leading literary characters.',
                'description' => '95% in good condition',
                'user_id' => 1,
                'sale_price'=>165000,
                'loan_price' => 12000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],
            [
                'isbn'=> '9780593315491', 
                'title'=> 'Breathless', 
                'author' =>'Amy McCulloch',
                'released_year'=> 2022,
                'publisher' =>'Anchor Books',
                'image'=>'book-image/9780593315491.jpg',
                'summary'=>'A high-altitude thriller that will take your breath away--Cecily Wong is on her most dangerous climb yet, miles above sea level. But the elements are nothing compared to one chilling truth: There\'s a killer on the mountain.',
                'description' => '100% in good condition',
                'user_id' => 1,
                'sale_price' => 180000,
                'loan_price' => NULL,
                'status_id' => 1,
                'transaction_type_id' => 2
            ],
            [
                'isbn'=> '9780800740160', 
                'title'=> 'All That Fills Us', 
                'author' =>'Autumn Lytle',
                'released_year'=> 2022,
                'publisher' =>'Fleming H. Revell Company',
                'image'=>'book-image/9780800740160.jpg',
                'summary'=>'Mel Ellis knows that her eating disorder is ruining her life. Everyone tells her rehab is her best option, but she can\'t bring herself to go. Broken and empty in more ways than one, Mel makes one last-ditch effort to make hers a story worth telling. She will walk her own road to recovery along the lesser-known trails of the North American wilderness.',
                'description' => '80% in good condition',
                'user_id' => 1,
                'sale_price' => 145000,
                'loan_price' => 12000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],

            [
                'isbn'=> '9780593199763', 
                'title'=> 'Near The Bone', 
                'author' =>'Christina Henry',
                'released_year'=> 2021,
                'publisher' =>'Berkley Books',
                'image'=>'book-image/9780593199763.jpg',
                'summary'=>'A woman trapped on a mountain attempts to survive more than one kind of monster, in a dread-inducing horror novel from the national bestselling author Christina Henry.',
                'description' => '95% in good condition',
                'user_id' => 1,
                'sale_price'=>175000,
                'loan_price' => 15000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],
            [
                'isbn'=> '9781406384765', 
                'title'=> 'The Hate U give',
                'author' =>'Angie Thomas',
                'released_year'=> 2017,
                'publisher' =>'Balzer & Bray',
                'image'=>'book-image/9781406384765.jpg',
                'summary'=>'Sixteen-year-old Starr Carter moves between two worlds: the poor neighborhood where she lives and the fancy suburban prep school she attends. The uneasy balance between these worlds is shattered when Starr witnesses the fatal shooting of her childhood best friend Khalil at the hands of a police officer. Khalil was unarmed.',
                'description' => '80% in good condition',
                'user_id' => 1,
                'sale_price' => 175000,
                'loan_price' => 15000,
                'status_id' => 1,
                'transaction_type_id' => 3
            ],
        ]);

    }
}
