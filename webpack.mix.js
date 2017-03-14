const { mix } = require('laravel-mix');

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
	.scripts([
		'resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.js',
		'resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.es.min.js',
		'resources/assets/plugins/jquery-validation-1.16.0/dist/jquery.validate.js',
		'resources/assets/plugins/jquery-validation-1.16.0/dist/additional-methods.js',
	], 'public/js/all.js')
   	.styles([
   		'resources/assets/css/navbar-fixed-top.css',
   		'resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.css',
   		'resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.css',
   		'resources/assets/plugins/jquery-validation-1.16.0/demo/css/cmxformTemplate.css',
   		'resources/assets/plugins/jquery-validation-1.16.0/demo/css/cmxform.css',
	], 'public/css/all.css')
	.copy('resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.css.map', 'public/css/bootstrap-datepicker.css.map')
	.copy('resources/assets/plugins/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.css.map', 'public/css/bootstrap-datepicker3.css.map');
