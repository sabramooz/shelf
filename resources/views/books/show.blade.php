<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Shelf</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-8">
                    <!-- Book Image -->
                    <div class="flex justify-center lg:justify-start">
                        <div class="w-full max-w-md">
                            <img
                                src="{{ $book->image }}"
                                alt="{{ $book->title }}"
                                class="w-full h-auto rounded-lg shadow-md"
                            />
                        </div>
                    </div>

                    <!-- Book Details -->
                    <div class="space-y-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                                {{ $book->title }}
                            </h1>
                            <p class="text-xl text-gray-600">
                                By {{ $book->author }}
                            </p>
                        </div>

                        <!-- Price -->
                        <div class="flex items-center space-x-4">
                            <span class="text-3xl font-bold text-purple-600">
                                ${{ number_format($book->price, 2) }}
                            </span>
                        </div>

                        <!-- Quantity and Add to Cart -->
                        <div class="flex items-center space-x-4">
                            <!-- Quantity Selector -->
                            <div class="flex items-center border border-gray-300 rounded-md">
                                <button class="px-3 py-2 text-gray-600 hover:text-gray-800">
                                    −
                                </button>
                                <span class="px-4 py-2 bg-gray-50 min-w-[3rem] text-center">
                                    1
                                </span>
                                <button class="px-3 py-2 text-gray-600 hover:text-gray-800">
                                    +
                                </button>
                            </div>

                            <!-- Add to Cart Button -->
                            <button class="bg-purple-600 text-white px-6 py-3 rounded-md font-medium hover:bg-purple-700 transition-colors duration-200 flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m.6 0L6 7M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                </svg>
                                Add to cart
                            </button>
                        </div>

                        <!-- Summary -->
                        @if($book->summary)
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-3">
                                Summary
                            </h2>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $book->summary }}
                            </p>
                        </div>
                        @endif

                        <!-- Specifications -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-4">
                                Specifications
                            </h2>
                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Language:</span>
                                    <span class="text-gray-900">{{ $book->language }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Publisher:</span>
                                    <span class="text-gray-900">{{ $book->publisher }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Pages:</span>
                                    <span class="text-gray-900">{{ $book->pages }}</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="font-medium text-gray-600">ISBN:</span>
                                    <span class="text-gray-900">{{ $book->isbn }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Back to Books Link -->
            <div class="mt-8">
                <a href="{{ route('books.index') }}" class="inline-flex items-center text-purple-600 hover:text-purple-800 font-medium">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to all books
                </a>
            </div>
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
