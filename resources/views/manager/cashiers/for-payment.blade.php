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
                                    <form id="myForm" method="POST" action="{{ route('manager.store.patient.Billing') }}">
                                        @csrf
                                        <input id="prescriptionId" name="prescriptionId[]" type="hidden"
                                            value="{{ $id }}">
                                        <div class="mt-2"
                                            style="display: flex;justify-content: space-between;align-items: center;">
                                            <label class="col-form-label" for="">Medicine</label>
                                            <div>
                                                <div class="input-group mb-3" id=""
                                                    style="display:flex;align-items: center;">
                                                    <select class="form-control select2" id="product_id"
                                                        style="width: 200px;">
                                                        <option>Select</option>
                                                        <optgroup label="List of Medicine">
                                                            @foreach ($inventories as $key => $item)
                                                                <option value="{{ $item->product_id }}">
                                                                    {{ $item->product->medicine_name }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <button
                                                        class="btn btn-success waves-effect waves-light addeventmoremedicine"
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
                                            <tbody class="addRowMedicine" id="output-container-medicine"></tbody>
                                        </table>
                                        <div class="mt-2"
                                            style="display: flex;justify-content: space-between;align-items: center;">
                                            <label class="col-form-label" for="">Laboratory</label>
                                            <div>
                                                <div class="input-group mb-3" id=""
                                                    style="display:flex;align-items: center;">
                                                    <select class="form-control select2" id="laboratory_id"
                                                        style="width: 200px;">
                                                        <option>Select</option>
                                                        <optgroup label="List of Laboratory">
                                                            @foreach ($laboratories as $key => $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->laboratory }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                    <button
                                                        class="btn btn-success waves-effect waves-light addeventmorelaboratory"
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
                                                    <th>Laboratory</th>
                                                    <th>Description</th>
                                                    <th style="width: 10%;">Unit Price</th>
                                                    <th style="width: 10%;">Qty</th>
                                                    <th style="width: 10%;">Total Price</th>
                                                    <th style="width: 5%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tbody class="addRowLaboratory" id="output-container-laboratory"></tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Total Amount</td>
                                                    <td colspan="2">
                                                        <input class="form-control total_amount" id="total_amount"
                                                            name="total_amount" type="text" value="0"
                                                            style="background-color:#ddd;" name="total_amount" readonly>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="form-group">
                                            <button class="btn btn-info mt-1" id="storeButton" type="submit" >Update Billing</button>
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
        <script>
            Handlebars.registerHelper('multiply', function(a, b) {
                return a * b;
            });

            $(document).ready(function() {
                $(document).on('keyup click', '.srp-input, .quantity-input', function() {
                    updateCalculatedValue($(this), 'srp-input', 'quantity-input', '.calculated-medicine');
                    calculateTotalMedicine();
                    updateTotalAmount();
                });

                $(document).on('keyup click', '.price-input, .qty-input', function() {
                    updateCalculatedValue($(this), 'price-input', 'qty-input', '.calculated-laboratory');
                    calculateTotalLaboratory();
                    updateTotalAmount();
                });

                function updateCalculatedValue(input, input1Class, input2Class, resultClass) {
                    var row = input.closest('tr');
                    var value1 = parseFloat(row.find('.' + input1Class).val()) || 0;
                    var value2 = parseFloat(row.find('.' + input2Class).val()) || 0;
                    var calculatedValue = value1 * value2;
                    row.find(resultClass).val(calculatedValue);
                }

                function calculateTotalMedicine() {
                    var totalMedicine = 0;

                    $('.calculated-medicine').each(function() {
                        totalMedicine += parseFloat($(this).val()) || 0;
                    });

                    return totalMedicine;
                }

                function calculateTotalLaboratory() {
                    var totalLaboratory = 0;

                    $('.calculated-laboratory').each(function() {
                        totalLaboratory += parseFloat($(this).val()) || 0;
                    });

                    return totalLaboratory;
                }

                function updateTotalAmount() {
                    var totalMedicine = calculateTotalMedicine();
                    var totalLaboratory = calculateTotalLaboratory();
                    var totalAmount = totalMedicine + totalLaboratory;

                    if (totalMedicine > 0 && totalLaboratory > 0) {
                        $('#total_amount').val(totalAmount.toFixed(2)); 
                    } else if (totalMedicine > 0) {
                        $('#total_amount').val(totalMedicine.toFixed(2));
                    } else if (totalLaboratory > 0) {
                        $('#total_amount').val(totalLaboratory.toFixed(2)); 
                    } else {
                        $('#total_amount').val('0.00'); 
                    }
                }
            });
        </script>
        <script id="document-template-medicine" type="text/x-handlebars-template">
            @verbatim
                {{#each products.prescribeMedicines}}
                    <tr>
                        <input type="hidden" value="{{ this.product_id }}" name="product_id[]">
                        <input type="hidden" value="{{ this.srp }}" name="srp[]">
                        <input type="hidden" value="{{ this.quantity }}" name="quantity[]">
                        <input type="hidden" value="{{ multiply this.srp this.quantity }}" name="sub_total_medicine[]">

                        <td>{{ this.medicine_name }}</td>
                        <td>{{ this.generic_name }}</td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control srp-input" value="{{ this.srp }}">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control quantity-input" value="{{ this.quantity }}">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control calculated-medicine" value="{{ multiply this.srp this.quantity }}" readonly>
                        </td>
                        <td style="width: 5%;text-align:center;">
                            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                        </td>
                    </tr>
                {{/each}}
            @endverbatim
        </script>
        <script id="document-template-laboratory" type="text/x-handlebars-template">
            @verbatim
                {{#each laboratories.prescribeLaboratories}}
                    <tr>
                        <input type="hidden" value="{{ this.laboratory_id }}" name="laboratory_id[]">
                        <input type="hidden" value="{{ this.price }}" name="price[]">
                        <input type="hidden" value="{{ this.qty }}" name="qty[]">
                        <input type="hidden" value="{{ multiply this.price 1 }}" name="sub_total_laboratory[]">

                        <td>{{ this.laboratory }}</td>
                        <td>{{ this.description }}</td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control price-input" value="{{ this.price }}">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control qty-input" value="1">
                        </td>
                        <td style="width: 10%;">
                            <input type="text" class="form-control calculated-laboratory" value="{{ multiply this.price 1 }}" readonly>
                        </td>
                        <td style="width: 5%;text-align:center;">
                            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                        </td>
                    </tr>
                {{/each}}
            @endverbatim
        </script>
        <script>
            function renderMedicine(data) {
                var source = $("#document-template-medicine").html();
                var template = Handlebars.compile(source);
                var html = template({
                    products: data
                });

                $("#output-container-medicine").append(html);
            }

            function renderLaboratory(data) {
                var source = $("#document-template-laboratory").html();
                var template = Handlebars.compile(source);
                var html = template({
                    laboratories: data
                });

                $("#output-container-laboratory").append(html);
            }

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
                        renderMedicine(data);
                        renderLaboratory(data);
                    }
                });

                $(document).on('click', '.addeventmoremedicine', function() {
                    var productId = $('#product_id').val();

                    $.ajax({
                        url: "{{ url('/manager/get/specific/product/') }}/" + productId,
                        type: "GET",
                        data: {
                            productId: productId
                        },
                        success: function(data) {
                            renderMedicine(data);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("Error: ", errorThrown);
                        }
                    });
                });
                $(document).on('click', '.addeventmorelaboratory', function() {
                    var laboratoryId = $('#laboratory_id').val();

                    $.ajax({
                        url: "{{ url('/manager/get/specific/laboratory/') }}/" + laboratoryId,
                        type: "GET",
                        data: {
                            laboratoryId: laboratoryId
                        },
                        success: function(data) {
                            renderLaboratory(data);
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("Error: ", errorThrown);
                        }
                    });
                });
            });
        </script>
    @endpush

</x-app-layout>
