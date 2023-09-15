<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Web Portfolio') }}</title>

        <!-- Scripts -->
        @vite([
            // Styles
            'resources/css/app.css',
            'resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css',
            'resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            'resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
            'resources/css/bootstrap.min.css',
            'resources/css/icons.min.css',
            'resources/css/app.min.css',
            'resources/css/toastr.css',

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
            'resources/js/pages/dashboard.init.js',
            'resources/js/main-js.js',
            'resources/js/toastr.min.js',
            'resources/js/notification.js',
            'resources/js/datatables.init.js',
            'resources/js/validate.min.js',
            'resources/js/input-validator.js',
            'resources/js/handlebars.js',
            'resources/js/notify.min.js',
        ])
    </head>
    <body data-topbar="dark">

        <main>
            {{ $slot }}
        </main>

    </body>
</html>
