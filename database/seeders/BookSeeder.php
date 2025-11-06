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
                'popularity' => 95
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 14.50,
                'cover_image' => 'https://picsum.photos/300/400?random=2',
                'popularity' => 92
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'language' => 'English',
                'publisher' => 'Penguin Random House',
                'price' => 13.99,
                'cover_image' => 'https://picsum.photos/300/400?random=3',
                'popularity' => 98
            ],
            [
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'language' => 'English',
                'publisher' => 'Penguin Classics',
                'price' => 11.99,
                'cover_image' => 'https://picsum.photos/300/400?random=4',
                'popularity' => 89
            ],
            [
                'title' => 'The Catcher in the Rye',
                'author' => 'J.D. Salinger',
                'language' => 'English',
                'publisher' => 'Little, Brown and Company',
                'price' => 15.99,
                'cover_image' => 'https://picsum.photos/300/400?random=5',
                'popularity' => 85
            ],
            [
                'title' => 'One Hundred Years of Solitude',
                'author' => 'Gabriel García Márquez',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 16.99,
                'cover_image' => 'https://picsum.photos/300/400?random=6',
                'popularity' => 91
            ],
            [
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'language' => 'English',
                'publisher' => 'Houghton Mifflin',
                'price' => 22.99,
                'cover_image' => 'https://picsum.photos/300/400?random=7',
                'popularity' => 96
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'author' => 'J.K. Rowling',
                'language' => 'English',
                'publisher' => 'Scholastic',
                'price' => 8.99,
                'cover_image' => 'https://picsum.photos/300/400?random=8',
                'popularity' => 99
            ],
            [
                'title' => 'The Alchemist',
                'author' => 'Paulo Coelho',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 13.50,
                'cover_image' => 'https://picsum.photos/300/400?random=9',
                'popularity' => 88
            ],
            [
                'title' => 'Crime and Punishment',
                'author' => 'Fyodor Dostoevsky',
                'language' => 'English',
                'publisher' => 'Penguin Classics',
                'price' => 17.99,
                'cover_image' => 'https://picsum.photos/300/400?random=10',
                'popularity' => 87
            ],
            [
                'title' => 'The Chronicles of Narnia',
                'author' => 'C.S. Lewis',
                'language' => 'English',
                'publisher' => 'HarperCollins',
                'price' => 19.99,
                'cover_image' => 'https://picsum.photos/300/400?random=11',
                'popularity' => 93
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'language' => 'English',
                'publisher' => 'Ace Books',
                'price' => 16.50,
                'cover_image' => 'https://picsum.photos/300/400?random=12',
                'popularity' => 84
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'language' => 'English',
                'publisher' => 'Houghton Mifflin',
                'price' => 12.50,
                'cover_image' => 'https://picsum.photos/300/400?random=13',
                'popularity' => 94
            ],
            [
                'title' => 'Brave New World',
                'author' => 'Aldous Huxley',
                'language' => 'English',
                'publisher' => 'Harper Perennial',
                'price' => 14.99,
                'cover_image' => 'https://picsum.photos/300/400?random=14',
                'popularity' => 82
            ],
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'language' => 'English',
                'publisher' => 'Doubleday',
                'price' => 15.50,
                'cover_image' => 'https://picsum.photos/300/400?random=15',
                'popularity' => 78
            ],
            [
                'title' => 'The Kite Runner',
                'author' => 'Khaled Hosseini',
                'language' => 'English',
                'publisher' => 'Riverhead Books',
                'price' => 13.99,
                'cover_image' => 'https://picsum.photos/300/400?random=16',
                'popularity' => 86
            ],
            [
                'title' => 'Life of Pi',
                'author' => 'Yann Martel',
                'language' => 'English',
                'publisher' => 'Harcourt',
                'price' => 14.25,
                'cover_image' => 'https://picsum.photos/300/400?random=17',
                'popularity' => 80
            ],
            [
                'title' => 'The Girl with the Dragon Tattoo',
                'author' => 'Stieg Larsson',
                'language' => 'English',
                'publisher' => 'Vintage Crime',
                'price' => 12.75,
                'cover_image' => 'https://picsum.photos/300/400?random=18',
                'popularity' => 83
            ],
            [
                'title' => 'Gone Girl',
                'author' => 'Gillian Flynn',
                'language' => 'English',
                'publisher' => 'Crown Publishing',
                'price' => 15.99,
                'cover_image' => 'https://picsum.photos/300/400?random=19',
                'popularity' => 79
            ],
            [
                'title' => 'The Hunger Games',
                'author' => 'Suzanne Collins',
                'language' => 'English',
                'publisher' => 'Scholastic',
                'price' => 10.99,
                'cover_image' => 'https://picsum.photos/300/400?random=20',
                'popularity' => 90
            ]
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
