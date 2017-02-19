const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass([
        'app.scss',
        'components/main.scss'
    ], 'public/css/app-backoffice.css')
       .webpack([           
            'app-backoffice.js',
        ], 'public/js/app-backoffice.js')
        .scripts([
            'plugins/materialize.js',
            'components/backoffice/main.js',
        ], 'public/js/all-backoffice.js')

        .sass([
            'app.scss',
            'components/main.scss'
        ], 'public/css/app-frontoffice.css')
        .webpack([           
            'app-frontoffice.js',
        ], 'public/js/app-frontoffice.js')
        .scripts([
            'plugins/materialize.js',
            'components/frontoffice/main.js',
        ], 'public/js/all-frontoffice.js')

});
