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


 mix.combine(['./resources/assets/lib/dashboard/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',
 	'./resources/assets/lib/dashboard/dist/css/style.css',
 	'./resources/assets/lib/dashboard/vendors/bower_components/dropify/dist/css/dropify.min.css'
 	],'./public/dist/css/auth.css')


 mix.combine(['./resources/assets/lib/dashboard/vendors/bower_components/jquery/dist/jquery.min.js',
 	'./resources/assets/lib/dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js',
 	'./resources/assets/lib/dashboard/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
 	'./resources/assets/lib/dashboard/dist/js/jquery.slimscroll.js',
 	'./resources/assets/lib/dashboard/dist/js/dropdown-bootstrap-extended.js',	
 	'./resources/assets/lib/dashboard/dist/js/init.js',
 	],'./public/dist/js/auth.js')


 