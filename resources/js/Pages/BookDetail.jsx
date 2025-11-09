import React, { useState, useEffect } from 'react';
import { Link } from '@inertiajs/react';

const BookDetail = ({ bookId }) => {
  const [book, setBook] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    fetchBook();
  }, [bookId]);

  const fetchBook = async () => {
    try {
      setLoading(true);
      const response = await fetch(`/api/books/${bookId}`);

      if (!response.ok) {
        throw new Error('Book not found');
      }

      const data = await response.json();
      setBook(data);
    } catch (error) {
      console.error('Error fetching book:', error);
      setError(error.message);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <div className="min-h-screen bg-gray-50">
        <nav className="bg-white shadow-sm border-b">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="flex items-center justify-between h-16">
              <div className="flex items-center">
                <Link href="/" className="flex items-center">
                  <i className="fi fi-rr-book text-xl text-purple-600 mr-2"></i>
                  <span className="text-xl font-bold text-purple-600">Shelf</span>
                </Link>
              </div>
            </div>
          </div>
        </nav>

        <div className="flex justify-center items-center py-32">
          <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-purple-600"></div>
        </div>
      </div>
    );
  }

  if (error || !book) {
    return (
      <div className="min-h-screen bg-gray-50">
        <nav className="bg-white shadow-sm border-b">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="flex items-center justify-between h-16">
              <div className="flex items-center">
                <Link href="/" className="flex items-center">
                  <i className="fi fi-rr-book text-xl text-purple-600 mr-2"></i>
                  <span className="text-xl font-bold text-purple-600">Shelf</span>
                </Link>
              </div>
            </div>
          </div>
        </nav>

        <div className="text-center py-32">
          <i className="fi fi-rr-exclamation text-6xl text-gray-400 mb-4"></i>
          <p className="mt-4 text-xl text-gray-600">Book Not Found</p>
          <p className="text-gray-500">The book you're looking for doesn't exist.</p>
          <Link
            href="/"
            className="mt-6 inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 transition-colors"
          >
            <i className="fi fi-rr-angle-left w-4 h-4 mr-2"></i>
            Back to Books
          </Link>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navigation Bar */}
      <nav className="bg-white shadow-sm border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex items-center justify-between h-16">
            <div className="flex items-center">
              <Link href="/" className="flex items-center">
                <i className="fi fi-rr-book text-xl text-purple-600 mr-2"></i>
                <span className="text-xl font-bold text-purple-600">Shelf</span>
              </Link>
            </div>
            <div className="flex items-center space-x-4">
              <button className="relative p-2 text-gray-400 hover:text-gray-500">
                <i className="fi fi-rr-shopping-cart h-6 w-6"></i>
              </button>
              <button className="p-2 text-gray-400 hover:text-gray-500">
                <i className="fi fi-rr-user h-6 w-6"></i>
              </button>
            </div>
          </div>
        </div>
      </nav>

      {/* Breadcrumb */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav className="flex" aria-label="Breadcrumb">
          <ol className="flex items-center space-x-4">
            <li>
              <Link href="/" className="text-gray-500 hover:text-gray-700">
                <i className="fi fi-rr-home w-4 h-4"></i>
              </Link>
            </li>
            <li>
              <div className="flex items-center">
                <i className="fi fi-rr-angle-right flex-shrink-0 h-5 w-5 text-gray-400"></i>
                <span className="ml-4 text-sm font-medium text-gray-500 truncate max-w-xs">
                  {book.title}
                </span>
              </div>
            </li>
          </ol>
        </nav>
      </div>

      {/* Book Details */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
            {/* Book Image */}
            <div className="flex justify-center lg:justify-start">
              <div className="w-80 h-96 bg-gray-100 rounded-lg overflow-hidden shadow-md">
                <img
                  src={book.cover_image || "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"}
                  alt={book.title}
                  className="w-full h-full object-cover"
                />
              </div>
            </div>

            {/* Book Information */}
            <div className="space-y-6">
              <div>
                <h1 className="text-3xl font-bold text-gray-900 mb-4">{book.title}</h1>

                <div className="space-y-3">
                  <div className="flex items-center">
                    <span className="text-sm font-medium text-gray-600 w-24">Author:</span>
                    <span className="text-sm text-gray-800">{book.author}</span>
                  </div>

                  <div className="flex items-center">
                    <span className="text-sm font-medium text-gray-600 w-24">Publisher:</span>
                    <span className="text-sm text-gray-800">{book.publisher}</span>
                  </div>

                  {book.language && (
                    <div className="flex items-center">
                      <span className="text-sm font-medium text-gray-600 w-24">Language:</span>
                      <span className="text-sm text-gray-800">{book.language}</span>
                    </div>
                  )}

                  {book.pages && (
                    <div className="flex items-center">
                      <span className="text-sm font-medium text-gray-600 w-24">Pages:</span>
                      <span className="text-sm text-gray-800">{book.pages} pages</span>
                    </div>
                  )}

                  {book.isbn && (
                    <div className="flex items-center">
                      <span className="text-sm font-medium text-gray-600 w-24">ISBN:</span>
                      <span className="text-sm text-gray-800 font-mono">{book.isbn}</span>
                    </div>
                  )}

                  <div className="flex items-center">
                    <span className="text-sm font-medium text-gray-600 w-24">Price:</span>
                    <span className="text-2xl font-bold text-purple-600">${book.price}</span>
                  </div>

                  {book.popularity && (
                    <div className="flex items-center">
                      <span className="text-sm font-medium text-gray-600 w-24">Popularity:</span>
                      <div className="flex items-center">
                        <div className="flex text-yellow-400">
                          {[...Array(5)].map((_, i) => (
                            <i
                              key={i}
                              className={`fi ${i < Math.floor(book.popularity / 20) ? 'fi-sr-star' : 'fi-rr-star'} w-4 h-4`}
                            ></i>
                          ))}
                        </div>
                        <span className="ml-2 text-sm text-gray-600">({book.popularity}/100)</span>
                      </div>
                    </div>
                  )}
                </div>
              </div>

              {/* Book Description */}
              {book.description && (
                <div className="border-t pt-6">
                  <h3 className="text-lg font-semibold text-gray-900 mb-3">About this book</h3>
                  <p className="text-gray-700 text-sm leading-relaxed">
                    {book.description}
                  </p>
                </div>
              )}

              {/* Action Buttons */}
              <div className="flex flex-col sm:flex-row gap-4 pt-6">
                <button className="flex-1 bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-md text-lg font-medium transition-colors flex items-center justify-center">
                  <i className="fi fi-rr-shopping-cart-add w-5 h-5 mr-2"></i>
                  Add to Cart
                </button>

                <button className="flex-1 border-2 border-purple-600 text-purple-600 hover:bg-purple-50 px-8 py-3 rounded-md text-lg font-medium transition-colors flex items-center justify-center">
                  <i className="fi fi-rr-heart w-5 h-5 mr-2"></i>
                  Add to Wishlist
                </button>
              </div>

              {/* Back to Books Link */}
              <div className="pt-4 border-t">
                <Link
                  href="/"
                  className="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium"
                >
                  <i className="fi fi-rr-angle-left w-4 h-4 mr-2"></i>
                  Back to All Books
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Footer */}
      <footer className="bg-white border-t mt-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
          <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <p className="text-sm text-gray-500 mb-4 sm:mb-0">
              © 2025 Shelf. All rights reserved.
            </p>
            <div className="flex space-x-6">
              <a href="#" className="text-sm text-gray-500 hover:text-gray-700">About Us</a>
              <a href="#" className="text-sm text-gray-500 hover:text-gray-700">Contact</a>
              <a href="#" className="text-sm text-gray-500 hover:text-gray-700">Privacy Policy</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default BookDetail;
