import React from 'react';

const Footer = () => {
  return (
    <footer className="bg-gray-50 border-t">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div className="flex flex-col md:flex-row justify-between items-center">
          {/* Copyright */}
          <div className="text-gray-600 text-sm mb-4 md:mb-0">
            © 2025 Shelf. All rights reserved.
          </div>

          {/* Links */}
          <div className="flex space-x-6">
            <a href="/about" className="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
              About Us
            </a>
            <a href="/contact" className="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
              Contact
            </a>
            <a href="/privacy" className="text-gray-600 hover:text-purple-600 text-sm transition-colors duration-200">
              Privacy Policy
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
