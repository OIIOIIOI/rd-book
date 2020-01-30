const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.postCss('resources/css/style.css', 'css/style.css', [
    require('postcss-import'),
    require('postcss-nested'),
    tailwindcss('./tailwind.config.js'),
    require('autoprefixer')
]).js('resources/js/app.js', 'js/app.js');
