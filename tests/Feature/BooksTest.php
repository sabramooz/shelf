<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BooksTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_can_fetch_paginated_list_of_books()
    {
        // Create test books
        $books = Book::factory(15)->create();

        $response = $this->getJson('/api/books');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'author',
                        'language',
                        'publisher',
                        'price',
                        'cover_image',
                        'popularity',
                        'created_at',
                        'updated_at'
                    ]
                ],
                'links',
                'current_page',
                'last_page',
                'per_page',
                'total'
            ]);

        // Should return paginated results
        $this->assertCount(10, $response->json('data')); // Default pagination is 10
    }

    /** @test */
    public function it_can_sort_books_by_popularity_desc()
    {
        // Create books with different popularity
        $lowPopularBook = Book::factory()->create(['popularity' => 5]);
        $highPopularBook = Book::factory()->create(['popularity' => 50]);
        $mediumPopularBook = Book::factory()->create(['popularity' => 25]);

        $response = $this->getJson('/api/books?sort=popularity&direction=desc');

        $response->assertStatus(200);

        $data = $response->json('data');
        $this->assertEquals($highPopularBook->id, $data[0]['id']);
        $this->assertEquals($mediumPopularBook->id, $data[1]['id']);
        $this->assertEquals($lowPopularBook->id, $data[2]['id']);
    }

    /** @test */
    public function it_can_sort_books_by_popularity_asc()
    {
        // Create books with different popularity
        $lowPopularBook = Book::factory()->create(['popularity' => 5]);
        $highPopularBook = Book::factory()->create(['popularity' => 50]);
        $mediumPopularBook = Book::factory()->create(['popularity' => 25]);

        $response = $this->getJson('/api/books?sort=popularity&direction=asc');

        $response->assertStatus(200);

        $data = $response->json('data');
        $this->assertEquals($lowPopularBook->id, $data[0]['id']);
        $this->assertEquals($mediumPopularBook->id, $data[1]['id']);
        $this->assertEquals($highPopularBook->id, $data[2]['id']);
    }

    /** @test */
    public function it_can_sort_books_by_price_desc()
    {
        // Create books with different prices
        $cheapBook = Book::factory()->create(['price' => 10.99]);
        $expensiveBook = Book::factory()->create(['price' => 99.99]);
        $mediumBook = Book::factory()->create(['price' => 50.50]);

        $response = $this->getJson('/api/books?sort=price&direction=desc');

        $response->assertStatus(200);

        $data = $response->json('data');
        $this->assertEquals($expensiveBook->id, $data[0]['id']);
        $this->assertEquals($mediumBook->id, $data[1]['id']);
        $this->assertEquals($cheapBook->id, $data[2]['id']);
    }

    /** @test */
    public function it_can_sort_books_by_price_asc()
    {
        // Create books with different prices
        $cheapBook = Book::factory()->create(['price' => 10.99]);
        $expensiveBook = Book::factory()->create(['price' => 99.99]);
        $mediumBook = Book::factory()->create(['price' => 50.50]);

        $response = $this->getJson('/api/books?sort=price&direction=asc');

        $response->assertStatus(200);

        $data = $response->json('data');
        $this->assertEquals($cheapBook->id, $data[0]['id']);
        $this->assertEquals($mediumBook->id, $data[1]['id']);
        $this->assertEquals($expensiveBook->id, $data[2]['id']);
    }

    /** @test */
    public function it_can_add_book_to_cart()
    {
        $book = Book::factory()->create();

        $response = $this->postJson('/api/cart', [
            'book_id' => $book->id,
            'quantity' => 2
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Book added to cart successfully',
                'cart_count' => 1
            ]);

        // Verify the book is in the session cart
        $this->assertArrayHasKey($book->id, session('cart', []));
        $this->assertEquals(2, session('cart')[$book->id]['quantity']);
    }

    /** @test */
    public function it_can_get_cart_contents()
    {
        $book1 = Book::factory()->create(['title' => 'Book One', 'price' => 25.99]);
        $book2 = Book::factory()->create(['title' => 'Book Two', 'price' => 15.50]);

        // Add books to cart
        session(['cart' => [
            $book1->id => [
                'id' => $book1->id,
                'title' => $book1->title,
                'price' => $book1->price,
                'quantity' => 2
            ],
            $book2->id => [
                'id' => $book2->id,
                'title' => $book2->title,
                'price' => $book2->price,
                'quantity' => 1
            ]
        ]]);

        $response = $this->getJson('/api/cart');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'cart' => [
                    '*' => [
                        'id',
                        'title',
                        'price',
                        'quantity'
                    ]
                ],
                'total_items',
                'total_price'
            ]);

        $data = $response->json();
        $this->assertEquals(2, count($data['cart']));
        $this->assertEquals(3, $data['total_items']); // 2 + 1
        $this->assertEquals(67.48, $data['total_price']); // (25.99 * 2) + (15.50 * 1)
    }

    /** @test */
    public function it_validates_required_fields_when_adding_to_cart()
    {
        $response = $this->postJson('/api/cart', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['book_id']);
    }

    /** @test */
    public function it_validates_book_exists_when_adding_to_cart()
    {
        $response = $this->postJson('/api/cart', [
            'book_id' => 999, // Non-existent book
            'quantity' => 1
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['book_id']);
    }

    /** @test */
    public function it_defaults_quantity_to_1_when_not_provided()
    {
        $book = Book::factory()->create();

        $response = $this->postJson('/api/cart', [
            'book_id' => $book->id
        ]);

        $response->assertStatus(200);

        // Verify quantity defaults to 1
        $this->assertEquals(1, session('cart')[$book->id]['quantity']);
    }

    /** @test */
    public function it_updates_quantity_when_adding_same_book_to_cart()
    {
        $book = Book::factory()->create();

        // First addition
        $this->postJson('/api/cart', [
            'book_id' => $book->id,
            'quantity' => 2
        ]);

        // Second addition
        $response = $this->postJson('/api/cart', [
            'book_id' => $book->id,
            'quantity' => 3
        ]);

        $response->assertStatus(200);

        // Verify quantity is updated (not added)
        $this->assertEquals(5, session('cart')[$book->id]['quantity']);
    }
}
