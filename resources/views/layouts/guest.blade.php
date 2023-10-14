<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    <!-- Vite Preload Configuration -->
    @vite([
        // Styles
        "resources/css/bootstrap.min.css",
        "resources/css/icons.min.css",
        "resources/css/app.min.css",
        "resources/css/toastr.min.css",
        // JavaScripts
        "resources/libs/jquery/jquery.min.js",
        "resources/libs/bootstrap/js/bootstrap.bundle.min.js",
        "resources/libs/metismenu/metisMenu.min.js",
        "resources/libs/simplebar/simplebar.min.js",
        "resources/libs/node-waves/waves.min.js",
        "resources/js/app.js",
        "resources/js/toastr.min.js",
        "resources/js/notification.js",
    ])

    <link rel="stylesheet" href="{{ env('BASE_URL') }}/resources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/resources/css/icons.min.css" />
    <link rel="stylesheet" href="{{ env('BASE_URL') }}/resources/css/app.min.css" />

</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    <!-- Preload individual scripts -->
    <script src="{{ env('BASE_URL') }}/resources/libs/jquery/jquery.min.js"></script>
    <script src="{{ env('BASE_URL') }}/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ env('BASE_URL') }}/resources/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ env('BASE_URL') }}/resources/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ env('BASE_URL') }}/resources/libs/node-waves/waves.min.js"></script>
    <script src="{{ env('BASE_URL') }}/resources/js/app.js"></script>

    <script>
        var sessionData = {!! json_encode([
            'message' => Session::get('message'),
            'alertType' => Session::get('alert-type', 'info'),
        ]) !!};
    </script>
</body>
</html>
