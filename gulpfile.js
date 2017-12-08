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
    mix.sass('app.scss');
    mix.styles([
    	'resources/assets/css/icheck/flat/green.css',
        'resources/assets/css/animate.min.css',
    	'resources/assets/css/selectize.css',
        'resources/assets/css/custom.css',
        'resources/assets/css/jquery.mCustomScrollbar.css',
        'resources/assets/css/editor/external/google-code-prettify/prettify.css',
        'resources/assets/css/editor/index.css',
        'resources/assets/css/switchery/switchery.min.css',
    	'resources/assets/css/daterangepicker.css',

    ],'public/css/plugins.css');

    mix.scripts([
    	'resources/assets/js/custom.js'
    ],'public/js/_temp.js');

     mix.scripts([
        'resources/assets/js/nprogress.js',
        'resources/assets/js/icheck/icheck.min.js',
        'resources/assets/js/progressbar/bootstrap-progressbar.min.js',
        'resources/assets/js/jquery.form.js',
        'resources/assets/js/wizard/jquery.smartWizard.js',
        'resources/assets/js/selectize.js',
        'resources/assets/js/jquery.mCustomScrollbar.js',
        'resources/assets/js/editor/bootstrap-wysiwyg.js',
        'resources/assets/js/editor/external/jquery.hotkeys.js',
        'resources/assets/js/switchery/switchery.min.js',
        'resources/assets/js/moment/moment.min.js',
        'resources/assets/js/daterangepicker/jquery.daterangepicker.js',

    ],'public/js/plugins.js');
});
