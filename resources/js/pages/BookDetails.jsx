import React, { useState } from 'react';
import Header from '../components/Header';
import Footer from '../components/Footer';
import { sampleBooks } from '../data/books';

const BookDetails = ({ bookId = 1 }) => {
  const [quantity, setQuantity] = useState(1);

  // Find the book by ID (defaulting to first book for demo)
  const book = sampleBooks.find(b => b.id === parseInt(bookId)) || sampleBooks[0];

  const handleAddToCart = () => {
    console.log(`Adding ${quantity} copies of "${book.title}" to cart`);
    // Add cart functionality here
  };

  const handleQuantityChange = (change) => {
    const newQuantity = quantity + change;
    if (newQuantity >= 1 && newQuantity <= 10) {
      setQuantity(newQuantity);
    }
  };

  return (
    <div className="min-h-screen bg-gray-50 flex flex-col">
      <Header />

      <main className="flex-1">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <div className="bg-white rounded-lg shadow-sm overflow-hidden">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-8">
              {/* Book Image */}
              <div className="flex justify-center lg:justify-start">
                <div className="w-full max-w-md">
                  <img
                    src={book.image}
                    alt={book.title}
                    className="w-full h-auto rounded-lg shadow-md"
                  />
                  {/* Add to favorites */}
                  <div className="mt-4 flex justify-center">
                    <button className="flex items-center text-gray-500 hover:text-red-500 transition-colors duration-200">
                      <svg className="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                      </svg>
                      Add to Wishlist
                    </button>
                  </div>
                </div>
              </div>

              {/* Book Details */}
              <div className="space-y-6">
                <div>
                  <h1 className="text-3xl font-bold text-gray-900 mb-2">
                    {book.title}
                  </h1>
                  <p className="text-xl text-gray-600">
                    By {book.author}
                  </p>
                </div>

                {/* Price */}
                <div className="flex items-center space-x-4">
                  <span className="text-3xl font-bold text-purple-600">
                    ${book.price}
                  </span>
                </div>

                {/* Quantity and Add to Cart */}
                <div className="flex items-center space-x-4">
                  {/* Quantity Selector */}
                  <div className="flex items-center border border-gray-300 rounded-md">
                    <button
                      onClick={() => handleQuantityChange(-1)}
                      disabled={quantity <= 1}
                      className="px-3 py-2 text-gray-600 hover:text-gray-800 disabled:text-gray-400 disabled:cursor-not-allowed"
                    >
                      −
                    </button>
                    <span className="px-4 py-2 bg-gray-50 min-w-[3rem] text-center">
                      {quantity}
                    </span>
                    <button
                      onClick={() => handleQuantityChange(1)}
                      disabled={quantity >= 10}
                      className="px-3 py-2 text-gray-600 hover:text-gray-800 disabled:text-gray-400 disabled:cursor-not-allowed"
                    >
                      +
                    </button>
                  </div>

                  {/* Add to Cart Button */}
                  <button
                    onClick={handleAddToCart}
                    className="bg-purple-600 text-white px-6 py-3 rounded-md font-medium hover:bg-purple-700 transition-colors duration-200 flex items-center"
                  >
                    <svg className="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 3h2l.4 2M7 13h10l4-8H5.4m.6 0L6 7M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                    </svg>
                    Add to cart
                  </button>
                </div>

                {/* Summary */}
                <div>
                  <h2 className="text-xl font-semibold text-gray-900 mb-3">
                    Summary
                  </h2>
                  <p className="text-gray-700 leading-relaxed">
                    {book.summary}
                  </p>
                </div>

                {/* Specifications */}
                <div>
                  <h2 className="text-xl font-semibold text-gray-900 mb-4">
                    Specifications
                  </h2>
                  <div className="space-y-3">
                    <div className="flex justify-between py-2">
                      <span className="font-medium text-gray-600">Language:</span>
                      <span className="text-gray-900">{book.language}</span>
                    </div>
                    <div className="flex justify-between py-2 border-b border-gray-100">
                      <span className="font-medium text-gray-600">Publisher:</span>
                      <span className="text-gray-900">{book.publisher}</span>
                    </div>
                    <div className="flex justify-between py-2 border-b border-gray-100">
                      <span className="font-medium text-gray-600">Pages:</span>
                      <span className="text-gray-900">{book.pages}</span>
                    </div>
                    <div className="flex justify-between py-2">
                      <span className="font-medium text-gray-600">ISBN:</span>
                      <span className="text-gray-900">{book.isbn}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Back to Books Link */}
          <div className="mt-8">
            <a
              href="/"
              className="inline-flex items-center text-purple-600 hover:text-purple-800 font-medium"
            >
              <svg className="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Back to all books
            </a>
          </div>
        </div>
      </main>

      <Footer />
    </div>
  );
};

export default BookDetails;
