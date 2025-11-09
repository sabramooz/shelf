<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('BookStore');
});

Route::get('/book/{id}', function ($id) {
    return Inertia::render('BookDetail', [
        'bookId' => $id
    ]);
});
