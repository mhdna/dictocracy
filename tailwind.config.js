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
            colors: {
                gruvbox: {
                    dark: "#282828",
                    light: "#fbf1c7",
                    red: "#cc241d",
                    green: "#98971a",
                    yellow: "#d79921",
                    blue: "#458588",
                    purple: "#b16286",
                    aqua: "#689d6a",
                    orange: "#d65d0e",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sageland: ["Sageland", "sans-serif"],
            },
        },
    },
    plugins: [],
};
