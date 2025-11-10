<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class BooksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the books index page returns a successful response.
     */
    public function test_books_index_page_returns_successful_response(): void
    {
        $response = $this->get('/books');

        $response->assertStatus(200);
    }

    /**
     * Test that the books index page displays books from the database.
     */
    public function test_books_index_page_displays_books(): void
    {
        // Create test books with explicit timestamps
        $book1 = Book::create([
            'title' => 'Test Book 1',
            'author' => 'Test Author 1',
            'language' => 'English',
            'publisher' => 'Test Publisher',
            'price' => 29.99,
            'pages' => 300,
            'isbn' => '978-1234567890',
            'image' => 'https://example.com/image1.jpg',
            'summary' => 'This is a test book summary.',
            'created_at' => now()->subMinutes(2),
        ]);

        $book2 = Book::create([
            'title' => 'Test Book 2',
            'author' => 'Test Author 2',
            'language' => 'English',
            'publisher' => 'Test Publisher',
            'price' => 39.99,
            'pages' => 400,
            'isbn' => '978-0987654321',
            'image' => 'https://example.com/image2.jpg',
            'summary' => 'This is another test book summary.',
            'created_at' => now()->subMinutes(1),
        ]);

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $page) => $page
            ->component('Books/Index')
            ->has('books', 2)
            ->where('books.0.title', $book2->title) // Most recent first
            ->where('books.1.title', $book1->title)
        );
    }

    /**
     * Test that the book show page returns a successful response.
     */
    public function test_book_show_page_returns_successful_response(): void
    {
        $book = Book::create([
            'title' => 'Test Book',
            'author' => 'Test Author',
            'language' => 'English',
            'publisher' => 'Test Publisher',
            'price' => 29.99,
            'pages' => 300,
            'isbn' => '978-1234567890',
            'image' => 'https://example.com/image.jpg',
            'summary' => 'This is a test book summary.',
        ]);

        $response = $this->get("/books/{$book->id}");

        $response->assertStatus(200);
        $response->assertInertia(fn (Assert $page) => $page
            ->component('Books/Show')
            ->has('book')
            ->where('book.title', $book->title)
            ->where('book.author', $book->author)
            ->where('book.isbn', $book->isbn)
        );
    }

    /**
     * Test that accessing a non-existent book returns 404.
     */
    public function test_non_existent_book_returns_404(): void
    {
        $response = $this->get('/books/99999');

        $response->assertStatus(404);
    }

    /**
     * Test that books are ordered by creation date (newest first).
     */
    public function test_books_are_ordered_by_newest_first(): void
    {
        $oldBook = Book::create([
            'title' => 'Old Book',
            'author' => 'Old Author',
            'language' => 'English',
            'publisher' => 'Test Publisher',
            'price' => 29.99,
            'pages' => 300,
            'isbn' => '978-1111111111',
            'image' => 'https://example.com/image.jpg',
            'summary' => 'Old book summary.',
            'created_at' => now()->subDays(5),
        ]);

        $newBook = Book::create([
            'title' => 'New Book',
            'author' => 'New Author',
            'language' => 'English',
            'publisher' => 'Test Publisher',
            'price' => 39.99,
            'pages' => 400,
            'isbn' => '978-2222222222',
            'image' => 'https://example.com/image.jpg',
            'summary' => 'New book summary.',
        ]);

        $response = $this->get('/books');

        $response->assertInertia(fn (Assert $page) => $page
            ->where('books.0.title', $newBook->title)
            ->where('books.1.title', $oldBook->title)
        );
    }
}
