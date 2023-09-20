<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="http://[::1]:5173/resources/libs/select2/css/select2.min.css" />
        <link rel="stylesheet" href="http://[::1]:5173/resources/css/bootstrap.min.css" />
        <link rel="stylesheet" href="http://[::1]:5173/resources/css/icons.min.css" />
        <link rel="stylesheet" href="http://[::1]:5173/resources/css/app.min.css" />
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
                                    @if(request()->routeIs('admin.all.order'))
                                        <a href="{{ route('admin.create.order') }}"
                                        class="btn btn-dark btn-rounded waves-effect waves-light"
                                        style="float:right;">Add Order</a>
                                        <br><br>
                                    @endif

                                    <h4 class="card-title">Stock List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our stocks.</p>

                                    <div class="form-check form-check-right mb-3" style="margin-right:20px;">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="productOption" value="product_wise">
                                        <label class="form-check-label" for="formRadiosRight1">
                                            Product Wise Report
                                        </label>
                                    </div>

                                    <div class="form-check form-check-right mb-3">
                                        <input class="form-check-input" type="radio" name="formRadiosRight" id="supplierOption" value="supplier_wise">
                                        <label class="form-check-label" for="formRadiosRight1">
                                            Supplier Wise Report
                                        </label>
                                    </div>

                                    <div class="row mb-3" id="show_supplier" style="display:none;">
                                        <form action="{{ route('admin.get.supplier.wise.report') }}" method="POST" style="display:flex;align-items:flex-end;">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Supplier</label>
                                                <select class="form-select select2"
                                                style="width:98%;"
                                                name="supplier_id"
                                                aria-label="Default select example"
                                                id="wise_supplier_id">
                                                    <option value="" selected>Select Supplier</option>
                                                    @if (empty($suppliers))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($suppliers as $supplierId => $name)
                                                            <option value="{{ $supplierId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <i class="ri-search-2-line align-middle me-2"></i> Search
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="row mb-3" id="show_product" style="display: none;">
                                        <form action="{{ route('admin.get.product.wise.report') }}" method="POST" style="display:flex;align-items:flex-end;">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="name" class="col-form-label">Product</label>
                                                <select class="form-select select2"
                                                style="width:98%;"
                                                name="product_id"
                                                aria-label="Default select example"
                                                id="wise_product_id">
                                                    <option value="" selected>Select Product</option>
                                                    @if (empty($products))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($products as $productId => $name)
                                                            <option value="{{ $productId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    <i class="ri-search-2-line align-middle me-2"></i> Search
                                                </button>
                                            </div>
                                        </form>
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

    @push('scripts')
        <script type="module" src="http://[::1]:5173/resources/libs/jquery/jquery.min.js"></script>
        <script type="module" src="http://[::1]:5173/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="module" src="http://[::1]:5173/resources/libs/metismenu/metisMenu.min.js"></script>
        <script type="module" src="http://[::1]:5173/resources/libs/simplebar/simplebar.min.js"></script>
        <script type="module" src="http://[::1]:5173/resources/libs/node-waves/waves.min.js"></script>

        <script type="module" src="http://[::1]:5173/resources/libs/select2/js/select2.min.js"></script>
        <script type="module" src="http://[::1]:5173/resources/js/pages/form-advanced.init.js"></script>
        <script type="module" src="http://[::1]:5173/resources/js/main-js.js"></script>

        <script>
            const productOption = document.getElementById('productOption');
            const supplierOption = document.getElementById('supplierOption');

            const show_supplier = document.getElementById('show_supplier');
            const show_product = document.getElementById('show_product');

            productOption.addEventListener('change', function () {
                if (productOption.checked) {
                    show_product.style.display = 'block';
                    show_supplier.style.display = 'none';
                } else {
                    show_product.style.display = 'none';
                }
            });

            supplierOption.addEventListener('change', function () {
                if (supplierOption.checked) {
                    show_supplier.style.display = 'block';
                    show_product.style.display = 'none';
                } else {
                    show_supplier.style.display = 'none';
                }
            });
        </script>

    @endpush

</x-app-layout>
