import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.jsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundColor: {
                'custom-background': '#FBFBFE',
                'custom-primary': '#2F27CE',
                'custom-secondary': '#DEDCFF',
                'custom-accent': '#443DFF',
            },
            textColor: {
                'custom-text': '#050315',
                'custom-secondary': '#DEDCFF',
                'custom-accent': '#443DFF',
            },
            borderColor: {
                'custom-primary': '#2F27CE',
                'custom-secondary': '#DEDCFF',
                'custom-accent': '#443DFF',
            },
        },
    },

    plugins: [forms],
};
