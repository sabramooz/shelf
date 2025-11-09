<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CartController;

// The api route group and /api prefix are applied by the framework configuration in bootstrap/app.php.

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);

Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart', [CartController::class, 'index']);
