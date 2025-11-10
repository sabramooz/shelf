<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index()
    {
        // Get all books from database (Inertia component handles pagination on frontend)
        $books = Book::orderBy('created_at', 'desc')->get();

        return Inertia::render('Books/Index', [
            'books' => $books
        ]);
    }

    /**
     * Display the specified book.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return Inertia::render('Books/Show', [
            'book' => $book
        ]);
    }
}
