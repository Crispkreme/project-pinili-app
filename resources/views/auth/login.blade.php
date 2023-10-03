
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Login | Pinili Medical Clinic App') }}</title>

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Scripts -->
        @vite([
            // Styles
            'resources/css/bootstrap.min.css',
            'resources/css/icons.min.css',
            'resources/css/app.min.css',
            'resources/css/toastr.min.css',

            'resources/libs/jquery/jquery.min.js',
            'resources/libs/bootstrap/js/bootstrap.bundle.min.js',
            'resources/libs/metismenu/metisMenu.min.js',
            'resources/libs/simplebar/simplebar.min.js',
            'resources/libs/node-waves/waves.min.js',

            // Javascripts
            'resources/js/app.js',
            'resources/js/toastr.min.js',
            'resources/js/notification.js',
        ])

        <link rel="stylesheet" href="http://[::1]:5173/resources/css/bootstrap.min.css" />
        <link rel="stylesheet" href="http://[::1]:5173/resources/css/icons.min.css" />
        <link rel="stylesheet" href="http://[::1]:5173/resources/css/app.min.css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <h4 class="text-muted text-center font-size-18">
                                    <b>Pinili Medical App</b>
                                </h4>
                                <p><b>Sign In</b></p>
                            </div>
                        </div>

                        <div class="p-3">
                            <form method="POST" action="{{ route('login') }}" class="form-horizontal mt-3">
                                @csrf
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" autocomplete="Email">
                                        <x-input.input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                        <x-input.input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input id="remember_me" type="checkbox" class="custom-control-input" name="remember">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit" style="display:flex;justify-content:center;">
                                            Log In
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group mb-0 row mt-2">
                                    @if (Route::has('password.request'))
                                        <div class="col-sm-7 mt-3">
                                            <a href="{{ route('password.request') }}" class="text-muted">
                                                <i class="mdi mdi-lock"></i>
                                                Forgot your password?
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <script src="http://[::1]:5173/resources/libs/jquery/jquery.min.js"></script>
        <script src="http://[::1]:5173/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="http://[::1]:5173/resources/libs/metismenu/metisMenu.min.js"></script>
        <script src="http://[::1]:5173/resources/libs/simplebar/simplebar.min.js"></script>
        <script src="http://[::1]:5173/resources/libs/node-waves/waves.min.js"></script>

        <script src="http://[::1]:5173/resources/js/app.js"></script>

    </body>
</html>
