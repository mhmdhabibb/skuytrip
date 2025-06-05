/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#0066FF',
                'secondary': '#FF6B00',
                'dark': '#1E1E1E',
                'light': '#F5F5F5',
            },
            fontFamily: {
                'sans': ['Inter', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
