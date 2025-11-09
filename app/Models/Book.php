<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'language',
        'publisher',
        'price',
        'cover_image',
        'popularity',
        'pages',
        'description',
        'isbn',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'popularity' => 'integer',
    ];
}
