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
                    <form id="myForm" method="POST" action="{{ route('admin.store.patient.prescription') }}">
                        @csrf
                        <input name="patient_checkup_id" type="hidden" value="{{ $patientCheckupData->id }}" />
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Checkup Information</h4>
                                        <p class="card-title-desc">You can add here you checkup information.</p>

                                        @if (count($errors))
                                            @foreach ($errors->all() as $error)
                                                <p class="alert alert-danger alert-dismissible fade show">
                                                    {{ $error }} </p>
                                            @endforeach
                                        @endif

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label class="col-form-label" for="name">Patient Number</label>
                                                    <h5>{{ $patientCheckupData->id_number }}</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="row" style="align-items: flex-end;">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="col-form-label" for="name">Follow up
                                                            Date</label>
                                                        <input class="form-control" id="follow_up_date"
                                                            name="follow_up_date" type="date"
                                                            value="{{ now()->format('Y-m-d') }}">
                                                    </div>
                                                    <div class="col"></div>
                                                    <div class="col"></div>
                                                </div>
                                            </div>
                                            <div class="col">
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
                                        <h4 class="card-title mb-4">Patient Prescription</h4>

                                        <div class="twitter-bs-wizard" id="progrss-wizard">
                                            <ul class="twitter-bs-wizard-nav nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#progress-patient-details">
                                                        <span class="step-number">01</span>
                                                        <span class="step-title">Patient Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#progress-medicine-details">
                                                        <span class="step-number">02</span>
                                                        <span class="step-title">Medicine Prescription</span>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#progress-laboratories">
                                                        <span class="step-number">03</span>
                                                        <span class="step-title">Laboratories</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                        href="#progress-purchase-products">
                                                        <span class="step-number">04</span>
                                                        <span class="step-title">Purchase Product</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="progress mt-4" id="bar">
                                                <div
                                                    class="progress-bar bg-success progress-bar-striped progress-bar-animated">
                                                </div>
                                            </div>

                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane active" id="progress-patient-details">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-firstname-input">First
                                                                    name</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-firstname-input"
                                                                    type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->firstname }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-lastname-input">Last
                                                                    name</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-lastname-input"
                                                                    type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->lastname }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-mi-input">MI.:</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-mi-input" type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->mi }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-phoneno-input">Phone</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-phoneno-input"
                                                                    type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->contact_number }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-email-input">Age</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-email-input" type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->age }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-email-input">Gender</label>
                                                                <input class="form-control"
                                                                    id="progress-basicpill-email-input" type="text"
                                                                    value="{{ $patientCheckupData->patientBmi->patient->gender->gender }}"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="progress-basicpill-address-input">Address</label>
                                                                <textarea class="form-control" id="progress-basicpill-address-input" rows="2" readonly>{{ $patientCheckupData->patientBmi->patient->address }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-medicine-details">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <table class="table-sm table-bordered"
                                                                        style="border-color:#ddd;" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th style="width:25%;">Medicine Name
                                                                                </th>
                                                                                <th style="width:25%;">Generic Name
                                                                                </th>
                                                                                <th style="width:10%;">Qty</th>
                                                                                <th>Remarks</th>
                                                                                <th style="width:10%;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="medicineRow" id="medicineRow">
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="progress-basicpill-email-input">Medicine
                                                                            Name</label>
                                                                        <select class="form-control select2"
                                                                            id="product_id"
                                                                            data-placeholder="Invoice Number">
                                                                            <option selected disabled>Medicine Name
                                                                            </option>
                                                                            @if (empty($products))
                                                                                <option value="" disabled>No data
                                                                                    found</option>
                                                                            @else
                                                                                @foreach ($products as $productId => $name)
                                                                                    <option
                                                                                        value="{{ $productId }}"
                                                                                        style="text-transform: capitalize">
                                                                                        {{ $name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3" class="generic_name"
                                                                        id="generic_name"></div>
                                                                    <div class="mb-3" id="medicine_description"
                                                                        name="medicine_description"></div>
                                                                    <div class="mb-3">
                                                                        <button
                                                                            class="btn btn-success waves-effect waves-light addEventMoreMedicine"
                                                                            type="button"
                                                                            style="width:100%;display:flex;justify-content:center;">
                                                                            <i
                                                                                class="ri-add-fill align-middle me-2"></i>
                                                                            Add More
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
                                                                    <table class="table-sm table-bordered"
                                                                        style="border-color:#ddd;" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Laboratory</th>
                                                                                <th>Description</th>
                                                                                <th style="width: 15%;">Qty</th>
                                                                                <th>Remarks</th>
                                                                                <th style="width: 10%;">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="laboratoryRow"
                                                                            id="laboratoryRow"></tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="mb-3">
                                                                        <label class="form-label"
                                                                            for="progress-basicpill-email-input">Laboratory</label>
                                                                        <select class="form-control select2"
                                                                            id="laboratory_id"
                                                                            data-placeholder="Invoice Number">
                                                                            <option selected disabled>Laboratory
                                                                            </option>
                                                                            @if (empty($laboratories))
                                                                                <option value="" disabled>No data
                                                                                    found</option>
                                                                            @else
                                                                                @foreach ($laboratories as $laboratoryId => $name)
                                                                                    <option
                                                                                        value="{{ $laboratoryId }}"
                                                                                        style="text-transform: capitalize">
                                                                                        {{ $name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3" id="laboratory_description"
                                                                        name="laboratory_description"></div>
                                                                    <div class="mb-3">
                                                                        <button
                                                                            class="btn btn-success waves-effect waves-light addEventMoreLaboratory"
                                                                            type="button"
                                                                            style="width:100%;display:flex;justify-content:center;">
                                                                            <i
                                                                                class="ri-add-fill align-middle me-2"></i>
                                                                            Add More
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
                                                                    <i
                                                                        class="mdi mdi-check-circle-outline text-success display-4"></i>
                                                                </div>
                                                                <div>
                                                                    <h5>Confirm Detail</h5>
                                                                    <p class="text-muted">If several languages
                                                                        coalesce, the grammar of the resulting</p>
                                                                    <div
                                                                        style="width:100%;display:flex;justify-content:center;">
                                                                        <button
                                                                            class="btn btn-success waves-effect waves-light"
                                                                            type="submit">
                                                                            <i
                                                                                class="ri-add-fill align-middle me-2"></i>
                                                                            Confirm Prescription
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <ul class="pager wizard twitter-bs-wizard-pager-link" id="pagerButtons">
                                                @if ($firstTab !== 'progress-patient-details')
                                                    <li class="next">
                                                        <a href="javascript: void(0);" onclick="handleNext()">Next</a>
                                                    </li>
                                                @endif
                                                @if ($lastTab !== 'progress-purchase-products')
                                                    <li class="previous">
                                                        <a href="javascript: void(0);" onclick="handleBack()">Back</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </form>
                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

    @push('scripts')
        <!-- medicine -->
        <script id="document-template-medicine" type="text/x-handlerbars-template">
            <tr class="delete_add_more_item_medicine" id="delete_add_more_item_medicine">
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">
                <input type="hidden" name="srp[]" value="@{{ srp }}">

                <td>@{{ medicine_name }}</td>
                <td>@{{ generic_name }}</td>
                <td>
                    <input
                    type="text"
                    class="form-control qty_medicine"
                    id="qty_medicine"
                    name="qty_medicine[]"
                    value="@{{ quantity }}"
                    placeholder="0">
                </td>
                <td>
                    <textarea
                    id="remarks"
                    class="form-control remarks"
                    rows="2"
                    name="remark_medicine[]">@{{ remarks }}</textarea>
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_medicine"></i>
                </td>
            </tr>
        </script>
        <script type="text/javascript">
            $(function() {
                $(document).on('change', '#product_id', function() {
                    var product_id = $(this).val();

                    $.ajax({
                        url: "{{ url('admin/get/product/data/') }}/" + product_id,
                        type: "GET",
                        success: function(data) {
                            selectedMedicineData = data;
                            var html_generic = '<div class="mb-3">';
                            var html_medicine_description = '<div class="mb-3">';

                            $.each(data, function(key, v) {
                                html_generic +=
                                    '<label class="form-label" for="progress-basicpill-email-input">Generic Name</label><input type="text" class="form-control" value="' +
                                    v.medicine_name + '" readonly></div>';
                                html_medicine_description +=
                                    '<label class="form-label" for="progress-basicpill-address-input">Description</label><textarea class="form-control" rows="2" readonly>' +
                                    v.medicine_name + '</textarea>';
                            });

                            $('#generic_name').html(html_generic);
                            $('#medicine_description').html(html_medicine_description);
                        }

                    });
                });

                $(document).on('click', '.addEventMoreMedicine', function() {
                    var product_id = $('#product_id').val();
                    var medicine_name;
                    var generic_name;
                    var description;
                    var srp;

                    if (product_id == '') {
                        $.notify("Product is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }

                    if (selectedMedicineData) {
                        medicine_name = selectedMedicineData[0].medicine_name;
                        generic_name = selectedMedicineData[0].generic_name;
                        description = selectedMedicineData[0].description;
                        srp = selectedMedicineData[0].srp;
                    }

                    var source = $("#document-template-medicine").html();
                    var template = Handlebars.compile(source);
                    var data = {
                        product_id: product_id,
                        medicine_name: medicine_name,
                        generic_name: generic_name,
                        description: description,
                        srp: srp,
                    }
                    var html = template(data);

                    $("#medicineRow").append(html);
                });

                $(document).on('click', '.remove_event_more_medicine', function() {
                    $(this).closest(".delete_add_more_item_medicine").remove();
                    totalAmountPrice();
                });
            });
        </script>

        <!-- laboratory -->
        <script id="document-template-laboratory" type="text/x-handlebars-template">
            <tr class="delete_add_more_item_laboratory" id="delete_add_more_item_laboratory">
                <input type="hidden" name="laboratory_id[]" value="@{{ laboratory_id }}">
                <td>@{{ laboratory }}</td>
                <td>@{{ description }}</td>
                <td style="width: 10%;">
                    <input
                        type="text"
                        class="form-control qty_laboratory"
                        id="qty_laboratory"
                        name="qty_laboratory[]"
                        value="1"
                        style="text-align:center"
                        readonly>
                </td>
                <td>
                    <textarea
                    id="remarks"
                    class="form-control remarks"
                    rows="2"
                    name="remark_laboratory[]">@{{ remarks }}</textarea>
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_laboratory"></i>
                </td>
            </tr>
        </script>
        <script type="text/javascript">
            $(function() {
                $(document).on('change', '#laboratory_id', function() {
                    var laboratory_id = $(this).val();

                    $.ajax({
                        url: "{{ url('admin/get/laboratory/data/') }}/" + laboratory_id,
                        type: "GET",
                        success: function(data) {
                            var html_laboratory_description = '<div class="mb-3">';
                            selectedLaboratoryData = data;
                            $.each(data, function(key, v) {
                                html_laboratory_description +=
                                    '<label class="form-label" for="progress-basicpill-address-input">Description</label><textarea class="form-control" rows="2" readonly>' +
                                    v.laboratory + '</textarea>';
                            });

                            $('#laboratory_description').html(html_laboratory_description);
                        }
                    });
                });

                $(document).on('click', '.addEventMoreLaboratory', function() {
                    var laboratory_id = $('#laboratory_id').val();
                    var laboratory = $('#laboratory_id').find('option:selected').text();
                    var description = $('#laboratory_id').find('option:selected').text();
                    var price;

                    if (laboratory_id == '') {
                        $.notify("Product is required", {
                            globalPosition: 'top right',
                            className: 'error'
                        });
                        return false;
                    }

                    if (selectedLaboratoryData) {
                        price = selectedLaboratoryData[0].price;
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

                $(document).on('click', '.remove_event_more_laboratory', function() {
                    $(this).closest(".delete_add_more_item_laboratory").remove();
                    totalAmountPrice();
                });
            });
        </script>
        <script>
            function handleNext() {
                // Add logic for handling the "Next" button click
                console.log('Next button clicked');
                // You can add additional logic or navigate to the next tab here
            }

            function handleBack() {
                // Add logic for handling the "Back" button click
                console.log('Back button clicked');
                // You can add additional logic or navigate to the previous tab here
            }

            // You can conditionally hide/show buttons using JavaScript
            var pagerButtons = document.getElementById('pagerButtons');
            if ( /* Add your condition for hiding/showing Next button */ ) {
                pagerButtons.querySelector('.next').style.display = 'none';
            }

            if ( /* Add your condition for hiding/showing Back button */ ) {
                pagerButtons.querySelector('.previous').style.display = 'none';
            }
        </script>
    @endpush

</x-app-layout>
