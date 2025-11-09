import React, { useState, useMemo, useEffect } from 'react';
import { Link } from '@inertiajs/react';

const BookStore = () => {
  const [sortBy, setSortBy] = useState('Popularity');
  const [currentPage, setCurrentPage] = useState(1);
  const [searchQuery, setSearchQuery] = useState('');
  const [books, setBooks] = useState([]);
  const [loading, setLoading] = useState(true);
  const [pagination, setPagination] = useState({});

  // Fetch books from API
  useEffect(() => {
    fetchBooks();
  }, [currentPage, sortBy]);

  const fetchBooks = async () => {
    try {
      setLoading(true);

      // Map sort options to API parameters
      const getSortParams = (sortOption) => {
        switch (sortOption) {
          case 'Price: Low to High':
            return { sort: 'price', direction: 'asc' };
          case 'Price: High to Low':
            return { sort: 'price', direction: 'desc' };
          case 'Newest':
            return { sort: 'created_at', direction: 'desc' };
          case 'Title A-Z':
            return { sort: 'title', direction: 'asc' };
          case 'Popularity':
          default:
            return { sort: 'popularity', direction: 'desc' };
        }
      };

      const { sort, direction } = getSortParams(sortBy);
      const response = await fetch(`/api/books?page=${currentPage}&per_page=9&sort=${sort}&direction=${direction}`);
      const data = await response.json();

      setBooks(data.data || []);
      setPagination({
        current_page: data.current_page,
        last_page: data.last_page,
        total: data.total
      });
    } catch (error) {
      console.error('Error fetching books:', error);
      setBooks([]);
    } finally {
      setLoading(false);
    }
  };

  // Filter books based on search query
  const filteredBooks = useMemo(() => {
    if (!searchQuery.trim()) {
      return books;
    }
    return books.filter(book =>
      book.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
      book.author.toLowerCase().includes(searchQuery.toLowerCase())
    );
  }, [books, searchQuery]);

  const currentBooks = searchQuery.trim() ? filteredBooks : books;
  const totalPages = searchQuery.trim() ? 1 : (pagination.last_page || 1);

  // Handle search input change and reset pagination
  const handleSearchChange = (e) => {
    setSearchQuery(e.target.value);
    setCurrentPage(1); // Reset to first page when searching
  };

  // Handle sort change
  const handleSortChange = (e) => {
    setSortBy(e.target.value);
    setCurrentPage(1); // Reset to first page when sorting
  };

  // Clear search
  const clearSearch = () => {
    setSearchQuery('');
    setCurrentPage(1);
  };

  const BookCard = ({ book }) => (
    <Link href={`/book/${book.id}`}>
      <div className="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow cursor-pointer">
        <div className="aspect-[3/4] overflow-hidden bg-gray-100">
          <img
            src={book.cover_image || "https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"}
            alt={book.title}
            className="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
          />
        </div>
        <div className="p-4">
          <h3 className="font-semibold text-gray-900 text-sm mb-2 line-clamp-2 leading-tight">
            {book.title}
          </h3>
          <p className="text-gray-600 text-xs mb-1">Author: {book.author}</p>
          <p className="text-gray-500 text-xs mb-3">Publisher: {book.publisher}</p>
          <div className="flex items-center justify-between">
            <span className="text-purple-600 font-bold text-lg">${book.price}</span>
            <button
              className="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors flex items-center"
              onClick={(e) => {
                e.preventDefault();
                // Add to cart functionality here
                console.log('Add to cart:', book.id);
              }}
            >
              <i className="fi fi-rr-shopping-cart-add mr-1"></i>
              Add to cart
            </button>
          </div>
        </div>
      </div>
    </Link>
  );

  const Pagination = () => (
    <div className="flex items-center justify-center space-x-2 mt-8">
      <button
        onClick={() => setCurrentPage(Math.max(1, currentPage - 1))}
        disabled={currentPage === 1}
        className="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        Previous
      </button>

      {Array.from({ length: totalPages }, (_, i) => i + 1).map(page => (
        <button
          key={page}
          onClick={() => setCurrentPage(page)}
          className={`px-3 py-2 text-sm rounded-md ${
            currentPage === page
              ? 'bg-purple-600 text-white'
              : 'text-gray-700 hover:bg-gray-100'
          }`}
        >
          {page}
        </button>
      ))}

      <button
        onClick={() => setCurrentPage(Math.min(totalPages, currentPage + 1))}
        disabled={currentPage === totalPages}
        className="px-3 py-2 text-sm text-gray-500 hover:text-gray-700 disabled:opacity-50 disabled:cursor-not-allowed"
      >
        Next
      </button>
    </div>
  );

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Navigation Bar */}
      <nav className="bg-white shadow-sm border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex items-center justify-between h-16">
            {/* Logo */}
            <div className="flex items-center">
              <i className="fi fi-rr-book-open text-xl text-purple-600 mr-2"></i>
              <span className="text-xl font-bold text-purple-600">Shelf</span>
            </div>

            {/* Search Bar */}
            <div className="flex-1 max-w-lg mx-8">
              <div className="relative">
                <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i className="fi fi-rr-search h-5 w-5 text-gray-400"></i>
                </div>
                <input
                  type="text"
                  value={searchQuery}
                  onChange={handleSearchChange}
                  placeholder="Search for books, authors, or topics..."
                  className="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                />
                {searchQuery && (
                  <button
                    onClick={clearSearch}
                    className="absolute inset-y-0 right-0 pr-3 flex items-center hover:text-gray-700"
                  >
                    <i className="fi fi-rr-cross h-5 w-5 text-gray-400"></i>
                  </button>
                )}
              </div>
            </div>

            {/* Icons */}
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

      {/* Main Content */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {/* Header Section */}
        <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
          <h1 className="text-2xl font-bold text-gray-900 mb-4 sm:mb-0">
            Featured IT Technical Books
          </h1>
          <div className="flex items-center">
            <label className="text-sm text-gray-600 mr-2">Sort By:</label>
            <select
              value={sortBy}
              onChange={handleSortChange}
              className="border border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
            >
              <option value="Popularity">Popularity</option>
              <option value="Price: Low to High">Price: Low to High</option>
              <option value="Price: High to Low">Price: High to Low</option>
              <option value="Newest">Newest</option>
              <option value="Title A-Z">Title A-Z</option>
            </select>
          </div>
        </div>

        {/* Loading State */}
        {loading ? (
          <div className="flex justify-center items-center py-16">
            <div className="animate-spin rounded-full h-12 w-12 border-b-2 border-purple-600"></div>
          </div>
        ) : currentBooks.length > 0 ? (
          <>
            <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
              {currentBooks.map((book) => (
                <BookCard key={book.id} book={book} />
              ))}
            </div>

            {/* Pagination - only show for non-search results */}
            {!searchQuery.trim() && totalPages > 1 && <Pagination />}
          </>
        ) : (
          <div className="text-center py-16">
            <i className="fi fi-rr-book mx-auto text-6xl text-gray-400 mb-4"></i>
            <p className="mt-4 text-lg text-gray-600">
              There isn't any book with your search keyword.
            </p>
            {searchQuery && (
              <button
                onClick={clearSearch}
                className="mt-4 text-purple-600 hover:text-purple-700 font-medium"
              >
                Clear search to see all books
              </button>
            )}
          </div>
        )}
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

export default BookStore;
