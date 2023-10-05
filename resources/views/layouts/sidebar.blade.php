<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <x-user-detail />

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @php
                $roleId = Auth::user()->role_id;

                if($roleId == 1) {
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
                                    'list' => 'Customer',
                                    'url' => route('admin.all.user'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Represetative',
                                    'url' => route('admin.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Distributions',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-store-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Company',
                                    'url' => route('admin.all.company'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Distributor',
                                    'url' => route('admin.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('admin.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Product',
                                    'url' => route('admin.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],[
                            'list' => 'Manage Purchase',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-shopping-basket-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Product Order',
                                    'url' => route('admin.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Pending Approval',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Deleted Order',
                                    'url' => route('admin.all.delete.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Print Invoice',
                                    'url' => route('admin.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ]
                            ],
                        ],[
                            'list' => 'Manage Stock',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-swap-box-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Stock Report',
                                    'url' => route('admin.stock.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Product/Supplier Wise Report',
                                    'url' => route('admin.product.supplier.wise.report'),
                                    'icon' => '',
                                    'class' => '',
                                ]
                            ],
                        ],[
                            'list' => 'Manage Invoice',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-survey-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Daily Invoice Report',
                                    'url' => route('admin.daily.order.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Payment Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],[
                            'list' => 'Payables',
                            'url' => route('admin.all.inventory.sheet'),
                            'icon' => '<i class="ri-list-unordered"></i>',
                            'class' => 'waves-effect',
                            'isMenuTitle' => false,
                        ],[
                            'list' => 'Point of Sale',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],[
                            'list' => 'Sample Page',
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
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ];
                }
                if($roleId == 2) {
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
                                    'list' => 'Customer',
                                    'url' => route('admin.all.user'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Represetative',
                                    'url' => route('admin.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Distributions',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-store-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Company',
                                    'url' => route('admin.all.company'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Distributor',
                                    'url' => route('admin.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('admin.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Product',
                                    'url' => route('admin.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],[
                            'list' => 'Manage Purchase',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-shopping-basket-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Product Order',
                                    'url' => route('admin.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Pending Approval',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Deleted Order',
                                    'url' => route('admin.all.delete.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Print Invoice',
                                    'url' => route('admin.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ]
                            ],
                        ],[
                            'list' => 'Manage Invoice',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-survey-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Daily Invoice Report',
                                    'url' => route('admin.daily.order.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Approve Invoice',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Point of Sale',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],[
                            'list' => 'Sample Page',
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
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ];
                }
                if($roleId == 3) {
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
                                    'list' => 'Customer',
                                    'url' => route('admin.all.user'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Represetative',
                                    'url' => route('admin.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Distributions',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-store-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Company',
                                    'url' => route('admin.all.company'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Distributor',
                                    'url' => route('admin.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('admin.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Product',
                                    'url' => route('admin.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],[
                            'list' => 'Manage Purchase',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-shopping-basket-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Product Order',
                                    'url' => route('admin.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Pending Approval',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Deleted Order',
                                    'url' => route('admin.all.delete.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Print Invoice',
                                    'url' => route('admin.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ]
                            ],
                        ],[
                            'list' => 'Manage Invoice',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-survey-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Daily Invoice Report',
                                    'url' => route('admin.daily.order.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Approve Invoice',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Point of Sale',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],[
                            'list' => 'Sample Page',
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
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ];
                }
                if($roleId == 4) {
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
                                    'list' => 'Represetative',
                                    'url' => route('admin.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Distributions',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-store-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Company',
                                    'url' => route('admin.all.company'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Distributor',
                                    'url' => route('admin.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('admin.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Product',
                                    'url' => route('admin.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],[
                            'list' => 'Manage Purchase',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-shopping-basket-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Product Order',
                                    'url' => route('admin.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],[
                                    'list' => 'Print Invoice',
                                    'url' => route('admin.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ]
                            ],
                        ],[
                            'list' => 'Manage Invoice',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-survey-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Daily Invoice Report',
                                    'url' => route('admin.daily.order.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],[
                            'list' => 'Point of Sale',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],[
                            'list' => 'Sample Page',
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
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ];
                }
            @endphp

            <x-sidebar-menu :sidebarMenuLists="$menuLists" />
        </div>
        <!-- Sidebar -->
    </div>
</div>
