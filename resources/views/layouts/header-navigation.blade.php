<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('storage/img/logo-sm.png') }}" alt="logo-sm" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('storage/img/logo-dark.png') }}" alt="logo-dark" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('storage/img/logo-sm.png') }}" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('storage/img/logo-light.png') }}" alt="logo-light" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            <!-- App Search-->
            <x-search-input />

            <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    Mega Menu
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="font-size-14">Account Managements</h5>
                                    @php
                                        $uiComponentList = [
                                            ['list' => 'Users Table'],
                                            ['list' => 'Doctors Table'],
                                            ['list' => 'Suppliers Table'],
                                            ['list' => 'Manufacturers Table'],
                                            ['list' => 'Forms'],
                                            ['list' => 'Tables'],
                                            ['list' => 'Charts']
                                        ];
                                    @endphp

                                    <x-mega-menu :menuLists="$uiComponentList" />
                                </div>

                                <div class="col-md-4">
                                    <h5 class="font-size-14">Applications</h5>
                                    @php
                                        $applicationList = [
                                            ['list' => 'Ecommerce'],
                                            ['list' => 'Calendar'],
                                            ['list' => 'Email'],
                                            ['list' => 'Projects'],
                                            ['list' => 'Tasks'],
                                            ['list' => 'Contacts']
                                        ];
                                    @endphp

                                    <x-mega-menu :menuLists="$applicationList" />
                                </div>

                                <div class="col-md-4">
                                    <h5 class="font-size-14">Extra Pages</h5>
                                    @php
                                        $extraPageList = [
                                            ['list' => 'Light Sidebar'],
                                            ['list' => 'Compact Sidebar'],
                                            ['list' => 'Horizontal layout'],
                                            ['list' => 'Maintenance'],
                                            ['list' => 'Coming Soon'],
                                            ['list' => 'Timeline']
                                        ];
                                    @endphp

                                    <x-mega-menu :menuLists="$extraPageList" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="font-size-14">UI Components</h5>
                                    @php
                                        $uiComponentList = [
                                            ['list' => 'Lightbox'],
                                            ['list' => 'Range Slider'],
                                            ['list' => 'Sweet Alert'],
                                            ['list' => 'Rating'],
                                            ['list' => 'Forms'],
                                            ['list' => 'Tables'],
                                            ['list' => 'Charts']
                                        ];
                                    @endphp

                                    <x-mega-menu :menuLists="$uiComponentList" />
                                </div>

                                <div class="col-sm-5">
                                    <div>
                                        <img src="{{ asset('storage/img/megamenu-img.png') }}" alt="megamenu-img" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-apps-2-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="px-lg-2">
                        @php
                            $socialItem = [
                                [
                                    'url' => '#',
                                    'title' => 'Facebook',
                                    'icon' => 'storage/img/brands/facebook.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Instagram',
                                    'icon' => 'storage/img/brands/instagram.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Viber',
                                    'icon' => 'storage/img/brands/viber.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Messenger',
                                    'icon' => 'storage/img/brands/messenger.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'LinkIn',
                                    'icon' => 'storage/img/brands/linkedin.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Skype',
                                    'icon' => 'storage/img/brands/skype.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Slack',
                                    'icon' => 'storage/img/brands/github.png',
                                ],[
                                    'url' => '#',
                                    'title' => 'Discord',
                                    'icon' => 'storage/img/brands/discord.png',
                                ]
                            ];
                        @endphp

                        <x-admin-contact-info :socialItems="$socialItem" />

                    </div>
                </div>
            </div>

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (auth()->check() && auth()->user()->profile_image)
                        <img class="rounded-circle header-profile-user" src="{{ asset(auth()->user()->profile_image) }}" alt="Header Avatar">
                    @else
                        <img class="rounded-circle header-profile-user" src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="Header Avatar">
                    @endif

                    <span class="d-none d-xl-inline-block ms-1" style="margin: 0 5px;">
                        {{ auth()->user()->username }}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> Change Password</a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="ri-shut-down-line align-middle me-1 text-danger"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
