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

mix.js('resources/js/app.js', 'public/js').sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/adminlte.scss', 'public/css')    
    .sass('resources/sass/admin/music_data.scss', 'public/css')
    .sass('resources/sass/user/index.scss', 'public/css/user')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/user/music_listen.scss','public/css/user');

    
    
