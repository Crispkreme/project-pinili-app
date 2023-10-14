<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>

    @include('sweetalert::alert')

    <!-- Vite Preload Configuration -->
    @vite([
        // Styles
        "resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css",
        "resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
        "resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css",
        "resources/libs/select2/css/select2.min.css",
        "resources/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css",
        "resources/css/bootstrap.min.css",
        "resources/css/icons.min.css",
        "resources/css/app.min.css",

        // JavaScripts
        "resources/js/app.js",
        "resources/libs/jquery/jquery.min.js",
        "resources/libs/bootstrap/js/bootstrap.bundle.min.js",
        "resources/libs/metismenu/metisMenu.min.js",
        "resources/libs/simplebar/simplebar.min.js",
        "resources/libs/node-waves/waves.min.js",
        "resources/libs/apexcharts/apexcharts.min.js",
        "resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js",
        "resources/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js",
        "resources/libs/datatables.net/js/jquery.dataTables.min.js",
        "resources/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
        "resources/libs/datatables.net-responsive/js/dataTables.responsive.min.js",
        "resources/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js",
        "resources/libs/select2/js/select2.min.js",
        "resources/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
        "resources/js/pages/dashboard.init.js",
        "resources/js/main-js.js",
    ])

    <!-- Preload individual stylesheets -->
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/jquery-jvectormap-1.2.2-f88cd739.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/dataTables.bootstrap4.min-7cab5959.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/responsive.bootstrap4.min-3c581196.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/select2.min-2c9bdbaa.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/bootstrap-datepicker.min-899d976e.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/bootstrap.min-63a4e9c3.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/icons.min-b7531e5d.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/build/assets/app.min-96a4fbd2.css" />

    @stack('styles')
</head>
<body data-topbar="dark">
    <main>
        {{ $slot }}
    </main>

    <!-- Preload individual scripts -->
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/app-6e0eadfb.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/jquery.min-f90c37dd.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/bootstrap.bundle.min-4ee18840.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/metisMenu.min-ac42e4c2.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/simplebar.min-7c985667.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/waves.min-e35a64a6.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/apexcharts.min-3cc4a6db.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/jquery-jvectormap-1.2.2.min-6500bd1b.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/jquery-jvectormap-us-merc-en-2dcce3e5.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/jquery.dataTables.min-c12b4525.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/dataTables.bootstrap4.min-32568e35.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/dataTables.responsive.min-3476268d.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/responsive.bootstrap4.min-450f8a54.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/select2.min-a7b7bc49.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/bootstrap-datepicker.min-b4a8aa2a.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/dashboard.init-f98b2b9f.js"></script>
    <script type="module" src="{{ env('BASE_URL') }}/build/assets/main-js-334f9dc9.js"></script>

    @stack('scripts')
</body>
</html>
