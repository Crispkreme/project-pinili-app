<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>

    @include('sweetalert::alert')

    <!-- Define the base URL using a Blade directive -->
    @php $baseURL = env('BASE_URL'); @endphp

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
    <link rel="stylesheet" href="${baseURL}/resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" href="${baseURL}/resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="${baseURL}/resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="${baseURL}/resources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="${baseURL}/resources/css/icons.min.css" />
    <link rel="stylesheet" href="${baseURL}/resources/css/app.min.css" />

    @stack('styles')
</head>
<body data-topbar="dark">
    <main>
        {{ $slot }}
    </main>

    <!-- Preload individual scripts -->
    <script type="text/javascript" src="${baseURL}/resources/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/metismenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/simplebar/simplebar.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/node-waves/waves.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/apexcharts/apexcharts.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/js/pages/dashboard.init.js"></script>
    <script type="text/javascript" src="${baseURL}/resources/js/main-js.js"></script>

    @stack('scripts')
</body>
</html>
