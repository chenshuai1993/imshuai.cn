let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .styles([
        'resources/assets/tag/jquery.tagsinput.css'
    ], 'public/css/topic.css')
   .scripts([
       'resources/assets/js/mditor.js',
       'resources/assets/tag/jquery.tagsinput.js'
   ], 'public/js/topic.js')
   .copyDirectory('resources/editor/js', 'public/js')
   .copyDirectory('resources/editor/css', 'public/css')
   .version()


