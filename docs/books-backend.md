# Books Backend API Documentation

This document outlines the Laravel backend implementation for the books listing page, developed using Test-Driven Development (TDD).

## Overview

The backend provides RESTful API endpoints for:
- Fetching paginated and sortable books
- Managing shopping cart functionality
- Session-based cart storage

## Database Schema

### Books Table

| Column | Type | Description |
|--------|------|-------------|
| id | integer | Primary key |
| title | string | Book title |
| author | string | Author name |
| language | string | Book language |
| publisher | string | Publisher name |
| price | decimal(8,2) | Book price |
| cover_image | string (nullable) | Cover image URL |
| popularity | integer | Popularity score (default: 0) |
| created_at | timestamp | Creation timestamp |
| updated_at | timestamp | Last update timestamp |

## API Endpoints

### GET /api/books
Retrieves a paginated list of books with optional sorting.

**Query Parameters:**
- `sort` - Field to sort by (popularity, price, created_at, title, author). Default: created_at
- `direction` - Sort direction (asc, desc). Default: desc  
- `per_page` - Items per page (default: 10)
- `page` - Page number (default: 1)

**Example Requests:**
```bash
# Get all books (paginated)
GET /api/books

# Sort by popularity (highest first)
GET /api/books?sort=popularity&direction=desc

# Sort by price (lowest first) 
GET /api/books?sort=price&direction=asc

# Custom pagination
GET /api/books?per_page=15&page=2
```

**Response Structure:**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "title": "The Great Gatsby",
      "author": "F. Scott Fitzgerald",
      "language": "English",
      "publisher": "Penguin Random House",
      "price": "12.99",
      "cover_image": "https://picsum.photos/300/400?random=1",
      "popularity": 95,
      "created_at": "2025-11-06T17:40:12.000000Z",
      "updated_at": "2025-11-06T17:40:12.000000Z"
    }
  ],
  "first_page_url": "http://localhost/api/books?page=1",
  "from": 1,
  "last_page": 2,
  "last_page_url": "http://localhost/api/books?page=2",
  "links": [...],
  "next_page_url": "http://localhost/api/books?page=2",
  "path": "http://localhost/api/books",
  "per_page": 10,
  "prev_page_url": null,
  "to": 10,
  "total": 20
}
```

### POST /api/cart
Adds a book to the shopping cart.

**Request Body:**
```json
{
  "book_id": 1,
  "quantity": 2
}
```

**Validation Rules:**
- `book_id` - Required, must exist in books table
- `quantity` - Optional integer, minimum 1 (defaults to 1)

**Response:**
```json
{
  "message": "Book added to cart successfully",
  "cart_count": 1
}
```

### GET /api/cart
Retrieves current cart contents.

**Response:**
```json
{
  "cart": [
    {
      "id": 1,
      "title": "The Great Gatsby", 
      "price": "12.99",
      "quantity": 2
    }
  ],
  "total_items": 2,
  "total_price": 25.98
}
```

## Implementation Details

### Models

**Book Model** (`app/Models/Book.php`)
- Uses `HasFactory` trait for testing
- Mass assignable fields: title, author, language, publisher, price, cover_image, popularity
- Casts price to decimal:2 and popularity to integer

### Controllers

**BookController** (`app/Http/Controllers/Api/BookController.php`)
- Handles book listing with sorting and pagination
- Validates sort fields and directions
- Returns paginated JSON responses

**CartController** (`app/Http/Controllers/Api/CartController.php`)
- Manages cart operations (add, view)
- Uses session storage for cart data
- Validates book existence and input data
- Updates quantities for existing items

### Database Setup

**Migration** (`database/migrations/2025_11_06_173655_create_books_table.php`)
- Creates books table with required fields
- Sets proper data types and constraints

**Factory** (`database/factories/BookFactory.php`)
- Generates realistic fake book data for testing
- Uses varied publishers, languages, prices, and popularity scores

**Seeder** (`database/seeders/BookSeeder.php`)
- Populates database with 20 classic books
- Includes realistic data like popular titles, authors, and pricing

## Setup Instructions

1. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

2. **Seed Database:**
   ```bash
   php artisan db:seed --class=BookSeeder
   ```

3. **Run Tests:**
   ```bash
   php artisan test tests/Feature/BooksTest.php
   ```

## Testing

The implementation follows TDD principles with comprehensive test coverage:

- ✅ Paginated book listing
- ✅ Sorting by popularity (asc/desc)
- ✅ Sorting by price (asc/desc) 
- ✅ Adding books to cart
- ✅ Viewing cart contents
- ✅ Input validation
- ✅ Cart quantity management
- ✅ Session persistence

All tests are located in `tests/Feature/BooksTest.php` with 11 passing test cases.

## Frontend Integration

The API is designed to work seamlessly with a Vite + Tailwind frontend:

- JSON responses ready for JavaScript consumption
- Paginated data with navigation links
- Consistent error handling with validation messages
- Session-based cart that persists across requests

## Security Considerations

- Input validation on all user inputs
- Database constraints prevent invalid data
- Session-based storage provides user isolation
- Prepared statements prevent SQL injection

## Performance Notes

- Database indexes on commonly sorted fields (popularity, price)
- Pagination prevents memory issues with large datasets
- Efficient session storage for cart data
- Minimal query overhead with proper Eloquent usage
