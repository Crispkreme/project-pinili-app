<x-app-layout>

    <style>
        .order-data th,
        .order-data td {
            padding: 5px;
            text-align: center;
        }
    </style>

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
                                                    <label for="name" class="col-form-label">Manufacturer</label>
                                                    <select class="form-control" style="width:100%;" name="manufacturer_id" aria-label="Default select example" id="manufacturer_id">
                                                        @if (empty($distributorData))
                                                            <option value="{{ $orderData->manufacturer_id }}" disabled>
                                                                {{ $orderData->manufacturer->company->company_name }}
                                                            </option>
                                                        @else
                                                            @foreach ($distributorData as $distributorDataId => $name)
                                                                <option value="{{ $distributorDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Supplier</label>
                                                <select class="form-select" style="width:100%;" name="supplier_id" aria-label="Default select example" id="supplier_id">
                                                    @if (empty($representativeData))
                                                        <option value="{{ $orderData->supplier_id }}" disabled>
                                                            {{ $orderData->supplier->name }}
                                                        </option>
                                                    @else
                                                        @foreach ($representativeData as $representativeDataId => $name)
                                                            <option value="{{ $representativeDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Manufacturing Date</label>
                                                <input class="form-control" name="manufacturing_date" type="date" value="{{ $orderData->manufacturing_date }}" id="manufacturing_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="name" class="col-form-label">Expiry Date</label>
                                                <input class="form-control" name="expiry_date" type="date" value="{{ $orderData->expiry_date }}" id="expiry_date">
                                            </div>
                                        </div>
                                        <div class="row" style="align-items: flex-end;">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="name" class="col-form-label">Product Category</label>
                                                        <select class="form-select select-2" style="width:98%;" name="category_id" aria-label="Default select example" id="category_id">
                                                            <option selected disabled>Select Product Category</option>
                                                            @if (empty($categoryData))
                                                                <option value="" disabled>No data found</option>
                                                            @else
                                                                @foreach ($categoryData as $categoryDataId => $name)
                                                                    <option value="{{ $categoryDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="name" class="col-form-label">Product Form</label>
                                                        <select class="form-select select-2" style="width:98%;" name="form_id" aria-label="Default select example" id="form_id">
                                                            <option value="">Select Product Form</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="name" class="col-form-label">Product</label>
                                                        <select class="form-select select-2" style="width:98%;" name="product_id" aria-label="Default select example" id="product_id">
                                                            <option value="">Select Product Name</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div style="display:flex;justify-content:space-between;">
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
                                    <form method="POST" action="{{ route('manager.update.order', $orderData->id) }}" id="myForm">
                                        @csrf
                                        <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                                            <thead>
                                                <tr class="order-data">
                                                    <th class="text-center">ID</th>
                                                    <th style="text-align:left;">Medicine Name</th>
                                                    <th style="text-align:left;">Generic Name</th>
                                                    <th>Form</th>
                                                    <th>Category</th>
                                                    <th style="width: 10%;">Unit Price</th>
                                                    <th style="width: 10%;">Qty</th>
                                                    <th style="width: 10%;">SRP</th>
                                                    <th style="width: 10%;">Total Price</th>
                                                    <th style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($productData as $key => $item)
                                                    <tr class="order-data">
                                                        <input type="hidden" value="{{ $item->id }}" name="order_id[]">
                                                        <td>{{ (int)$key + 1 }}</td>
                                                        <td style="text-align:left;">{{ $item->product->medicine_name }}</td>
                                                        <td style="text-align:left;">{{ $item->product->generic_name }}</td>
                                                        <td>{{ $item->product->form->name }}</td>
                                                        <td>{{ $item->product->category->name }}</td>
                                                        <td style="width: 10%;">
                                                            <input type="number" name="purchase_cost[]" class="form-control purchase_cost text-right" value="{{ $item->purchase_cost }}">
                                                        </td>
                                                        <td style="width: 10%;">
                                                            <input type="number" name="quantity[]" min="1" class="form-control quantity text-right" value="{{ $item->quantity }}">
                                                        </td>
                                                        <td style="width: 10%;">
                                                            <input type="number" name="srp[]" class="form-control srp text-right" value="{{ $item->srp }}">
                                                        </td>
                                                        <td style="width: 10%;">
                                                            <input type="text" class="form-control subtotal" id="subtotal" name="subtotal" value="0" style="background-color:#ddd;" readonly>
                                                        </td>
                                                        <td style="width: 5%;">
                                                            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                <tr>
                                                    <td colspan="7"></td>
                                                    <td>Total Amount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control total_amount" id="total_amount" name="total_amount" value="0" style="background-color:#ddd;" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button class="btn btn-info mt-1" id="storeButton">
                                                <i class="ri-edit-2-line align-middle ms-2" style="margin-right: 1px;"></i>
                                                Edit Purchase Order
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

    @push('scripts')
        <script id="document-template" text="text/x-handlerbars-template">
            <tr class="delete_add_more_item" id="delete_add_more_item">
                <input type="hidden" name="manufacturer_id[]" value="@{{ manufacturer_id }}">
                <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">
                <input type="hidden" name="manufacturing_date[]" value="@{{ manufacturing_date }}">
                <input type="hidden" name="expiry_date[]" value="@{{ expiry_date }}">
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                <input type="hidden" name="form_id[]" value="@{{ form_id }}">
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">

                <td>
                    @{{ medicine_name }}
                </td>
                <td>
                    @{{ generic_name }}
                </td>
                <td>
                    @{{ form_name }}
                </td>
                <td>
                    @{{ category_name }}
                </td>
                <td>
                    <input type="number" name="purchase_cost[]" class="form-control purchase_cost text-right" value="">
                </td>
                <td>
                    <input type="number" name="quantity[]" min="1" class="form-control quantity text-right" value="">
                </td>
                <td>
                    <input type="number" name="srp[]" class="form-control srp text-right" value="">
                </td>
                <td>
                    <input type="text" class="form-control subtotal" id="subtotal" name="subtotal" value="0" style="background-color:#ddd;" readonly>
                </td>
                <td>
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                </td>
            </tr>
        </script>
        <script type="text/javascript">
            $(function(){
                $(document).ready(function() {
                    totalAmountPrice(event); 
                });

                $(document).on('click','.addeventmore', function() {
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

                    if(manufacturer_id == '')
                    {
                        $.notify("Manufacturer is required", { globalPosition: 'top right', className: 'error'});
                        return false;
                    }
                    if(supplier_id == '')
                    {
                        $.notify("Supplier is required", { globalPosition: 'top right', className: 'error'});
                        return false;
                    }
                    if(category_id == '')
                    {
                        $.notify("Category is required", { globalPosition: 'top right', className: 'error'});
                        return false;
                    }
                    if(form_id == '')
                    {
                        $.notify("Category is required", { globalPosition: 'top right', className: 'error'});
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
                        manufacturer_id:manufacturer_id,
                        product_id:product_id,
                        quantity:quantity,
                        purchase_cost:purchase_cost,
                        srp:srp,
                        expiry_date:expiry_date,
                        manufacturing_date:manufacturing_date,
                        category_id:category_id,
                        form_id:form_id,
                        category_name:category_name,
                        form_name:form_name,
                        medicine_name:medicine_name,
                        generic_name:generic_name,
                        description:description,
                    }
                    var html = template(data);
                    $("#addRow").append(html);
                });

                $(document).on('click','.remove_event_more', function(event) {
                    $(this).closest(".delete_add_more_item").remove();
                    totalAmountPrice(event);
                });

                $(document).on('keyup click', '.purchase_cost, .quantity', function(event) {
                    var purchase_cost = $(event.target).closest("tr").find("input.purchase_cost").val();
                    var quantity = $(event.target).closest("tr").find("input.quantity").val();
                    var subtotal = purchase_cost * quantity;
                    $(event.target).closest("tr").find("input.subtotal").val(subtotal);
                    totalAmountPrice(event);
                });

                // calculate the total amount
                function totalAmountPrice(event) {
                    var sum = 0;
                    $(".subtotal").each(function () {
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
                    data: { category_id: category_id },
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
            $(function(){
                $(document).on('change','#form_id', function() {
                    var form_id = $(this).val();

                    $.ajax({
                        url: "{{ route('manager.get.specific.form') }}",
                        type: "GET",
                        data: { form_id: form_id },
                        success: function(data){
                            var html = '<option value="">Select Product Name</option>';
                            $.each(data, function(key, v) {
                                html += '<option value="'+ v.id +'">'+ v.medicine_name +'</option>';
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
                var options = { year: 'numeric', month: 'long', day: 'numeric' };
                var formattedDate = currentDate.toLocaleDateString(undefined, options);
                document.getElementById("currentDate").textContent = formattedDate;
            }
            displayCurrentDate();
        </script>
    @endpush

</x-app-layout>
