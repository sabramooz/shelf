<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Add a book to the cart
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $bookId = $request->input('book_id');
        $quantity = $request->input('quantity', 1);

        $book = Book::findOrFail($bookId);

        // Get current cart from session
        $cart = session('cart', []);

        // Add or update book in cart
        if (isset($cart[$bookId])) {
            // Update existing item quantity
            $cart[$bookId]['quantity'] += $quantity;
        } else {
            // Add new item to cart
            $cart[$bookId] = [
                'id' => $book->id,
                'title' => $book->title,
                'price' => $book->price,
                'quantity' => $quantity
            ];
        }

        // Save cart to session
        session(['cart' => $cart]);

        return response()->json([
            'message' => 'Book added to cart successfully',
            'cart_count' => count($cart)
        ]);
    }

    /**
     * Get cart contents
     */
    public function index()
    {
        $cart = session('cart', []);

        $totalItems = 0;
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalItems += $item['quantity'];
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'cart' => array_values($cart),
            'total_items' => $totalItems,
            'total_price' => round($totalPrice, 2)
        ]);
    }
}
