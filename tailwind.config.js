import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
 

/** @type {import('tailwindcss').Config} */
export default  {
    darkMode :"class",
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            darkMode : {
                colors: {
                    //Light Colors
                    'light-icons-primary' : '#f1f5f9',
        
                  },
            },
            colors: {
                //Light Colors
                'light-icons-primary' : '#f1f5f9',
                'light-icons-secondary' : '#e2e8f0',
                'light-text-primary' : '#4b5563',
                'light-text-secondary' : '#2563eb',
                'light-bg-primary' : '#f3f4f6',
                'light-bg-secondary' : '#FFFFFF',


                //Dark Colors
                'dark-bg-primary' : '#040716',
                'dark-bg-secondary' : '#101825',
                'dark-icons-primary' : '#172240',
                'dark-icons-secondary' : '#4C4B5D',
                'dark-text-primary' : '#9ca3af',
                'dark-text-secondary' : '#6366f1',
                // Add more custom colors here
              },
              
        },
    },

    plugins: [forms],
};