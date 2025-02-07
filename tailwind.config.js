import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Noto Sans", "sans-serif"],
                serif: ["Noto Serif", "serif"],
                title: ["Anton", "sans-serif"],
                mono: ["Share Tech Mono", "monospace"],
            },
        },
    },
    plugins: [],
};
