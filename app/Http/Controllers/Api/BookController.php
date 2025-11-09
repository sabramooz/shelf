<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        // Handle sorting
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        // Validate sort field
        $allowedSortFields = ['popularity', 'price', 'created_at', 'title', 'author'];
        if (!in_array($sortField, $allowedSortFields)) {
            $sortField = 'created_at';
        }

        // Validate sort direction
        $allowedDirections = ['asc', 'desc'];
        if (!in_array($sortDirection, $allowedDirections)) {
            $sortDirection = 'desc';
        }

        $query->orderBy($sortField, $sortDirection);

        // Paginate results (default 10 per page)
        $perPage = $request->get('per_page', 10);
        $books = $query->paginate($perPage);

        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
