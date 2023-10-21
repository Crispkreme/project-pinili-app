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
                                    <h4 class="card-title">Stock List Data</h4>
                                    <p class="card-title-desc">You select specific products or suppliers to filter our stock list data.</p>

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
                                        <form action="{{ route('admin.get.supplier.wise.report') }}"
                                        method="POST"
                                        style="display:flex;align-items:flex-end;">
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
                                        <form action="{{ route('admin.get.product.wise.report') }}"
                                        method="POST"
                                        style="display:flex;align-items:flex-end;">
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

                            @if($userData!== null)
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable"
                                        class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Invoice Number</th>
                                                    <th>Product Name</th>
                                                    <th>Supplier</th>
                                                    <th>Category</th>
                                                    <th>Form</th>
                                                    <th>Purchase</th>
                                                    <th>Stocks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($userData)
                                                    @foreach($userData as $key => $item)
                                                        <tr style="vertical-align: middle;">
                                                            <td style="text-align: center;">{{ (int)$key + 1 }}</td>
                                                            <td>{{ $item->id_number }}</td>
                                                            <td>{{ $item->product->medicine_name }}</td>
                                                            <td>{{ $item->supplier->name }}</td>
                                                            <td>{{ $item->product->category->name }}</td>
                                                            <td>{{ $item->product->form->name }}</td>
                                                            <td>{{ $item->purchase_stocks }}</td>
                                                            <td>{{ $item->product->sku }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <p>No data available.</p>
                                                @endif
                                            </tbody>
                                        </table>
                                        <p class="mt-5">
                                            <i>Printing Date: {{ now()->format('F j, Y') }}</i>
                                        </p>
                                    </div>
                                </div>
                            @else
                                <p>No data available.</p>
                            @endif

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
