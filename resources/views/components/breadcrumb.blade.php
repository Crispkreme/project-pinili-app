@php
    $currentRoute = \Route::currentRouteName();
    $routeWithoutPrefix = substr($currentRoute, strpos($currentRoute, '.') + 1);
    if (str_starts_with($currentRoute, 'admin.')) {
        $route = 'admin.';
    } elseif (str_starts_with($currentRoute, 'manager.')) {
        $route = 'manager.';
    }elseif (str_starts_with($currentRoute, 'clerk.')) {
        $route = 'clerk.';
    }elseif (str_starts_with($currentRoute, 'office.')) {
        $route = 'office.';
    } else {
        $route = route('404');
    }

    $routeMappings = [
        'dashboard' => [
            'title' => 'Dashboard',
            'breadcrumb' => ['Dashboard'],
        ],

        // CLINIC STAFF
        'create.user' => [
            'title' => 'Clinic Staff',
            'breadcrumb' => ['Home', 'Create Clinic Staff'],
        ],
        'all.user' => [
            'title' => 'Clinic Staff',
            'breadcrumb' => ['Home', 'List Clinic Staffs'],
        ],
        'edit.user' => [
            'title' => 'Clinic Staff',
            'breadcrumb' => ['Home', 'Update Clinic Staff'],
        ],
        
        // CLINIC REPRESENTATIVE
        'create.representative' => [
            'title' => 'Representative',
            'breadcrumb' => ['Home', 'Create Representative'],
        ],
        'all.representative' => [
            'title' => 'Representative',
            'breadcrumb' => ['Home', 'List Representatives'],
        ],
        'edit.representative' => [
            'title' => 'Representative',
            'breadcrumb' => ['Home', 'Update Representative'],
        ],

        // COMPANY
        'create.company' => [
            'title' => 'Company',
            'breadcrumb' => ['Home', 'Create Company'],
        ],
        'all.company' => [
            'title' => 'Company',
            'breadcrumb' => ['Home', 'List Companies'],
        ],
        'edit.company' => [
            'title' => 'Company',
            'breadcrumb' => ['Home', 'Update Company'],
        ],
        'get.company.profile' => [
            'title' => 'Company',
            'breadcrumb' => ['Home', 'Company Profile'],
        ],

        // CLINIC DISTRIBUTOR
        'create.distributor' => [
            'title' => 'Distributor',
            'breadcrumb' => ['Home', 'Create Distributor'],
        ],
        'all.distributor' => [
            'title' => 'Distributor',
            'breadcrumb' => ['Home', 'List Distributors'],
        ],
        'edit.distributor' => [
            'title' => 'Distributor',
            'breadcrumb' => ['Home', 'Update Distributor'],
        ],

        // CLINIC DRUG CLASSIFICATION
        'create.drug.class' => [
            'title' => 'Drug Classification',
            'breadcrumb' => ['Home', 'Create Drug Classification'],
        ],
        'all.drug.class' => [
            'title' => 'Drug Classification',
            'breadcrumb' => ['Home', 'List Drug Classifications'],
        ],
        'edit.drug.class' => [
            'title' => 'Drug Classification',
            'breadcrumb' => ['Home', 'Update Drug Classification'],
        ],

        // CLINIC PRODUCT
        'create.product' => [
            'title' => 'Product',
            'breadcrumb' => ['Home', 'Create Product'],
        ],
        'all.product' => [
            'title' => 'Product',
            'breadcrumb' => ['Home', 'List Products'],
        ],
        'edit.product' => [
            'title' => 'Product',
            'breadcrumb' => ['Home', 'Update Product'],
        ],

        // PATIENT
        'create.patient' => [
            'title' => 'Patient',
            'breadcrumb' => ['Home', 'Create Patient'],
        ],
        'all.patient' => [
            'title' => 'Patient',
            'breadcrumb' => ['Home', 'List Patients'],
        ],
        'edit.patient' => [
            'title' => 'Patient',
            'breadcrumb' => ['Home', 'Update Patient'],
        ],

        // ORDER
        'create.order' => [
            'title' => 'Order',
            'breadcrumb' => ['Home', 'Create Order'],
        ],
        'all.order' => [
            'title' => 'Order',
            'breadcrumb' => ['Home', 'List Orders'],
        ],
        'edit.order' => [
            'title' => 'Order',
            'breadcrumb' => ['Home', 'Update Order'],
        ],
        'pending.order' => [
            'title' => 'Product Deliver',
            'breadcrumb' => ['Home', 'Product Deliver'],
        ],
        'all.delete.order' => [
            'title' => 'Deleted Order',
            'breadcrumb' => ['Home', 'Deleted Order'],
        ],
        'print.invoice.order' => [
            'title' => 'Print Invoice',
            'breadcrumb' => ['Home', 'Print Invoice'],
        ],
        'approve.order.list' => [
            'title' => 'Invoice',
            'breadcrumb' => ['Home', 'Approve Invoice'],
        ],

        // INVENTORY
        'stock.report' => [
            'title' => 'Stock Report',
            'breadcrumb' => ['Home', 'List of Stock Reports'],
        ],
        'product.supplier.wise.report' => [
            'title' => 'Product Wise Report',
            'breadcrumb' => ['Home', 'List of Product Wise Reports'],
        ],
        'daily.order.report' => [
            'title' => 'Daily Invoice Report',
            'breadcrumb' => ['Home', 'List of Daily Invoice Reports'],
        ],
        'all.inventory.sheet' => [
            'title' => 'Payable',
            'breadcrumb' => ['Home', 'List of Payables'],
        ],
        'all.patient.checkup' => [
            'title' => 'Patient Checkup',
            'breadcrumb' => ['Home', 'List of Patient Checkups'],
        ],
        'all.patient.prescription' => [
            'title' => 'Patient Prescription',
            'breadcrumb' => ['Home', 'List of Patient Prescriptions'],
        ],
        'patient.payment' => [
            'title' => 'Cashier',
            'breadcrumb' => ['Home', 'For Payment'],
        ],
        'cashier' => [
            'title' => 'Cashier',
            'breadcrumb' => ['Home', 'Walk in'],
        ],

        // PETTY CASH 
        'create.petty.cash' => [
            'title' => 'Petty Cash',
            'breadcrumb' => ['Home', 'Create Petty Cash'],
        ],
        'petty.cash' => [
            'title' => 'Petty Cash',
            'breadcrumb' => ['Home', 'List Petty Cashs'],
        ],
        'edit.petty.cash' => [
            'title' => 'Petty Cash',
            'breadcrumb' => ['Home', 'Update Petty Cash'],
        ],
    ];

    $routeInfo = $routeMappings[$routeWithoutPrefix] ?? null;
@endphp

<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    @if ($routeInfo)
        <h4 class="mb-sm-0">{{ $routeInfo['title'] }}</h4>
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                @foreach ($routeInfo['breadcrumb'] as $key => $breadcrumb)
                    <li class="breadcrumb-item">
                        @if ($key < count($routeInfo['breadcrumb']) - 1)
                            <a href="{{ route($route.'dashboard') }}">{{ $breadcrumb }}</a>
                        @else
                            <span class="active">{{ $breadcrumb }}</span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>
    @endif
</div>