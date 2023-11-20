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
                        <div class="col-lg-12">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Cashier Management</h4>
                                        <div id="progrss-wizard" class="twitter-bs-wizard">
                                            <ul class="twitter-bs-wizard-nav nav-justified">
                                                <li class="nav-item">
                                                    <a href="#progress-patient-details" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">01</span>
                                                        <span class="step-title">Patient Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#progress-medicine-details" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">02</span>
                                                        <span class="step-title">Medicine Prescription</span>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#progress-laboratories" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">03</span>
                                                        <span class="step-title">Laboratories</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#progress-purchase-products" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">04</span>
                                                        <span class="step-title">Purchase Product</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div id="bar" class="progress mt-4">
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                            </div>
                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane" id="progress-patient-details">
                                                    <form method="POST" action="">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-firstname-input">First name</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-firstname-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-lastname-input">Last name</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-lastname-input">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-phoneno-input">Phone</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-phoneno-input">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-email-input">Email</label>
                                                                    <input type="email" class="form-control" id="progress-basicpill-email-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-address-input">Description</label>
                                                                    <textarea id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="progress-medicine-details">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="width:25%;">Medicine Name</th>
                                                                                <th style="width:25%;">Generic Name</th>
                                                                                <th style="width:10%;">Qty</th>
                                                                                <th style="width:15%;">SRP</th>
                                                                                <th style="width:15%;">Subtotal</th>
                                                                                <th style="width:10%;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="medicineRow" class="medicineRow"></tbody>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Total Amount</td>
                                                                                <td colspan="2">
                                                                                    <input type="text" class="form-control total_amount" id="total_amount" name="total_amount" value="0" style="background-color:#ddd;" readonly>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Medicine Name</label>
                                                                        <select class="form-control select2"
                                                                            data-placeholder="Invoice Number" name="product_id" id="product_id">
                                                                            <option selected disabled>Medicine Name</option>
                                                                            @if (empty($products))
                                                                                <option value="" disabled>No data found</option>
                                                                            @else
                                                                                @foreach ($products as $productId => $name)
                                                                                    <option value="{{ $productId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3" id="generic_name" class="generic_name"></div>
                                                                    <div class="mb-3" id="medicine_description" name="medicine_description"></div>
                                                                    <div class="mb-3">
                                                                        <button type="button" class="btn btn-success waves-effect waves-light addEventMoreMedicine" style="width:100%;display:flex;justify-content:center;">
                                                                            <i class="ri-add-fill align-middle me-2"></i> Add More
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-laboratories">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Laboratory</th>
                                                                                <th>Description</th>
                                                                                <th style="width: 15%;">Qty</th>
                                                                                <th style="width: 15%;">SRP</th>
                                                                                <th style="width: 15%;">Total Price</th>
                                                                                <th style="width: 10%;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="laboratoryRow" class="laboratoryRow"></tbody>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Total Amount</td>
                                                                                <td colspan="2">
                                                                                    <input type="text" class="form-control total_amount" id="total_amount" name="total_amount" value="0" style="background-color:#ddd;" readonly>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label" for="progress-basicpill-email-input">Laboratory</label>
                                                                        <select class="form-control select2"
                                                                            data-placeholder="Invoice Number" name="laboratory_id" id="laboratory_id">
                                                                            <option selected disabled>Laboratory</option>
                                                                            @if (empty($laboratories))
                                                                                <option value="" disabled>No data found</option>
                                                                            @else
                                                                                @foreach ($laboratories as $laboratoryId => $name)
                                                                                    <option value="{{ $laboratoryId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3" id="laboratory_description" name="laboratory_description"></div>
                                                                    <div class="mb-3">
                                                                        <button type="button" class="btn btn-success waves-effect waves-light addEventMoreLaboratory" style="width:100%;display:flex;justify-content:center;">
                                                                            <i class="ri-add-fill align-middle me-2"></i> Add More
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-purchase-products">
                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-6">
                                                            <div class="text-center">
                                                                <div class="mb-4">
                                                                    <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                                </div>
                                                                <div>
                                                                    <h5>Confirm Detail</h5>
                                                                    <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                                <li class="next"><a href="javascript: void(0);">Proceed</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

    @push('scripts')
        <script id="document-template-medicine" type="text/x-handlerbars-template">
            <tr class="delete_add_more_item_medicine" id="delete_add_more_item_medicine">
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">

                <td>@{{ medicine_name }}</td>
                <td>@{{ generic_name }}</td>
                <td>
                    <input
                    type="text"
                    class="form-control subtotal"
                    id="subtotal"
                    name="subtotal[]"
                    placeholder="0">
                </td>
                <td>
                    <input
                    type="text"
                    name="price[]"
                    class="form-control price text-right"
                    value="@{{ purchase_cost }}"
                    id="price">
                </td>
                <td>
                    <input
                    type="text"
                    class="form-control subtotal"
                    id="subtotal"
                    name="subtotal[]"
                    placeholder="0">
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_medicine"></i>
                </td>
            </tr>
        </script>

        <!-- medicine -->
        <script type="text/javascript">
            $(function(){
                $(document).on('change', '#product_id', function () {
                    var product_id = $(this).val();

                    $.ajax({
                        url: "{{ url('manager/get/product/data/') }}/" + product_id,
                        type: "GET",
                        success: function (data) {
                            console.log(data);
                            var html_generic = '<div class="mb-3">';
                            var html_medicine_description = '<div class="mb-3">';

                            $.each(data, function (key, v) {
                                html_generic += '<label class="form-label" for="progress-basicpill-email-input">Generic Name</label><input type="text" class="form-control" value="' + v.medicine_name + '" readonly></div>';
                            });

                            $('#generic_name').html(html_generic);

                            $.each(data, function (key, v) {
                                html_medicine_description += '<label class="form-label" for="progress-basicpill-address-input">Description</label><textarea class="form-control" rows="2" readonly>' + v.medicine_name + '</textarea>';
                            });

                            $('#medicine_description').html(html_medicine_description);
                        }
                    });
                });

                $(document).on('click','.addEventMoreMedicine', function() {
                    var product_id = $('#product_id').val();
                    var medicine_name = $('#product_id').find('option:selected').text();
                    var generic_name = $('#product_id').find('option:selected').text();
                    var srp = $('#srp').val();

                    if(product_id == '')
                    {
                        $.notify("Product is required", { globalPosition: 'top right', className: 'error'});
                        return false;
                    }

                    var source = $("#document-template-medicine").html();
                    var template = Handlebars.compile(source);
                    var data = {
                        product_id: product_id,
                        medicine_name: medicine_name,
                        generic_name: generic_name,
                    }
                    var html = template(data);
                    console.log(html);
                    $("#medicineRow").append(html);
                });

                $(document).on('click','.remove_event_more_medicine', function() {
                    $(this).closest(".delete_add_more_item_medicine").remove();
                });
            });
        </script>

        <script id="document-template-laboratory" type="text/x-handlebars-template">
            <tr class="delete_add_more_item_laboratory" id="delete_add_more_item_laboratory">
                <input type="hidden" name="laboratory_id[]" value="@{{ laboratory_id }}">
                <td>@{{ laboratory }}</td>
                <td>@{{ description }}</td>
                <td>
                    <input
                        type="text"
                        class="form-control qty"
                        id="qty"
                        name="qty[]"
                        value="1"
                        readonly>
                </td>
                <td>
                    <input
                        type="text"
                        name="price[]"
                        class="form-control price text-right"
                        value="@{{ price }}"
                        id="price">
                </td>
                <td>
                    <input
                        type="text"
                        class="form-control subtotal"
                        id="subtotal"
                        name="subtotal[]"
                        placeholder="0">
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_laboratory"></i>
                </td>
            </tr>
        </script>

        <!-- laboratory -->
        <script type="text/javascript">
            $(function(){
                $(document).on('change', '#laboratory_id', function () {
                    var laboratory_id = $(this).val();

                    $.ajax({
                        url: "{{ url('manager/get/laboratory/data/') }}/" + laboratory_id,
                        type: "GET",
                        success: function (data) {
                            var html_laboratory_description = '<div class="mb-3">';

                            $.each(data, function (key, v) {
                                html_laboratory_description += '<label class="form-label" for="progress-basicpill-address-input">Description</label><textarea class="form-control" rows="2" readonly>' + v.laboratory + '</textarea>';
                            });

                            $('#laboratory_description').html(html_laboratory_description);
                        }
                    });
                });

                $(document).on('click','.addEventMoreLaboratory', function() {
                    var laboratory_id = $('#laboratory_id').val();
                    var laboratory = $('#laboratory_id').find('option:selected').text();
                    var description = $('#laboratory_id').find('option:selected').text();
                    var price = $('#laboratory_id').find('option:selected').text();

                    if(laboratory_id == '')
                    {
                        $.notify("Product is required", { globalPosition: 'top right', className: 'error'});
                        return false;
                    }

                    var source = $("#document-template-laboratory").html();
                    var template = Handlebars.compile(source);
                    var data = {
                        laboratory_id: laboratory_id,
                        laboratory: laboratory,
                        description: description,
                        price: price,
                    }
                    var html = template(data);
                    $("#laboratoryRow").append(html);
                });

                $(document).on('click','.remove_event_more_laboratory', function() {
                    $(this).closest(".delete_add_more_item_laboratory").remove();
                });
            });
        </script>
    @endpush

</x-app-layout>
