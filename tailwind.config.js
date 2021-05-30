module.exports = {
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                light: "var(--light)",
                dark: "var(--dark)",
                darker: "var(--darker)",
                ocean: {
                    100: "#d0d5db",
                    200: "#a1abb8",
                    300: "#738294",
                    400: "#445871",
                    500: "#152e4d",
                    600: "#12263f",
                    700: "#0d1c2e",
                    800: "#08121f",
                    900: "#04090f",
                },
                teal: {
                    100: "#d3f6fc",
                    200: "#a7edf8",
                    300: "#7ae5f5",
                    400: "#4edcf1",
                    500: "#22d3ee",
                    600: "#1ba9be",
                    700: "#147f8f",
                    800: "#0e545f",
                    900: "#072a30",
                },
            },
        },
    },
    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
