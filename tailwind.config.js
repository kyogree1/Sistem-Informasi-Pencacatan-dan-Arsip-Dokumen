import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    navy: '#12284B',
                    blue: '#0055A0',
                    sky: '#8CC1E9',
                    gold: '#DDA336',
                    sand: '#FFF8E7',
                },
                surface: {
                    light: '#FFFFFF',
                    dark: '#0B1220',
                },
            },
            boxShadow: {
                soft: '0 12px 30px -16px rgba(15, 23, 42, 0.35)',
                glow: '0 10px 25px -10px rgba(56, 189, 248, 0.45)',
            },
            borderRadius: {
                '2xl': '1.25rem',
                '3xl': '1.75rem',
            },
        },
    },

    plugins: [forms],
};
