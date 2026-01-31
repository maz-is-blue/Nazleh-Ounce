import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Cormorant Garamond', 'serif'],
                body: ['Inter', 'sans-serif'],
            },
            colors: {
                background: '#07202A',
                foreground: '#ffffff',
                primary: '#8BD4E2',
                muted: '#0a2a38',
            },
        },
    },

    plugins: [forms],
};
