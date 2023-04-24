const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require("tailwindcss/colors")

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',
        "./node_modules/vue-tailwind-datepicker/**/*.js"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "vtd-primary": colors.sky, // Light mode Datepicker color
                // "vtd-secondary": colors.gray, // Dark mode Datepicker color
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
}
