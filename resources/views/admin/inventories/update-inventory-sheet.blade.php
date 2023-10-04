<x-app-layout>

    @push('styles')
    @endpush

    <link rel="stylesheet" href="http://[::1]:5173/resources/libs/select2/css/select2.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/icons.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/app.min.css" />

    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Information</h4>
                                    <p class="card-title-desc">You can add here you product information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">
                                                {{ $error}}
                                            </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Invoice Number</label>
                                                    <h5>{{ $inventorySheet[0]['invoice_number'] }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Date</label>
                                                    <h5>{{ \Carbon\Carbon::parse($inventorySheet[0]['created_at'])->format('F j, Y') }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Supplier</label>
                                                <select class="form-select select-2" style="width:98%;" name="supplier_id" aria-label="Default select example" id="supplier_id">
                                                    <option value="{{ $inventorySheet[0]['distributor_id'] }}">{{ $inventorySheet[0]['distributor']['entity']['name'] }}</option>
                                                    @if (empty($representativeData))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($representativeData as $representativeDataId => $name)
                                                            <option value="{{ $representativeDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Product</label>
                                                <select class="form-select select-2" style="width:98%;" name="product_id" aria-label="Default select example" id="product_id">
                                                    <option value="">Select Product Name</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">OR/PR Number</label>
                                                <input class="form-control" name="or_number" type="text" id="or_number" value="{{ $inventorySheet[0]['or_number'] }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">OR/PR Date</label>
                                                <input class="form-control" name="or_date" type="date" value="{{ $inventorySheet[0]['or_date'] }}" id="or_date">
                                            </div>
                                        </div>
                                        <div class="row" style="align-items: flex-end;">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">Delivery Number</label>
                                                        <input class="form-control" name="delivery_number" type="text" id="delivery_number" value="{{ $inventorySheet[0]['delivery_number'] }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">Delivery Date</label>
                                                        <input class="form-control" name="delivery_date" type="date" value="2011-08-19" id="delivery_date" value="{{ $inventorySheet[0]['delivery_date'] }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">PO Order</label>
                                                        <input class="form-control po_number" name="po_number" type="text" value="" id="po_number" value="{{ $inventorySheet[0]['po_number'] }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.store.inventory.sheet') }}" id="myForm">
                                        @csrf
                                        <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                                            <thead>
                                                <tr>
                                                    <th style="width:30%;padding:10px;">Medicine Name</th>
                                                    <th style="width:30%;padding:10px;">Generic Name</th>
                                                    <th style="width:10%;padding:10px;text-align:center;">Price</th>
                                                    <th style="width:10%;padding:10px;text-align:center;">Qty</th>
                                                    <th style="width:10%;padding:10px;text-align:center;">Total Price</th>
                                                    <th style="text-align:center;width:5%;padding: 10px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orderData as $key => $item)
                                                    <tr>
                                                        <td style="padding:10px;">
                                                            {{ $item->product->medicine_name }}
                                                        </td>
                                                        <td style="padding:10px;">
                                                            {{ $item->product->generic_name }}
                                                        </td>
                                                        <td style="padding:10px;text-align:center;">
                                                            {{ $item->purchase_cost }}
                                                        </td>
                                                        <td style="padding:10px;text-align:center;">
                                                            {{ $item->quantity }}
                                                        </td>
                                                        <td style="padding:10px;text-align:center;">
                                                            {{ $item->purchase_cost * $item->quantity }}
                                                        </td>
                                                        <td style="padding:10px;text-align:center;">
                                                            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td>Remarks</td>
                                                    <td colspan="2">
                                                        <textarea
                                                        placeholder="Remarks"
                                                        class="form-control"
                                                        rows="2"
                                                        name="description"
                                                        id="description"
                                                        >{{ $inventorySheet[0]['description'] }}</textarea>
                                                    </td>
                                                    <td>Paid Amount</td>
                                                    <td colspan="3">
                                                        <input
                                                        type="text"
                                                        class="form-control current_paid_amount"
                                                        id="current_paid_amount"
                                                        name="current_paid_amount"
                                                        value="{{ $inventoryPayment[0]['paid_amount'] }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Status</td>
                                                    <td colspan="2">
                                                        <select
                                                        class="form-select select-2"
                                                        name="payment_status_id"
                                                        aria-label="Default select example"
                                                        id="payment_status_id">
                                                            <option selected disabled>
                                                                {{ $inventoryPayment[0]['payment_status']['status'] }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>Discount</td>
                                                    <td colspan="3">
                                                        <input
                                                        type="text"
                                                        class="form-control discount_amount"
                                                        id="discount_amount"
                                                        name="discount_amount"
                                                        value="{{ $inventoryPayment[0]['discount_amount'] }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td>Due Amount</td>
                                                    <td colspan="3">
                                                        <input
                                                        type="text"
                                                        class="form-control due_amount"
                                                        id="due_amount"
                                                        name="due_amount"
                                                        value="{{ $inventoryPayment[0]['due_amount'] }}"
                                                        style="background-color:#ddd;"
                                                        readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td>Balance</td>
                                                    <td colspan="3">
                                                        <input
                                                        type="text"
                                                        class="form-control balance"
                                                        id="balance"
                                                        name="balance"
                                                        value="{{ $inventoryPayment[0]['balance'] }}"
                                                        style="background-color:#ddd;"
                                                        readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3"></td>
                                                    <td>Total Amount</td>
                                                    <td colspan="3">
                                                        <input
                                                        type="text"
                                                        class="form-control total_amount"
                                                        id="total_amount"
                                                        name="total_amount"
                                                        value="{{ $inventoryPayment[0]['total_amount'] }}"
                                                        style="background-color:#ddd;"
                                                        readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button class="btn btn-info mt-2" id="storeButton">
                                                <i class="ri-printer-line align-middle ms-2"></i>
                                                Print Delivery Received
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

    <script src="http://[::1]:5173/resources/libs/jquery/jquery.min.js"></script>
    <script src="http://[::1]:5173/resources/js/handlebars.js"></script>

    <script src="http://[::1]:5173/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/metismenu/metisMenu.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/simplebar/simplebar.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/node-waves/waves.min.js"></script>

    <script src="http://[::1]:5173/resources/libs/select2/js/select2.min.js"></script>
    <script src="http://[::1]:5173/resources/js/pages/form-advanced.init.js"></script>
    <script src="http://[::1]:5173/resources/js/main-js.js"></script>

    @push('scripts')
    @endpush

</x-app-layout>
