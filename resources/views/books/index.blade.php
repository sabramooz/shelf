<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelf - IT Technical Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('books.index') }}" class="flex items-center text-xl font-semibold text-purple-600">
                        <img src="{{ asset('logo.png') }}" alt="Shelf Logo" class="h-8 w-auto mr-2">
                        Shelf
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-lg mx-8">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input
                            type="text"
                            placeholder="Search for books..."
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-purple-500 focus:border-purple-500 sm:text-sm"
                        />
                    </div>
                </div>

                <!-- Icons -->
                <div class="flex items-center space-x-4">
                    <!-- Cart Icon -->
                    <button class="p-2 text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m.6 0L6 7M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                        </svg>
                    </button>

                    <!-- User Icon -->
                    <button class="p-2 text-gray-400 hover:text-gray-500">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Page Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900 mb-4 sm:mb-0">
                    Featured IT Technical Books
                </h1>

                <!-- Sort Dropdown -->
                <div class="flex items-center">
                    <label for="sort" class="text-sm font-medium text-gray-700 mr-2">
                        Sort By:
                    </label>
                    <select
                        id="sort"
                        class="border border-gray-300 rounded-md px-3 py-1.5 text-sm focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500"
                    >
                        <option value="popularity">Popularity</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="title">Title A-Z</option>
                        <option value="author">Author A-Z</option>
                    </select>
                </div>
            </div>

            <!-- Books Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @forelse($books as $book)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden">
                        <!-- Book Image -->
                        <div class="aspect-[3/4] relative">
                            <img
                                src="{{ $book->image }}"
                                alt="{{ $book->title }}"
                                class="w-full h-full object-cover"
                            />
                        </div>

                        <!-- Book Details -->
                        <div class="p-4">
                            <!-- Title -->
                            <h3 class="font-semibold text-gray-900 text-sm mb-2 line-clamp-2 leading-tight">
                                <a href="{{ route('books.show', $book->id) }}" class="hover:text-purple-600 transition-colors duration-200">
                                    {{ $book->title }}
                                </a>
                            </h3>

                            <!-- Author -->
                            <p class="text-gray-600 text-sm mb-1">
                                {{ $book->author }}
                            </p>

                            <!-- Language -->
                            <p class="text-gray-500 text-xs mb-1">
                                Language: {{ $book->language }}
                            </p>

                            <!-- Publisher -->
                            <p class="text-gray-500 text-xs mb-3">
                                Publisher: {{ $book->publisher }}
                            </p>

                            <!-- Price and Add to Cart -->
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-semibold text-purple-600">
                                    ${{ number_format($book->price, 2) }}
                                </span>
                                <button class="bg-purple-600 text-white px-3 py-1.5 rounded-md text-sm font-medium hover:bg-purple-700 transition-colors duration-200">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-gray-500">No books found.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($books->hasPages())
                <div class="flex justify-center items-center space-x-2">
                    {{-- Previous Button --}}
                    @if ($books->onFirstPage())
                        <span class="px-3 py-2 text-sm font-medium rounded-md bg-gray-100 text-gray-400 cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $books->previousPageUrl() }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                        @if ($page == $books->currentPage())
                            <span class="px-3 py-2 text-sm font-medium rounded-md bg-purple-600 text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Button --}}
                    @if ($books->hasMorePages())
                        <a href="{{ $books->nextPageUrl() }}" class="px-3 py-2 text-sm font-medium rounded-md bg-white text-gray-700 hover:bg-gray-50 border border-gray-300">
                            Next
                        </a>
                    @else
                        <span class="px-3 py-2 text-sm font-medium rounded-md bg-gray-100 text-gray-400 cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="text-gray-600 text-sm mb-4 md:mb-0">
                    © 2025 Shelf. All rights reserved.
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
                        About Us
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
                        Contact
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
                        Privacy Policy
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
