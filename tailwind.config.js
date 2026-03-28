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
                    DEFAULT: '#1A52CE', // أزرق ملكي حيوي
                    light: '#3068E8',   // درجة أفتح للـ Hover
                    dark: '#0F389E',    // درجة أغمق للعناوين والتذييل
                    deep: '#03091A',    // خلفية كحلية عميقة جداً للمقاطع الداكنة
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