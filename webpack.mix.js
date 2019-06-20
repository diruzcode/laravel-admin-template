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

mix.js('resources/js/dashboard/app.js', 'public/js/dashboard.js')
   .sass('resources/sass/dashboard/app.scss', 'public/css/dashboard.css')

   .combine([
         'node_modules/datatables.net/js/jquery.dataTables.js',
         'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
         'node_modules/datatables.net/js/jquery.dataTables.js',
         'node_modules/datatables.net-responsive/js/dataTables.responsive.js',
         'node_modules/select2/dist/js/select2.min.js',
         'node_modules/moment/min/moment.min.js',
         'node_modules/moment/moment.js',
         'node_modules/daterangepicker/daterangepicker.js',
         './vendor/proengsoft/laravel-jsvalidation/public/js/jsvalidation.js',
         'node_modules/switchery/standalone/switchery.js',
         'node_modules/sweetalert2/dist/sweetalert2.min.js',
         'node_modules/@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor.js',
   ], 'public/js/dashboard_resources.js')

   .combine([
         'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
         'node_modules/datatables.net-responsive-bs/css/responsive.bootstrap.css',
         'node_modules/select2/dist/css/select2.min.css',
         'node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css',
         'node_modules/daterangepicker/daterangepicker.css',
         'node_modules/switchery/standalone/switchery.css',
         'node_modules/sweetalert2/dist/sweetalert2.min.css'
   ], 'public/css/dashboard_resources.css')

   .copyDirectory('resources/img', 'public/img')
   .copyDirectory('resources/fonts', 'public/fonts');
