import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // Styles
                'resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css',
                'resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                'resources/libs/select2/css/select2.min.css',
                'resources/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                'resources/css/bootstrap.min.css',
                'resources/css/icons.min.css',
                'resources/css/app.min.css',

                // Javascripts
                'resources/js/app.js',
                'resources/libs/jquery/jquery.min.js',
                'resources/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/libs/metismenu/metisMenu.min.js',
                'resources/libs/simplebar/simplebar.min.js',
                'resources/libs/node-waves/waves.min.js',
                'resources/libs/apexcharts/apexcharts.min.js',
                'resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js',
                'resources/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js',
                'resources/libs/datatables.net/js/jquery.dataTables.min.js',
                'resources/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'resources/libs/datatables.net-responsive/js/dataTables.responsive.min.js',
                'resources/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                'resources/libs/select2/js/select2.min.js',
                'resources/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                'resources/js/pages/dashboard.init.js',
                'resources/js/pages/form-advanced.init.js',
                'resources/js/main-js.js',
                'resources/js/toastr.min.js',
                'resources/js/notification.js',
                'resources/js/datatables.init.js',
                'resources/js/validate.min.js',
                'resources/js/input-validator.js',
                'resources/js/handlebars.js',
                'resources/js/notify.min.js',
            ],
            refresh: true,
        }),
    ],
});
