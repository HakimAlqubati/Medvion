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
            },
            // إضافة الألوان العالمية لمنصة Medvion هنا
            colors: {
                primary: {
                    DEFAULT: '#0A4A7B', // اللون الأساسي (أزرق طبي يعكس الثقة والاحترافية)
                    light: '#1E69A3',   // درجة أفتح (ممتازة لتأثيرات الـ Hover)
                    dark: '#063052',    // درجة أغمق (للعناوين أو التذييل)
                },
                secondary: {
                    DEFAULT: '#0D9488', // اللون الثانوي (أخضر/تيل يعكس الصحة والنمو)
                    light: '#14B8A6',
                    dark: '#0F766E',
                }
            }
        },
    },

    plugins: [forms],
};