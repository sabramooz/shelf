# Laravel Books Page Setup - Complete Documentation

This document contains all the code and instructions for setting up a database-driven Books page in Laravel with React/Inertia.js and Tailwind CSS.

## Overview

This setup includes:
- Database migration for books table
- Book Eloquent model
- Seeder with 25 sample IT technical books
- Controller using Inertia.js
- Routes for listing and detail pages
- React components with Tailwind CSS (already created)
- Feature tests with Inertia assertions

## Tech Stack

- **Backend**: Laravel 11
- **Frontend**: React 19 + Inertia.js
- **Styling**: Tailwind CSS 4.0
- **Build Tool**: Vite

## Installation Steps

### 1. Install Dependencies

```bash
npm install
```

### 2. Run Migrations

```bash
php artisan migrate
```

This creates the `books` table with fields:
- id, title, author, language, publisher, price, pages, isbn (unique), image, summary, timestamps

### 3. Seed the Database

```bash
php artisan db:seed --class=BooksTableSeeder
```

This populates the database with 25 sample IT technical books.

### 4. Start Development Servers

Terminal 1 - Laravel:
```bash
php artisan serve
```

Terminal 2 - Vite:
```bash
npm run dev
```

Visit: `http://localhost:8000/books`

### 5. Run Tests

```bash
php artisan test --filter BooksTest
```

## File Structure

```
app/
├── Http/Controllers/
│   └── BookController.php          # Inertia controller
└── Models/
    └── Book.php                    # Eloquent model

database/
├── migrations/
│   └── 2024_01_10_000000_create_books_table.php
└── seeders/
    ├── BooksTableSeeder.php        # 25 books
    └── DatabaseSeeder.php

resources/
├── js/
│   ├── components/
│   │   ├── Header.jsx              # Header with search
│   │   ├── Footer.jsx              # Footer component
│   │   └── BookCard.jsx            # Book card component
│   ├── Pages/
│   │   └── Books/
│   │       ├── Index.jsx           # Books listing (React)
│   │       └── Show.jsx            # Book details (React)
│   └── data/
│       └── books.jsx               # Fallback sample data
└── css/
    └── app.css                     # Tailwind config

routes/
└── web.php                         # Routes

tests/
└── Feature/
    └── BooksTest.php               # Inertia tests
```

## Database Schema

```sql
CREATE TABLE books (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    language VARCHAR(255) DEFAULT 'English',
    publisher VARCHAR(255) NOT NULL,
    price DECIMAL(8,2) NOT NULL,
    pages INT NOT NULL,
    isbn VARCHAR(255) UNIQUE NOT NULL,
    image TEXT,
    summary TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Key Features

### Books Listing Page (`/books`)
- **React Component**: `resources/js/Pages/Books/Index.jsx`
- Responsive 3-column grid (1 col mobile, 2 tablet, 3 desktop)
- Client-side search with "contains" criteria on book titles
- Cross button to clear search filter
- "No results" message when search returns empty
- Client-side sorting (Popularity, Price, Title, Author)
- Client-side pagination (9 books per page)
- All data fetched from database via Inertia

### Book Details Page (`/books/{id}`)
- **React Component**: `resources/js/Pages/Books/Show.jsx`
- Large book image
- Complete book information from database
- Summary section
- Specifications table
- Quantity selector
- "Add to cart" button
- "Back to all books" link

### Components
- **Header.jsx**: Logo, search bar with clear button, cart & user icons
- **Footer.jsx**: Copyright and navigation links
- **BookCard.jsx**: Reusable book card with Inertia Link

## How It Works

1. **Laravel Controller** fetches all books from database
2. **Inertia.js** passes data to React component as props
3. **React Component** handles:
   - Client-side search filtering
   - Client-side sorting
   - Client-side pagination
   - UI interactions
4. **Tailwind CSS** provides all styling

## Sample Data

The seeder includes 25 IT technical books:
1. Clean Code
2. The Mythical Man-Month
3. Designing Data-Intensive Applications
4. Code Complete
5. Introduction to Algorithms
6. Refactoring
7. The DevOps Handbook
8. Structure and Interpretation of Computer Programs
9. Accelerate
10. JavaScript: The Good Parts
11. System Design Interview
12. Docker Deep Dive
13. Kubernetes in Action
14. Building Microservices
15. You Don't Know JS
16. High Performance MySQL
17. Learning React
18. Effective Java
19. Grokking Algorithms
20. Python Crash Course
21. The Pragmatic Programmer
22. Head First Design Patterns
23. Eloquent JavaScript
24. The Art of Computer Programming
25. Cracking the Coding Interview

## Testing

Tests verify:
- ✅ Index page returns 200 status
- ✅ Index page displays books from database via Inertia
- ✅ Show page returns 200 status
- ✅ Show page displays book details via Inertia
- ✅ Non-existent book returns 404
- ✅ Books ordered by newest first

Run tests:
```bash
php artisan test --filter BooksTest
```

## Acceptance Criteria Met

✅ **Pagination**: 9 books per page (client-side)  
✅ **Search**: Contains criteria on book titles  
✅ **Clear Search**: Cross button appears when searching  
✅ **No Results**: Shows "There isn't any book with your search keyword."

## Quick Commands

```bash
# Fresh start
php artisan migrate:fresh --seed

# Run specific seeder
php artisan db:seed --class=BooksTableSeeder

# Run tests
php artisan test --filter BooksTest

# Start servers
php artisan serve          # Terminal 1
npm run dev                # Terminal 2
```

## Customization

### Add More Books

Edit `database/seeders/BooksTableSeeder.php` and add to the `$books` array.

### Change Pagination

Edit `resources/js/Pages/Books/Index.jsx`:
```javascript
const booksPerPage = 12; // Change from 9 to 12
```

### Server-Side Pagination

If you prefer server-side pagination, update the controller:

```php
public function index()
{
    $books = Book::orderBy('created_at', 'desc')->paginate(9);
    
    return Inertia::render('Books/Index', [
        'books' => $books
    ]);
}
```

Then update the React component to use Laravel pagination links.

## Production Considerations

1. **Images**: Use local storage or CDN instead of external URLs
2. **Caching**: Cache book queries for better performance
3. **Search**: Implement server-side search for large datasets
4. **API**: Add API endpoints for mobile apps
5. **Admin**: Create CRUD interface for managing books
6. **Cart**: Implement shopping cart with sessions/database
7. **Authentication**: Add user authentication
8. **Payment**: Integrate payment gateway

## Troubleshooting

### Inertia Not Working

Ensure Inertia middleware is registered in `bootstrap/app.php` or `app/Http/Kernel.php`.

### React Components Not Loading

Check that Vite is running:
```bash
npm run dev
```

### Database Connection Error

Update `.env` file with correct database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shelf
DB_USERNAME=root
DB_PASSWORD=
```

### Migration Already Exists

```bash
php artisan migrate:fresh --seed
```

## Architecture

This implementation uses:
- **Laravel** for backend API and routing
- **Inertia.js** as the glue between Laravel and React
- **React** for interactive UI components
- **Tailwind CSS** for styling
- **Vite** for fast development and building

The React components handle all UI logic (search, sort, pagination) while Laravel provides the data from the database.

## License

This code is provided as-is for educational purposes.
