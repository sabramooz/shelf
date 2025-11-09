<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 sample books with realistic data
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'language' => 'English',
                'publisher' => 'Penguin Random House',
                'price' => 12.99,
                'cover_image' => 'https://picsum.photos/300/400?random=1',
                'popularity' => 95,
                'pages' => 180,
                'description' => 'A classic American novel set in the Jazz Age, exploring themes of wealth, love, idealism, and moral decay in America during the Roaring Twenties.',
                'isbn' => '978-0-7432-7356-5'
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 14.50,
                'cover_image' => 'https://picsum.photos/300/400?random=2',
                'popularity' => 92,
                'pages' => 324,
                'description' => 'A gripping tale of racial injustice and childhood innocence in the American South, told through the eyes of young Scout Finch.',
                'isbn' => '978-0-06-112008-4'
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'language' => 'English',
                'publisher' => 'Penguin Random House',
                'price' => 13.99,
                'cover_image' => 'https://picsum.photos/300/400?random=3',
                'popularity' => 98,
                'pages' => 328,
                'description' => 'A dystopian social science fiction novel that examines the dangers of totalitarianism, mass surveillance, and repressive regimentation.',
                'isbn' => '978-0-452-28423-4'
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'language' => 'English',
                'publisher' => 'Penguin Classics',
                'price' => 11.99,
                'cover_image' => 'https://picsum.photos/300/400?random=4',
                'popularity' => 89,
                'pages' => 432,
                'description' => 'A romantic novel of manners following the character development of Elizabeth Bennet and her complex relationship with Mr. Darcy.',
                'isbn' => '978-0-14-143951-8'
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'language' => 'English',
                'publisher' => 'Little, Brown and Company',
                'price' => 15.99,
                'cover_image' => 'https://picsum.photos/300/400?random=5',
                'popularity' => 85,
                'pages' => 234,
                'description' => 'The story of teenage rebellion and angst as told by the iconic character Holden Caulfield during his wanderings through New York City.',
                'isbn' => '978-0-316-76948-0'
            ],
            [
                'title' => 'One Hundred Years of Solitude',
                'author' => 'Gabriel García Márquez',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 16.99,
                'cover_image' => 'https://picsum.photos/300/400?random=6',
                'popularity' => 91,
                'pages' => 417,
                'description' => 'A landmark of magical realism, chronicling the multi-generational story of the Buendía family in the fictional town of Macondo.',
                'isbn' => '978-0-06-088328-7'
            ],
            [
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'language' => 'English',
                'publisher' => 'Houghton Mifflin',
                'price' => 22.99,
                'cover_image' => 'https://picsum.photos/300/400?random=7',
                'popularity' => 96,
                'pages' => 1216,
                'description' => 'An epic high fantasy adventure following the quest to destroy the One Ring and defeat the Dark Lord Sauron in Middle-earth.',
                'isbn' => '978-0-547-92822-7'
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'author' => 'J.K. Rowling',
                'language' => 'English',
                'publisher' => 'Scholastic',
                'price' => 8.99,
                'cover_image' => 'https://picsum.photos/300/400?random=8',
                'popularity' => 99,
                'pages' => 309,
                'description' => 'The magical beginning of Harry Potter\'s journey as he discovers he\'s a wizard and begins his education at Hogwarts School.',
                'isbn' => '978-0-439-70818-8'
            ],
            [
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 13.50,
                'cover_image' => 'https://picsum.photos/300/400?random=9',
                'popularity' => 88,
                'pages' => 163,
                'description' => 'A philosophical novel about a young Andalusian shepherd\'s journey to Egypt in pursuit of treasure, discovering the importance of following one\'s dreams.',
                'isbn' => '978-0-06-231500-7'
            ],
            [
                'title' => 'Crime and Punishment',
                'author' => 'Fyodor Dostoevsky',
                'language' => 'English',
                'publisher' => 'Penguin Classics',
                'price' => 17.99,
                'cover_image' => 'https://picsum.photos/300/400?random=10',
                'popularity' => 87,
                'pages' => 671,
                'description' => 'A psychological thriller exploring guilt, redemption, and moral philosophy through the story of Rodion Raskolnikov and his crime.',
                'isbn' => '978-0-14-044913-6'
            ],
            [
                'title' => 'The Chronicles of Narnia',
                'author' => 'C.S. Lewis',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 19.99,
                'cover_image' => 'https://picsum.photos/300/400?random=11',
                'popularity' => 93,
                'pages' => 767,
                'description' => 'A series of seven fantasy novels set in the magical land of Narnia, where children discover a world of talking animals and mythical creatures.',
                'isbn' => '978-0-06-023481-4'
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'language' => 'English',
                'publisher' => 'Ace Books',
                'price' => 16.50,
                'cover_image' => 'https://picsum.photos/300/400?random=12',
                'popularity' => 84,
                'pages' => 688,
                'description' => 'A science fiction epic set on the desert planet Arrakis, exploring politics, religion, ecology, and human potential in a distant future.',
                'isbn' => '978-0-441-17271-9'
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'language' => 'English',
                'publisher' => 'Houghton Mifflin',
                'price' => 12.50,
                'cover_image' => 'https://picsum.photos/300/400?random=13',
                'popularity' => 94,
                'pages' => 310,
                'description' => 'The enchanting prelude to The Lord of the Rings, following Bilbo Baggins on his unexpected journey with dwarves to reclaim their homeland.',
                'isbn' => '978-0-547-92822-7'
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'language' => 'English',
                'publisher' => 'Harper Perennial',
                'price' => 14.99,
                'cover_image' => 'https://picsum.photos/300/400?random=14',
                'popularity' => 82,
                'pages' => 288,
                'description' => 'A dystopian novel exploring a society driven by technology, conditioning, and artificial happiness, questioning the cost of utopia.',
                'isbn' => '978-0-06-085052-4'
            ],
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'language' => 'English',
                'publisher' => 'Doubleday',
                'price' => 15.50,
                'cover_image' => 'https://picsum.photos/300/400?random=15',
                'popularity' => 78,
                'pages' => 454,
                'description' => 'A mystery thriller involving symbologist Robert Langdon as he investigates a murder connected to a secret society and religious conspiracy.',
                'isbn' => '978-0-385-50420-4'
            ],
            [
                'title' => 'The Kite Runner',
                'author' => 'Khaled Hosseini',
                'language' => 'English',
                'publisher' => 'Riverhead Books',
                'price' => 13.99,
                'cover_image' => 'https://picsum.photos/300/400?random=16',
                'popularity' => 86,
                'pages' => 371,
                'description' => 'A powerful story of friendship, guilt, and redemption set against the backdrop of Afghanistan\'s tumultuous recent history.',
                'isbn' => '978-1-59448-000-3'
            ],
            [
                'title' => 'Life of Pi',
                'author' => 'Yann Martel',
                'language' => 'English',
                'publisher' => 'Harcourt',
                'price' => 14.25,
                'cover_image' => 'https://picsum.photos/300/400?random=17',
                'popularity' => 80,
                'pages' => 319,
                'description' => 'A philosophical adventure novel about a young man\'s survival journey in the Pacific Ocean with a Bengal tiger named Richard Parker.',
                'isbn' => '978-0-15-602732-3'
            ],
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'author' => 'Stieg Larsson',
                'language' => 'English',
                'publisher' => 'Vintage Crime',
                'price' => 12.75,
                'cover_image' => 'https://picsum.photos/300/400?random=18',
                'popularity' => 83,
                'pages' => 590,
                'description' => 'A gripping crime thriller featuring journalist Mikael Blomkvist and hacker Lisbeth Salander investigating a decades-old disappearance.',
                'isbn' => '978-0-307-94689-7'
            ],
            [
                'title' => 'Gone Girl',
                'author' => 'Gillian Flynn',
                'language' => 'English',
                'publisher' => 'Crown Publishing',
                'price' => 15.99,
                'cover_image' => 'https://picsum.photos/300/400?random=19',
                'popularity' => 79,
                'pages' => 419,
                'description' => 'A psychological thriller about the disappearance of Amy Dunne and the suspicion that falls on her husband Nick, exploring marriage and media manipulation.',
                'isbn' => '978-0-307-58836-4'
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'language' => 'English',
                'publisher' => 'Scholastic',
                'price' => 10.99,
                'cover_image' => 'https://picsum.photos/300/400?random=20',
                'popularity' => 90,
                'pages' => 374,
                'description' => 'A dystopian young adult novel about Katniss Everdeen\'s participation in a televised fight to the death in post-apocalyptic North America.',
                'isbn' => '978-0-439-02348-1'
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
