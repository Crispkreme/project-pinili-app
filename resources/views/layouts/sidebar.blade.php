<div class="vertical-menu">

    <div class="h-100" data-simplebar>

        <!-- User details -->
        <x-user-detail />

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @php

                $currentRoute = \Route::currentRouteName();
                $roleId = Auth::user()->role_id;

                if (str_starts_with($currentRoute, 'admin.')) {
                    $route = 'admin';
                } elseif (str_starts_with($currentRoute, 'manager.')) {
                    $route = 'manager';
                } else {
                    $route = route('404'); // Assuming '404' is a named route
                }

                if ($roleId == 1) {
                    $menuLists = [
                        [
                            'list' => 'Menu',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Dashboard',
                            'url' => route('admin.dashboard'),
                            'icon' => '<i class="ri-dashboard-line"></i>',
                            'class' => 'waves-effect',
                            'isMenuTitle' => false,
                        ],
                        [
                            'list' => 'Manage Users',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-chat-smile-3-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Clinic Staff',
                                    'url' => route('admin.all.user'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Representative',
                                    'url' => route('admin.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
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
                                ],
                                [
                                    'list' => 'Distributor',
                                    'url' => route('admin.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
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
                                ],
                                [
                                    'list' => 'Product',
                                    'url' => route('admin.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
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
                                ],
                                [
                                    'list' => 'Product Deliver',
                                    'url' => route('admin.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Deleted Order',
                                    'url' => route('admin.all.delete.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Print Invoice',
                                    'url' => route('admin.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
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
                                ],
                                [
                                    'list' => 'Product/Supplier Wise Report',
                                    'url' => route('admin.product.supplier.wise.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
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
                        ],
                        [
                            'list' => 'Payment Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],
                        [
                            'list' => 'Payables',
                            'url' => route('admin.all.inventory.sheet'),
                            'icon' => '<i class="ri-list-unordered"></i>',
                            'class' => 'waves-effect',
                            'isMenuTitle' => false,
                        ],
                        [
                            'list' => 'Patient Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],
                        [
                            'list' => 'Patient',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-account-circle-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Patient',
                                    'url' => route('admin.all.patient'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Checkup',
                                    'url' => route('admin.all.patient.checkup'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Prescription',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-account-circle-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Prescription',
                                    'url' => route('admin.all.patient.prescription'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                    ];
                }

                if ($roleId == 2) {
                    $menuLists = [
                        [
                            'list' => 'Menu',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Dashboard',
                            'url' => route('manager.dashboard'),
                            'icon' => '<i class="ri-dashboard-line"></i>',
                            'class' => 'waves-effect',
                            'isMenuTitle' => false,
                        ],
                        [
                            'list' => 'Manage Users',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-chat-smile-3-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Represetative',
                                    'url' => route('manager.all.representative'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Manage Distributions',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-store-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Company',
                                    'url' => route('manager.all.company'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Distributor',
                                    'url' => route('manager.all.distributor'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('manager.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Product',
                                    'url' => route('manager.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Manage Purchase',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-shopping-basket-2-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Product Order',
                                    'url' => route('manager.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Pending Approval',
                                    'url' => route('manager.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Deleted Order',
                                    'url' => route('manager.all.delete.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Print Invoice',
                                    'url' => route('manager.print.invoice.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Manage Invoice',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-survey-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Daily Invoice Report',
                                    'url' => route('manager.daily.order.report'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Pending Invoice',
                                    'url' => route('manager.pending.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Approve Invoice',
                                    'url' => route('manager.approve.order.list'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Point of Sale',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                        ],
                        [
                            'list' => 'Patient',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-account-circle-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Patient',
                                    'url' => route('manager.all.patient'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Checkup',
                                    'url' => route('manager.all.patient.checkup'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Cashier',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-account-circle-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'For Payment',
                                    'url' => route('manager.patient.payment'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Walk in',
                                    'url' => route('manager.cashier'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                    ];
                }

                if ($roleId == 3 || $roleId == 4) {
                    $menuLists = [
                        [
                            'list' => 'Menu',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Dashboard',
                            'url' => route('clerk.dashboard'),
                            'icon' => '<i class="ri-dashboard-line"></i>',
                            'class' => 'waves-effect',
                            'isMenuTitle' => false,
                        ],
                        [
                            'list' => 'Patient Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Manage Patients',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-user-search-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Patient',
                                    'url' => route('clerk.all.patient'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Checkup',
                                    'url' => route('clerk.all.patient.checkup'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Product Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Manage Products',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Drug Classification',
                                    'url' => route('clerk.all.drug.class'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Product',
                                    'url' => route('clerk.all.product'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                                [
                                    'list' => 'Order',
                                    'url' => route('clerk.all.order'),
                                    'icon' => '',
                                    'class' => '',
                                ],
                            ],
                        ],
                        [
                            'list' => 'Inventory Management',
                            'url' => '',
                            'icon' => '',
                            'class' => 'menu-title',
                            'isMenuTitle' => true,
                        ],
                        [
                            'list' => 'Manage Inventory',
                            'url' => 'javascript: void(0);',
                            'icon' => '<i class="ri-handbag-line"></i>',
                            'class' => 'has-arrow waves-effect',
                            'isMenuTitle' => false,
                            'submenu' => [
                                [
                                    'list' => 'Petty Cash',
                                    'url' => route('clerk.petty.cash'),
                                    'icon' => '',
                                    'class' => '',
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
