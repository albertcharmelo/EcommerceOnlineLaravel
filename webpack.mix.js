const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */


 mix.scripts([
  
    'node_modules/chart.js/dist/Chart.min.js',
    
    
    // "node_modules/jquery-sparkline/jquery.sparkline.min.js",
    "node_modules/chart.js/dist/Chart.min.js",
    // "node_modules/owl.carousel/dist/owl.carousel.min.js",
    // "node_modules/chocolat/dist/js/jquery.chocolat.min.js",
],  'public/js/app.js')

mix.styles([
    
   
 
    "node_modules/owl.carousel/dist/assets/owl.carousel.min.css",
    "node_modules/owl.carousel/dist/assets/owl.theme.default.min.css",
],  'public/css/app.css');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
