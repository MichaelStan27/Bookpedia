const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(
    [
        "resources/js/app.js",
        "resources/js/cart.js",
        "resources/js/toast-notification.js",
        "resources/js/add-book.js",
        "resources/js/carousel.js",
        "resources/js/filter.js",
        "resources/js/popup.js",
    ],
    "public/js/app.js"
)
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .disableNotifications()
    .browserSync({
        proxy: "localhost:8000",
    });
