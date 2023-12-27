<x-app-layout>

    @push('styles')
    @endpush

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
                                    <div style="display:flex;justify-content:space-between;align-items:center;">
                                        <div>
                                            <h4 class="card-title">Add Product Information</h4>
                                            <p class="card-title-desc">You can add here you product information.</p>
                                        </div>
                                        <div>
                                            <label class="col-form-label" for="name">Date</label>
                                            <h5 id="currentDate"></h5>
                                        </div>
                                    </div>

                                    @if (count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">
                                                {{ $error }} </p>
                                        @endforeach
                                    @endif

                                    <label class="col-form-label" for="name">Patient Information</label>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="col-form-label" for="name">Lastname</label>
                                            <input class="form-control" type="text" value="{{ $patient->lastname }}"
                                                style="text-transform:uppercase;" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="col-form-label" for="name">Firstname</label>
                                            <input class="form-control" type="text" value="{{ $patient->firstname }}"
                                                style="text-transform:uppercase;" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="name">M.I.:</label>
                                            <input class="form-control" type="text" value="{{ $patient->mi }}"
                                                style="text-transform:uppercase;" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-2">
                                            <label class="col-form-label" for="name">Phone</label>
                                            <input class="form-control" type="text"
                                                value="{{ $patient->contact_number }}" style="text-transform:uppercase;"
                                                readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label" for="name">Age</label>
                                            <input class="form-control" type="text" value="{{ $patient->age }}"
                                                style="text-transform:uppercase;" readonly>
                                        </div>
                                        <div class="col-md-5">
                                        </div>
                                    </div>
                                    <div class="row" style="align-items: flex-end;">
                                        <div class="col-md-12">
                                            <label class="col-form-label" for="name">Address</label>
                                            <textarea class="form-control" id="" name="" cols="30" rows="2" readonly>{{ $patient->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form id="myForm" method="POST" action="{{ route('manager.store.order') }}">
                                        @csrf
                                        <input id="prescriptionId" name="prescriptionId" type="hidden"
                                            value="{{ $id }}">
                                        <div class="mt-2"
                                            style="display: flex;justify-content: space-between;align-items: center;">
                                            <label class="col-form-label" for="">Medicine</label>
                                            <div>
                                                <div class="input-group mb-3" id=""
                                                    style="display:flex;align-items: center;">
                                                    <select class="form-control select2" style="width: 200px;">
                                                        <option>Select</option>
                                                        <optgroup label="List of Medicine">
                                                            @foreach ($inventories as $key => $item)
                                                                <option value="{{ $key }}">
                                                                    {{ $item->product->medicine_name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="button">
                                                        <i class="ri-add-fill align-middle me-2"></i> Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table-sm table-bordered" style="border-color:#ddd;"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Generic Name</th>
                                                    <th style="width: 10%;">Unit Price</th>
                                                    <th style="width: 10%;">Qty</th>
                                                    <th style="width: 10%;">Total Price</th>
                                                    <th style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="addRowMedicine" id="addRowMedicine"></tbody>
                                            <tbody class="addRowMedicine" id="output-container"></tbody>
                                        </table>
                                        <div class="mt-2"
                                            style="display: flex;justify-content: space-between;align-items: center;">
                                            <label class="col-form-label" for="">Laboratory</label>
                                            <div>
                                                <div class="input-group mb-3" id=""
                                                    style="display:flex;align-items: center;">
                                                    <select class="form-control select2" style="width: 200px;">
                                                        <option>Select</option>
                                                        <optgroup label="List of Laboratory">
                                                            @foreach ($laboratories as $key => $item)
                                                                <option value="{{ $key }}">
                                                                    {{ $item->laboratory }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="button">
                                                        <i class="ri-add-fill align-middle me-2"></i> Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table-sm table-bordered" style="border-color:#ddd;"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Generic Name</th>
                                                    <th style="width: 10%;">Unit Price</th>
                                                    <th style="width: 10%;">Qty</th>
                                                    <th style="width: 10%;">Total Price</th>
                                                    <th style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tbody class="addRowLaboratory" id="addRowLaboratory"></tbody>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total Amount</td>
                                                    <td colspan="2">
                                                        <input class="form-control total_amount" id="total_amount"
                                                            name="total_amount" type="text" value="0"
                                                            style="background-color:#ddd;" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button class="btn btn-info mt-1" id="storeButton">Update Billing</button>
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

    @push('scripts')
        <script type="text/javascript">
            $(function() {
                $(document).on('click', '.addeventmore', function() {
                    var manufacturer_id = $('#manufacturer_id').val();
                    var supplier_id = $('#supplier_id').val();
                    var manufacturing_date = $('#manufacturing_date').val();
                    var expiry_date = $('#expiry_date').val();
                    var category_id = $('#category_id').val();
                    var form_id = $('#form_id').val();
                    var product_id = $('#product_id').val();
                    var category_name = $('#category_id').find('option:selected').text();
                    var form_name = $('#form_id').find('option:selected').text();
                    var medicine_name = $('#product_id').find('option:selected').text();
                    var generic_name = $('#product_id').find('option:selected').text();
                    var description = $('#product_id').find('option:selected').text();
                    var quantity = $('#quantity').val();
                    var purchase_cost = $('#purchase_cost').val();
                    var srp = $('#srp').val();

                    if (manufacturer_id == '') {
                        $.notify("Manufacturer is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }
                    if (supplier_id == '') {
                        $.notify("Supplier is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }
                    if (category_id == '') {
                        $.notify("Category is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }
                    if (form_id == '') {
                        $.notify("Category is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }
                    if (product_id == '') {
                        $.notify("Product is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }

                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var data = {
                        supplier_id: supplier_id,
                        manufacturer_id: manufacturer_id,
                        product_id: product_id,
                        quantity: quantity,
                        purchase_cost: purchase_cost,
                        srp: srp,
                        expiry_date: expiry_date,
                        manufacturing_date: manufacturing_date,
                        category_id: category_id,
                        form_id: form_id,
                        category_name: category_name,
                        form_name: form_name,
                        medicine_name: medicine_name,
                        generic_name: generic_name,
                        description: description,
                    }
                    var html = template(data);
                    $("#addRowMedicine").append(html);
                });

                $(document).on('click', '.remove_event_more', function() {
                    $(this).closest(".delete_add_more_item").remove();
                    totalAmountPrice();
                });

                $(document).on('keyup click', '.purchase_cost, .quantity', function() {
                    var purchase_cost = $(this).closest("tr").find("input.purchase_cost").val();
                    var quantity = $(this).closest("tr").find("input.quantity").val();
                    var subtotal = purchase_cost * quantity;
                    $(this).closest("tr").find("input.subtotal").val(subtotal);
                    totalAmountPrice();
                });

                function totalAmountPrice() {
                    var sum = 0;
                    $(".subtotal").each(function() {
                        var value = parseFloat($(this).val()) || 0;
                        sum += value;
                    });
                    $('.total_amount').val(sum.toFixed(2));
                }
            });
        </script>
        <script type="text/javascript">
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ url('manager/get/specific/category/') }}/" + category_id,
                    type: "GET",
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        console.log("data", data);
                        var html = '<option value="">Select Product Form</option>';
                        if (data && data.name) {
                            html += '<option value="' + data.id + '">' + data.name + '</option>';
                        }
                        $('#form_id').html(html);
                    }
                });
            });
        </script>
        <script type="text/javascript">
            $(function() {
                $(document).on('change', '#form_id', function() {
                    var form_id = $(this).val();

                    $.ajax({
                        url: "{{ route('manager.get.specific.form') }}",
                        type: "GET",
                        data: {
                            form_id: form_id
                        },
                        success: function(data) {
                            var html = '<option value="">Select Product Name</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.medicine_name +
                                    '</option>';
                            });
                            $('#product_id').html(html);
                        }
                    });
                });
            });
        </script>
        <script>
            function displayCurrentDate() {
                var currentDate = new Date();
                var options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                var formattedDate = currentDate.toLocaleDateString(undefined, options);
                document.getElementById("currentDate").textContent = formattedDate;
            }
            displayCurrentDate();
        </script>

        {{-- FOR CASHIER FUNCTIONALITY --}}
        <script>
            Handlebars.registerHelper('multiply', function(a, b) {
                return a * b;
            });

            $(document).ready(function() {
                $(document).on('keyup', '.srp-input', function() {
                    updateCalculatedValue($(this));
                });

                $(document).on('keyup', '.quantity-input', function() {
                    updateCalculatedValue($(this));
                });

                function updateCalculatedValue(input) {
                    var row = input.closest('tr');
                    var srp = parseFloat(row.find('.srp-input').val()) || 0;
                    var quantity = parseFloat(row.find('.quantity-input').val()) || 0;
                    var calculatedValue = srp * quantity;
                    row.find('.calculated-value').val(calculatedValue);
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                var prescriptionId = $('#prescriptionId').val();

                $.ajax({
                    url: "{{ route('manager.get.patient.medicine.prescription', ['prescriptionId' => ':prescriptionId']) }}"
                        .replace(':prescriptionId', prescriptionId),
                    type: "GET",
                    data: {
                        prescriptionId: prescriptionId
                    },
                    success: function(data) {
                        var source = $("#document-template").html();
                        var template = Handlebars.compile(source);
                        var html = template({
                            products: data
                        });

                        $("#output-container").html(html);
                    }
                });
            });
        </script>
        <script id="document-template" type="text/x-handlebars-template">
            @verbatim
                {{#each products}}
                    <tr>
                        <td>{{ this.product.medicine_name }}</td>
                        <td>{{ this.product.generic_name }}</td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control srp-input" value="{{ this.srp }}">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control quantity-input" value="{{ this.quantity }}">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control calculated-value" value="{{ multiply this.srp this.quantity }}" readonly>
                        </td>
                        <td style="width: 5%;text-align:center;">
                            <i class = "btn btn-danger btn-sm fas fa-window-close remove_event_more" ></i>
                        </td>
                    </tr>
                {{/each}}
            @endverbatim
        </script>
    @endpush

</x-app-layout>
