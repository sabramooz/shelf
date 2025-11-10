<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Shelf</title>
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
    <main class="flex-1 flex items-center justify-center min-h-[calc(100vh-16rem)]">
        <div class="text-center px-4">
            <!-- 404 Icon -->
            <div class="mb-8">
                <svg class="mx-auto h-32 w-32 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <!-- Error Message -->
            <h1 class="text-6xl font-bold text-gray-900 mb-4">404</h1>
            <h2 class="text-3xl font-semibold text-gray-700 mb-2">Not Found</h2>
            <p class="text-xl text-gray-600 mb-8">Mehdi & Pooya</p>

            <!-- Description -->
            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                The page you're looking for doesn't exist or has been moved.
            </p>

            <!-- Back to Home Button -->
            <a href="{{ route('books.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 transition-colors duration-200">
                <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Back to Home
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t">
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
