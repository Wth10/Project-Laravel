const mix = require('laravel-mix');

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

 /* Pasta Css */
mix.copy('resources/views/site/assets/css/*.css', 'public/site/assets/css');
mix.copyDirectory('resources/views/site/assets/css/*.map', 'public/site/assets/css');

/* Pasta Demo*/
mix.copyDirectory('resources/views/site/assets/demo/*.css', 'public/site/assets/demo');
mix.copyDirectory('resources/views/site/assets/demo/*.js', 'public/site/assets/demo');

/* Pasta fonts*/
mix.copyDirectory('resources/views/site/assets/fonts/nucleo.*', 'public/site/assets/fonts');

/* Pasta Js*/
mix.copyDirectory('resources/views/site/assets/js/*.js', 'public/site/assets/js');
mix.copyDirectory('resources/views/site/assets/js/*.map', 'public/site/assets/js');
mix.copyDirectory('resources/views/site/assets/js/core/*.js', 'public/site/assets/js/core');
mix.copyDirectory('resources/views/site/assets/js/plugins/*.js', 'public/site/assets/js/plugins');

/* Pasta Core*/
mix.copyDirectory('resources/views/site/assets/core/*.js', 'public/site/assets/core');

/* Pasta plugins*/
mix.copyDirectory('resources/views/site/assets/plugins/*.js', 'public/site/assets/plugins');

/* Pasta img*/
mix.copyDirectory('resources/views/site/assets/img/*.png', 'public/site/assets/img');

/* Pasta scss*/
mix.copyDirectory('resources/views/site/assets/scss/*.scss', 'public/site/assets/scss');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/*.scss', 'public/site/assets/scss/black-dashboard');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/bootstrap/*.scss', 'public/site/assets/scss/black-dashboard/bootstrap');

mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/custom/*.scss', 'public/site/assets/scss/black-dashboard/custom');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/custom/cards/*.scss', 'public/site/assets/scss/black-dashboard/custom/cards');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/custom/mixins/*.scss', 'public/site/assets/scss/black-dashboard/custom/mixins');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/custom/utilities/*.scss', 'public/site/assets/scss/black-dashboard/custom/utilities');
mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/custom/vendor/*.scss', 'public/site/assets/scss/black-dashboard/custom/vendor');

mix.copyDirectory('resources/views/site/assets/scss/black-dashboard/plugins/*.scss', 'public/site/assets/scss/black-dashboard/plugins');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
