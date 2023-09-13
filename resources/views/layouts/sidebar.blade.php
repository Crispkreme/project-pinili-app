<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <x-user-detail />

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @php
                $menuLists = [
                    [
                        'list' => 'Menu',
                        'url' => '',
                        'icon' => '',
                        'class' => 'menu-title',
                        'isMenuTitle' => true,
                    ],[
                        'list' => 'Dashboard',
                        'url' => route('admin.dashboard'),
                        'icon' => '<i class="ri-dashboard-line"></i>',
                        'class' => 'waves-effect',
                        'isMenuTitle' => false,
                    ],[
                        'list' => 'Manage Users',
                        'url' => 'javascript: void(0);',
                        'icon' => '<i class="ri-chat-smile-3-line"></i>',
                        'class' => 'has-arrow waves-effect',
                        'isMenuTitle' => false,
                        'submenu' => [
                            [
                                'list' => 'All Customer',
                                'url' => route('admin.all.user'),
                                'icon' => '',
                                'class' => '',
                            ],[
                                'list' => 'All Represetative',
                                'url' => '',
                                'icon' => '',
                                'class' => '',
                            ],
                        ],
                    ],[
                        'list' => 'Sample Menu',
                        'url' => '',
                        'icon' => '',
                        'class' => 'menu-title',
                        'isMenuTitle' => true,
                    ],[
                        'list' => 'Calendar',
                        'url' => 'calendar.html',
                        'icon' => '<i class="ri-calendar-2-line"></i>',
                        'class' => 'waves-effect',
                        'isMenuTitle' => false,
                    ],[
                        'list' => 'Email',
                        'url' => 'javascript: void(0);',
                        'icon' => '<i class="ri-mail-send-line"></i>',
                        'class' => 'has-arrow waves-effect',
                        'isMenuTitle' => false,
                        'submenu' => [
                            [
                                'submenu' => [
                                    [
                                        'list' => 'Inbox',
                                        'url' => 'email-inbox.html',
                                    ],[
                                        'list' => 'Read Email',
                                        'url' => 'email-read.html',
                                    ]
                                ],
                            ]
                        ],
                    ],[
                        'list' => 'Layouts',
                        'url' => 'javascript: void(0);',
                        'icon' => '<i class="ri-layout-3-line"></i>',
                        'class' => 'has-arrow waves-effect',
                        'isMenuTitle' => false,
                        'submenu' => [
                            [
                                'list' => 'Vertical',
                                'url' => 'javascript: void(0);',
                                'icon' => '',
                                'class' => 'has-arrow',
                                'submenu' => [
                                    [
                                        'list' => 'Dark Sidebar',
                                        'url' => 'layouts-dark-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Compact Sidebar',
                                        'url' => 'layouts-compact-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Icon Sidebar',
                                        'url' => 'layouts-icon-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Boxed Layout',
                                        'url' => 'layouts-boxed.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Preloader',
                                        'url' => 'layouts-preloader.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Colored Sidebar',
                                        'url' => 'layouts-colored-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],
                                ],
                            ],[
                                'list' => 'Horizontal',
                                'url' => 'javascript: void(0);',
                                'icon' => '',
                                'class' => 'has-arrow',
                                'submenu' => [
                                    [
                                        'list' => 'Dark Sidebar',
                                        'url' => 'layouts-dark-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Compact Sidebar',
                                        'url' => 'layouts-compact-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Icon Sidebar',
                                        'url' => 'layouts-icon-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Boxed Layout',
                                        'url' => 'layouts-boxed.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Preloader',
                                        'url' => 'layouts-preloader.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Colored Sidebar',
                                        'url' => 'layouts-colored-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],
                                ],
                            ],
                        ],
                    ],[
                        'list' => 'Pages',
                        'url' => '',
                        'icon' => '',
                        'class' => 'menu-title',
                    ],[
                        'list' => 'Authentication',
                        'url' => 'javascript: void(0);',
                        'icon' => '<i class="ri-account-circle-line"></i>',
                        'class' => 'has-arrow waves-effect',
                        'isMenuTitle' => false,
                        'submenu' => [
                            [
                                'list' => 'Vertical',
                                'url' => 'javascript: void(0);',
                                'icon' => '',
                                'class' => 'has-arrow',
                                'submenu' => [
                                    [
                                        'list' => 'Dark Sidebar',
                                        'url' => 'layouts-dark-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Compact Sidebar',
                                        'url' => 'layouts-compact-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Icon Sidebar',
                                        'url' => 'layouts-icon-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Boxed Layout',
                                        'url' => 'layouts-boxed.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Preloader',
                                        'url' => 'layouts-preloader.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],[
                                        'list' => 'Colored Sidebar',
                                        'url' => 'layouts-colored-sidebar.html',
                                        'icon' => '',
                                        'class' => '',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ];
            @endphp

            <x-sidebar-menu :sidebarMenuLists="$menuLists" />
        </div>
        <!-- Sidebar -->
    </div>
</div>
