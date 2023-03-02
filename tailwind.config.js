const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary' :' #007bff',
                'h-primary': '#0069d9',
                'danger' : '#dc3545',
                'h-danger' : '#c82333',
                'warning' : '#ffc107',
                'h-warning': '#e0a800'
            },
           
        },
        
    },
    
    plugins: [require('@tailwindcss/forms')],
};
