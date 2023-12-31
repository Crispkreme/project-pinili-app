<x-app-layout>

    @push('styles')
    @endpush

    <style>
        input[switch]+label {
            width: 80px !important;
        }
        input[switch]:checked+label:after {
            left: 58px !important;
        }
        select {
            width: 60px !important;
        }
    </style>

    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Inventory Sheet</h4>
                                    <p class="card-title-desc">Display all company list of history</p>

                                    <div class="row">
                                        <div>
                                            <h4 class="card-title">Company: {{ $company->company->company_name }}</h4>
                                            <h4 class="card-title">Address: {{ $company->company->address }}</h4>
                                        </div>
                                        <div class="mb-2" style="display:flex;justify-content:flex-end;">
                                            <a href="{{ route('admin.generate.inventory.sheet', $supplierId) }}"
                                            class="btn btn-success waves-effect waves-light"
                                            target="_blank">
                                                <i class="ri-printer-line align-middle me-2"></i> Generate Report
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active"
                                                    id="v-pills-company-profile-tab"
                                                    data-bs-toggle="pill"
                                                    href="#v-pills-company-profile"
                                                    role="tab"
                                                    aria-controls="v-pills-company-profile"
                                                    aria-selected="false">
                                                    Company Profile
                                                </a>
                                                <a class="nav-link mb-2"
                                                    id="v-pills-order-history-tab"
                                                    data-bs-toggle="pill"
                                                    href="#v-pills-order-history"
                                                    role="tab"
                                                    aria-controls="v-pills-order-history"
                                                    aria-selected="true">
                                                    Order History
                                                </a>
                                                <a class="nav-link mb-2"
                                                    id="v-pills-payment-history-tab"
                                                    data-bs-toggle="pill"
                                                    href="#v-pills-payment-history"
                                                    role="tab"
                                                    aria-controls="v-pills-payment-history"
                                                    aria-selected="false">
                                                    Payment History
                                                </a>
                                                <a class="nav-link mb-2"
                                                    id="v-pills-stocks-tab"
                                                    data-bs-toggle="pill"
                                                    href="#v-pills-stocks"
                                                    role="tab"
                                                    aria-controls="v-pills-stocks"
                                                    aria-selected="false">
                                                    Stocks
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                <div class="tab-pane active fade show"
                                                id="v-pills-company-profile"
                                                role="tabpanel"
                                                aria-labelledby="v-pills-company-profile-tab">
                                                    @foreach($companyHistories as $key => $item)
                                                        <div class="row mb-3">
                                                            <label>Representative/Liason</label>
                                                            <div>
                                                                <input
                                                                class="form-control"
                                                                type="text"
                                                                placeholder="Representative/Liason"
                                                                id="example-text-input"
                                                                value="{{ $item->supplier->name }}"
                                                                >
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label>Company Name</label>
                                                            <div>
                                                                <input
                                                                class="form-control"
                                                                type="text"
                                                                placeholder="Company Name"
                                                                id="example-text-input"
                                                                value="{{ $item->manufacturer->company->company_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-6">
                                                                <label>Contact Number</label>
                                                                <div>
                                                                    <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Contact Number"
                                                                    id="example-text-input"
                                                                    value="{{ $item->manufacturer->company->contact_number }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <label>Landline</label>
                                                                <div>
                                                                    <input
                                                                    class="form-control"
                                                                    type="text"
                                                                    placeholder="Landline"
                                                                    id="example-text-input"
                                                                    value="{{ $item->manufacturer->company->landline }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <label>Email Address</label>
                                                            <div>
                                                                <input
                                                                class="form-control"
                                                                type="text"
                                                                placeholder="Email Address"
                                                                id="example-text-input"
                                                                value="{{ $item->manufacturer->company->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label>Address</label>
                                                            <div>
                                                                <textarea
                                                                required=""
                                                                class="form-control"
                                                                rows="5"
                                                                placeholder="Address">{{ $item->manufacturer->company->address }}</textarea>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-order-history" role="tabpanel" aria-labelledby="v-pills-order-history-tab">
                                                    <div id="order-history-content">
                                                        <table id="datatable"
                                                        class="table table-bordered dt-responsive nowrap"
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice Number</th>
                                                                    <th>Product Name</th>
                                                                    <th>Category</th>
                                                                    <th>Form</th>
                                                                    <th>Approved By</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-payment-history" role="tabpanel" aria-labelledby="v-pills-payment-history-tab">
                                                    <div id="payment-history-content">
                                                        <table id="datatable"
                                                        class="table table-bordered dt-responsive nowrap"
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice Number</th>
                                                                    <th>Product Name</th>
                                                                    <th>Supplier</th>
                                                                    <th>Qty</th>
                                                                    <th>Purchase Cost</th>
                                                                    <th>Received By</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-stocks" role="tabpanel" aria-labelledby="v-pills-stocks-tab">
                                                    <div id="stocks-history-content">
                                                        <table id="datatable"
                                                        class="table table-bordered dt-responsive nowrap"
                                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice Number</th>
                                                                    <th>Medicine Name</th>
                                                                    <th>Generic Name</th>
                                                                    <th>Total Stocks</th>
                                                                    <th>Sold</th>
                                                                    <th>Available</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->

            <x-footer />

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <x-right-sidebar />
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script>
        $(document).ready(function () {
            $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
                if (e.target.id === 'v-pills-payment-history-tab') {
                    $.ajax({
                        url: "{{ route('admin.all.payment.history.company', $supplierId) }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var content = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">';
                            $.each(data, function (index, item) {
                                content += '<tr>';
                                content += '<td>' + item.invoice_number + '</td>';
                                content += '<td>' + item.product.medicine_name + '</td>';
                                content += '<td>' + item.supplier.name + '</td>';
                                content += '<td>' + item.quantity + '</td>';
                                content += '<td>' + item.purchase_cost + '</td>';
                                content += '<td>' + item.user.name + '</td>';

                                if (item.status.status === 'pending') {
                                    content += '<td><span class="badge rounded-pill bg-warning" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else if (item.status.status === 'success') {
                                    content += '<td><span class="badge rounded-pill bg-success" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else if (item.status.status === 'rejected') {
                                    content += '<td><span class="badge rounded-pill bg-danger" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else {
                                    content += '<td>' + item.status.status + '</td>';
                                }
                                content += '</tr>';
                            });
                            content += '</table>';
                            $('#payment-history-content tbody').html(content);
                        },
                        error: function () {
                            console.log('Error fetching payment history data');
                        }
                    });
                } else if (e.target.id === 'v-pills-stocks-tab') {
                    $.ajax({
                        url: "{{ route('admin.all.stock.history.company', $supplierId) }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var content = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">';
                            $.each(data, function (index, item) {
                                content += '<tr>';
                                content += '<td>' + item.invoice_number + '</td>';
                                content += '<td>' + item.product.medicine_name + '</td>';
                                content += '<td>' + item.product.generic_name + '</td>';
                                content += '<td>' + item.product.sku + '</td>';
                                content += '<td>' + item.product.sold + '</td>';
                                content += '<td>' + item.product.available + '</td>';
                                content += '</tr>';
                            });
                            content += '</table>';
                            $('#stocks-history-content tbody').html(content);
                        },
                        error: function () {
                            console.log('Error fetching payment history data');
                        }
                    });
                } else if (e.target.id === 'v-pills-order-history-tab') {
                    $.ajax({
                        url: "{{ route('admin.all.order.history.company', $supplierId) }}",
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            var content = '<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">';
                            $.each(data, function (index, item) {
                                content += '<tr>';
                                content += '<td>' + item.invoice_number + '</td>';
                                content += '<td>' + item.product.medicine_name + '</td>';
                                content += '<td>' + item.product.category.name + '</td>';
                                content += '<td>' + item.product.form.name + '</td>';
                                content += '<td>' + item.approve.name + '</td>';

                                if (item.order_status.status === 'pending') {
                                    content += '<td><span class="badge rounded-pill bg-warning" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else if (item.order_status.status === 'received') {
                                    content += '<td><span class="badge rounded-pill bg-success" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else if (item.order_status.status === 'onhand') {
                                    content += '<td><span class="badge rounded-pill bg-primary" style="font-size:12px;padding:5px;">' + item.status.status + '</span></td>';
                                } else {
                                    content += '<td>' + item.order_status.status + '</td>';
                                }

                                content += '</tr>';
                            });
                            content += '</table>';
                            $('#order-history-content tbody').html(content);
                        },
                        error: function () {
                            console.log('Error fetching payment history data');
                        }
                    });
                } else {
                    console.log('not click tabs');
                }
            });
        });

    </script>


</x-app-layout>
