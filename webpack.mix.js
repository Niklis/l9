const mix = require('laravel-mix');
// const autoprefixer = require('autoprefixer');
const del = require('del');

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

del('public/js/app.js');
del('public/css/app.css');

mix.js('resources/js/app.js', 'public/js');

mix.sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/main.scss', 'public/css/main.css');

// mix.copyDirectory('resources/fonts', 'public/fonts');
