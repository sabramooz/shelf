import React from 'react';
import { Link } from '@inertiajs/react';

const BookCard = ({ book, onAddToCart }) => {
  return (
    <div className="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
      {/* Book Image */}
      <div className="aspect-[3/4] relative">
        <img
          src={book.image}
          alt={book.title}
          className="w-full h-full object-cover"
        />
      </div>

      {/* Book Details */}
      <div className="p-4">
        {/* Title */}
        <h3 className="font-semibold text-gray-900 text-sm mb-2 line-clamp-2 leading-tight">
          <Link href={`/books/${book.id}`} className="hover:text-purple-600 transition-colors duration-200">
            {book.title}
          </Link>
        </h3>

        {/* Author */}
        <p className="text-gray-600 text-sm mb-1">
          {book.author}
        </p>

        {/* Language */}
        <p className="text-gray-500 text-xs mb-1">
          Language: {book.language}
        </p>

        {/* Publisher */}
        <p className="text-gray-500 text-xs mb-3">
          Publisher: {book.publisher}
        </p>

        {/* Price and Add to Cart */}
        <div className="flex items-center justify-between">
          <span className="text-lg font-semibold text-purple-600">
            ${book.price}
          </span>
          <button
            onClick={() => onAddToCart(book)}
            className="bg-purple-600 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-purple-700 transition-colors duration-200"
          >
            Add to cart
          </button>
        </div>
      </div>
    </div>
  );
};

export default BookCard;
