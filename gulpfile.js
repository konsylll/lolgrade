var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss').copy(
        'vendor/bower_components/jquery/dist/jquery.min.js',
        'public/js/vendor/jquery.js'
        )
        .copy(
            'vendor/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js',
            'public/js/vendor/bootstrap.min.js'
        )
        .copy(
            'vendor/bower_components/angular/angular.min.js',
            'public/js/vendor/angular.min.js'
        )
        .copy(
            'vendor/bower_components/angular-ui-router/release/angular-ui-router.min.js',
            'public/js/vendor/angular-ui-router.min.js'
        )
        .copy(
            'vendor/bower_components/angular-route/angular-route.min.js',
            'public/js/vendor/angular-route.min.js'
        )
        .copy(
            'vendor/bower_components/angular-resource/angular-resource.min.js',
            'public/js/vendor/angular-resource.min.js'
        ).copy(
            'vendor/bower_components/bootstrap-select/js/bootstrap-select.js',
            'public/js/vendor/bootstrap-select.js'
        )
})
