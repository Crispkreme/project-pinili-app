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
                                    <h4 class="card-title">Add Product Information</h4>
                                    <p class="card-title-desc">You can add here you product information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Date</label>
                                                    <h5 id="currentDate"></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Supplier</label>
                                                    <select class="form-select select-2" style="width:98%;" name="supplier_id" aria-label="Default select example" id="supplier_id">
                                                        <option selected disabled>Select Supplier</option>
                                                        @if (empty($representativeData))
                                                            <option value="" disabled>No data found</option>
                                                        @else
                                                            @foreach ($representativeData as $representativeDataId => $name)
                                                                <option value="{{ $representativeDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Product</label>
                                                    <select class="form-select select-2" style="width:98%;" name="product_id" aria-label="Default select example" id="product_id">
                                                        <option value="">Select Product Name</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">OR/PR Number</label>
                                                <input class="form-control" name="or_number" type="text" id="or_number">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">OR/PR Date</label>
                                                <input class="form-control" name="or_date" type="date" value="2011-08-19" id="or_date">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">Delivery Number</label>
                                                        <input class="form-control" name="delivery_number" type="text" id="delivery_number">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">Delivery Date</label>
                                                        <input class="form-control" name="delivery_date" type="date" value="2011-08-19" id="delivery_date">
                                                    </div>
                                                    <div class="col">
                                                        <label for="name" class="col-form-label">PO Order</label>
                                                        <input class="form-control po_number" name="po_number" type="text" value="" id="po_number" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div style="display:flex;justify-content: flex-end;">
                                                    <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light addeventmore">
                                                        <i class="ri-add-fill align-middle ms-2" style="margin-right: 1px;"></i>
                                                        Add More
                                                    </button>
                                                </div>
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
                                                    <th>Medicine Name</th>
                                                    <th>Generic Name</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Total Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addRow" class="addRow"></tbody>
                                            <tbody>
                                                <tr>
                                                    <td>Remarks</td>
                                                    <td colspan="3">
                                                        <textarea placeholder="Remarks" class="form-control" rows="2" name="description" id="description"></textarea>
                                                    </td>
                                                    <td>Paid Amount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control current_paid_amount" id="current_paid_amount" name="current_paid_amount" placeholder="0.00">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Status</td>
                                                    <td colspan="3">
                                                        <select class="form-select select-2" style="width:98%;" name="payment_status_id" aria-label="Default select example" id="payment_status_id">
                                                            <option selected disabled>Select Supplier</option>
                                                            <option value="5">Fully Paid</option>
                                                            <option value="6">Pay Due</option>
                                                            <option value="4">Partial Payment</option>
                                                        </select>
                                                    </td>
                                                    <td>Discount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control discount_amount" id="discount_amount" name="discount_amount" placeholder="0.00">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td>Due Amount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control due_amount" id="due_amount" name="due_amount" value="0" style="background-color:#ddd;" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td>Balance</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control balance" id="balance" name="balance" value="0" style="background-color:#ddd;" readonly>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"></td>
                                                    <td>Total Amount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control total_amount" id="total_amount" name="total_amount" value="0" style="background-color:#ddd;" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button class="btn btn-info mt-1" id="storeButton">Delivery Received</button>
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

    <script id="document-template" text="text/x-handlerbars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">

            <input type="hidden" name="supplier_id" value="@{{ supplier_id }}">
            <input type="hidden" name="product_id[]" value="@{{ product_id }}">
            <input type="hidden" name="or_number" value="@{{ or_number }}">
            <input type="hidden" name="or_date" value="@{{ or_date }}">
            <input type="hidden" name="delivery_number" value="@{{ delivery_number }}">
            <input type="hidden" name="delivery_date" value="@{{ delivery_date }}">
            <input type="hidden" name="po_number" value="@{{ po_number }}">
            <input type="hidden" name="current_paid_amount" value="@{{ current_paid_amount }}">

            <td>@{{ medicine_name }}</td>
            <td>@{{ generic_name }}</td>
            <td>
                <input type="number" name="qty[]" class="form-control qty text-right" value="@{{ quantity }}" id="qty" readonly>
            </td>
            <td>
                <input type="number" name="price[]" class="form-control price text-right" value="@{{ purchase_cost }}" id="price" readonly>
            </td>
            <td>
                <input type="text" class="form-control subtotal" id="subtotal" name="subtotal[]" placeholder="0" value="" style="background-color:#ddd;" readonly>
            </td>
            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
            </td>
        </tr>
    </script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click','.addeventmore', function() {
                var supplier_id = $('#supplier_id').val();
                var product_id = $('#product_id').val();
                var subtotal = $('#subtotal').val();
                var or_number = $('#or_number').val();
                var or_date = $('#or_date').val();
                var delivery_number = $('#delivery_number').val();
                var delivery_date = $('#delivery_date').val();
                var po_number = $('#po_number').val();
                var current_paid_amount = $('#current_paid_amount').val();
                var medicine_name = $('#product_id').find('option:selected').text();
                var generic_name = $('#product_id').find('option:selected').text();
                var selectedOption = $('#product_id option:selected');
                var purchase_cost = selectedOption.data('purchase-cost');
                var quantity = selectedOption.data('quantity');

                if(supplier_id == '')
                {
                    $.notify("Supplier is required", { globalPosition: 'top right', className: 'error'});
                    return false;
                }
                if(product_id == '')
                {
                    $.notify("Product is required", { globalPosition: 'top right', className: 'error'});
                    return false;
                }

                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var data = {
                    supplier_id:supplier_id,
                    product_id:product_id,
                    subtotal:subtotal,
                    or_number:or_number,
                    or_date:or_date,
                    delivery_number:delivery_number,
                    delivery_date:delivery_date,
                    po_number:po_number,
                    current_paid_amount:current_paid_amount,
                    medicine_name:medicine_name,
                    generic_name:generic_name,
                    purchase_cost:purchase_cost,
                    quantity:quantity,
                }

                var html = template(data);
                $("#addRow").append(html);
            });

            $(document).on('click','.remove_event_more', function() {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
                dueAmount();
            });

            $(document).on('click keyup', '#discount_amount', function() {
                totalAmountPrice();
                dueAmount();
            });

            $(document).on('click keyup', '#current_paid_amount', function() {
                subTotalPrice();
                dueAmount();
            });

            $(document).on('change','#product_id', function() {
                var product_id = $(this).val();

                $.ajax({
                    url: "{{ route('admin.get.order.transaction') }}",
                    type: "GET",
                    data: { product_id: product_id },
                    success: function(data) {
                        $('#po_number').val(data[0].invoice_number);
                    }
                });

                subTotalPrice();
            });

            $(document).on('change','#supplier_id', function() {
                var supplier_id = $(this).val();

                $.ajax({
                    url: "{{ route('admin.get.specific.product') }}",
                    type: "GET",
                    data: { supplier_id: supplier_id },
                    success: function(data) {

                        var html = '<option value="">Select Product Name</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="'+ v.id +'" data-purchase-cost="'+ v.purchase_cost +'" data-quantity="'+ v.quantity +'">'+ v.product.medicine_name +'</option>';
                        });
                        $('#product_id').html(html);
                    }
                });

                subTotalPrice();
            });

            // calculate the total amount
            function totalAmountPrice() {
                var sum = 0;
                $(".subtotal").each(function () {
                    var value = parseFloat($(this).val()) || 0;
                    sum += value;
                });

                var discount_amount = parseFloat($('#discount_amount').val());
                if(!isNaN(discount_amount) && discount_amount.length != 0){
                    sum -= parseFloat(discount_amount);
                }

                $('.total_amount').val(sum.toFixed(2));
            }

            function dueAmount() {
                var sum = 0;
                $(".subtotal").each(function () {
                    var value = parseFloat($(this).val()) || 0;
                    sum += value;
                });

                $('.due_amount').val(sum.toFixed(2));
            }

            function subTotalPrice() {
                var qty = $('.qty').val();
                var price = $('.price').val();
                var subtotal = qty * price;
                $('.subtotal').val(subtotal);
            }
        });
    </script>
    <script>
        function displayCurrentDate() {
            var currentDate = new Date();
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            var formattedDate = currentDate.toLocaleDateString(undefined, options);
            document.getElementById("currentDate").textContent = formattedDate;
        }
        displayCurrentDate();
    </script>

</x-app-layout>
