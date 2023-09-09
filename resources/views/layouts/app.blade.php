<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Web Portfolio') }}</title>

        <!-- Fonts -->
        <link href="{{ asset('libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body data-topbar="dark">

        <main>
            {{ $slot }}
        </main>

        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>
        <script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
