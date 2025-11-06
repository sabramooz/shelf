# Books List Page Implementation

## Setup Steps

• **Tailwind CSS & Vite Configuration**: Already configured in `vite.config.js` with React and Tailwind plugins
• **Dependencies**: React 19.1.1, Tailwind CSS 4.0.0, Inertia.js for Laravel integration
• **Node.js Upgrade**: Updated from 18.15.0 to 22.21.1 for Vite compatibility

## File Structure

• **Main Component**: `resources/js/Pages/BookStore.jsx` - Complete book store layout
• **Routing**: `routes/web.php` - Inertia route rendering BookStore component
• **Styling**: `resources/css/app.css` - Tailwind imports and custom theme

## Key Components

• **Navigation Bar**: Logo ("📘 Shelf"), centered search with clear button, cart/user icons
• **Book Cards Grid**: 3-column responsive layout (1→2→3 columns) with hover effects
• **Search Functionality**: Real-time filtering on book titles with "contain" criteria
• **Pagination**: 9 books per page, resets when searching, shows page numbers
• **No Results State**: Custom message "There isn't any book with your search keyword"

## Technical Implementation

• **React Hooks**: `useState` for search/pagination state, `useMemo` for optimized filtering
• **Responsive Design**: Mobile-first approach using Tailwind breakpoints (`sm:`, `lg:`)
• **Interactive Features**: Search input with cross button, hover transitions, disabled states
• **Data**: 24 sample books for testing pagination functionality

## Development Commands

```bash
npm run dev          # Start Vite development server
php artisan serve    # Start Laravel server
```

Page accessible at `http://127.0.0.1:8000`
