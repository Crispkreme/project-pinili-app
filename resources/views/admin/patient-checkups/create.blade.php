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
                    <form method="POST" action="{{ route('admin.store.inventory.sheet') }}" id="myForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Checkup Information</h4>
                                        <p class="card-title-desc">You can add here you checkup information.</p>

                                        @if(count($errors))
                                            @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                            @endforeach
                                        @endif

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Patient Number</label>
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
                                                        <label for="name" class="col-form-label">Follow up Date</label>
                                                        <input class="form-control" name="follow_up_date" type="date" id="follow_up_date" placeholder="">
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

                                        <div id="progrss-wizard" class="twitter-bs-wizard">
                                            <ul class="twitter-bs-wizard-nav nav-justified nav nav-pills">
                                                <li class="nav-item">
                                                    <a href="#progress-patient-details" class="nav-link active" data-toggle="tab">
                                                        <span class="step-number">01</span>
                                                        <span class="step-title">Patient Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">02</span>
                                                        <span class="step-title">Prescribe Medicine</span>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">03</span>
                                                        <span class="step-title">Prescribe Laboratory</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#progress-confirm-detail" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">04</span>
                                                        <span class="step-title">Confirm Detail</span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div id="bar" class="progress mt-4">
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: 25%;"></div>
                                            </div>
                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane active" id="progress-patient-details">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-firstname-input">First name</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-firstname-input" value="{{ $patientCheckupData->patientBmi->patient->firstname }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-lastname-input">Last name</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-lastname-input" value="{{ $patientCheckupData->patientBmi->patient->lastname }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-mi-input">MI.:</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-mi-input" value="{{ $patientCheckupData->patientBmi->patient->mi }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-phoneno-input">Phone</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-phoneno-input" value="{{ $patientCheckupData->patientBmi->patient->contact_number }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-email-input">Age</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-email-input" value="{{ $patientCheckupData->patientBmi->patient->age }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-email-input">Gender</label>
                                                                <input type="text" class="form-control" id="progress-basicpill-email-input" value="{{ $patientCheckupData->patientBmi->patient->gender->gender }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="progress-basicpill-address-input">Address</label>
                                                                <textarea id="progress-basicpill-address-input" class="form-control" rows="2" readonly>{{ $patientCheckupData->patientBmi->patient->address }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-company-document">
                                                  <div>

                                                  </div>
                                                </div>
                                                <div class="tab-pane" id="progress-bank-detail">
                                                    <div>
                                                      <form>
                                                          <div class="row">
                                                              <div class="col-lg-6">
                                                                  <div class="mb-3">
                                                                      <label class="form-label" for="progress-basicpill-namecard-input">Name on Card</label>
                                                                      <input type="text" class="form-control" id="progress-basicpill-namecard-input">
                                                                  </div>
                                                              </div>

                                                              <div class="col-lg-6">
                                                                  <div class="mb-3">
                                                                      <label>Credit Card Type</label>
                                                                      <select class="form-select">
                                                                            <option selected="">Select Card Type</option>
                                                                            <option value="AE">American Express</option>
                                                                            <option value="VI">Visa</option>
                                                                            <option value="MC">MasterCard</option>
                                                                            <option value="DI">Discover</option>
                                                                      </select>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-lg-6">
                                                                  <div class="mb-3">
                                                                      <label class="form-label" for="progress-basicpill-cardno-input">Credit Card Number</label>
                                                                      <input type="text" class="form-control" id="progress-basicpill-cardno-input">
                                                                  </div>
                                                              </div>

                                                              <div class="col-lg-6">
                                                                  <div class="mb-3">
                                                                      <label class="form-label" for="progress-basicpill-card-verification-input">Card Verification Number</label>
                                                                      <input type="text" class="form-control" id="progress-basicpill-card-verification-input">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="row">
                                                              <div class="col-lg-6">
                                                                  <div class="mb-3">
                                                                      <label class="form-label" for="progress-basicpill-expiration-input">Expiration Date</label>
                                                                      <input type="text" class="form-control" id="progress-basicpill-expiration-input">
                                                                  </div>
                                                              </div>

                                                          </div>
                                                      </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="progress-confirm-detail">
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
                                                <li class="previous disabled"><a href="javascript: void(0);">Previous</a></li>
                                                <li class="next"><a href="javascript: void(0);">Next</a></li>
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
                    <input
                    type="number"
                    name="qty[]"
                    class="form-control qty text-right"
                    value="@{{ quantity }}"
                    id="qty"
                    readonly>
                </td>
                <td>
                    <input
                    type="number"
                    name="price[]"
                    class="form-control price text-right"
                    value="@{{ purchase_cost }}"
                    id="price"
                    readonly>
                </td>
                <td>
                    <input
                    type="text"
                    class="form-control subtotal"
                    id="subtotal"
                    name="subtotal[]"
                    placeholder="0"
                    value=""
                    style="background-color:#ddd;"
                    readonly>
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                </td>
            </tr>
        </script>
        <script type="text/javascript">
            $(function(){
                $(document).on('click', '.addeventmore', function() {
                    var invoice_number = $('#invoice_number').val();
                    loadInvoiceProductData(invoice_number);
                });

                $(document).on('click','.remove_event_more', function() {
                    $(this).closest(".delete_add_more_item").remove();
                    calculateSubtotalPrice();
                    totalAmountPrice();
                    dueAmount();
                });

                $(document).on('click keyup', '#discount_amount', function() {
                    calculateSubtotalPrice();
                    dueAmount();
                    totalAmountPrice();
                });

                $(document).on('click keyup', '#current_paid_amount', function() {
                    calculateSubtotalPrice();
                    dueAmount();
                });

                function addRowWithData(data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);

                    var html = template({
                        supplier_id: data.supplier_id,
                        product_id: data.product_id,
                        subtotal: data.subtotal,
                        or_number: data.or_number,
                        or_date: data.or_date,
                        delivery_number: data.delivery_number,
                        delivery_date: data.delivery_date,
                        po_number: data.po_number,
                        current_paid_amount: data.current_paid_amount,
                        medicine_name: data.product.medicine_name,
                        generic_name: data.product.generic_name,
                        purchase_cost: data.purchase_cost,
                        quantity: data.quantity,
                    });

                    $("#addRow").append(html);
                }

                function loadInvoiceProductData(invoice_number) {
                    if (invoice_number) {
                        $.ajax({
                            url: "{{ route('admin.get.order.invoice.number') }}",
                            type: "GET",
                            data: { invoice_number: invoice_number },
                            success: function (data) {
                                if (data.length > 0) {
                                    $('#addRow').empty();
                                    data.forEach(function (item) {
                                        addRowWithData(item);
                                    });
                                } else {
                                    alert('No data found for the selected invoice number.');
                                }
                            },
                        });
                    }
                }

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

                    calculateSubtotalPrice();
                });

                $(document).on('change','#supplier_id', function() {
                    var supplier_id = $(this).val();

                    $.ajax({
                        url: "{{ route('admin.get.specific.product') }}",
                        type: "GET",
                        data: { supplier_id: supplier_id },
                        success: function(data) {
                            var html = '<optgroup label="Invoice Number">';
                            $.each(data, function(key, v) {
                                html += '<option value="'+ v +'">'+ v +'</option></optgroup>';
                            });
                            $('#invoice_number').html(html);
                        }
                    });

                    calculateSubtotalPrice();
                });

                // calculate the total amount
                function totalAmountPrice() {
                    var sum = 0;
                    $(".subtotal").each(function () {
                        var value = parseFloat($(this).val()) || 0;
                        sum += value;
                    });

                    var discount_amount = parseFloat($('#discount_amount').val());
                    var current_paid_amount = parseFloat($('#current_paid_amount').val());
                    var totalAmount = discount_amount + current_paid_amount;

                    if(!isNaN(totalAmount) && totalAmount.length != 0){
                        sum -= parseFloat(totalAmount);
                    }

                    if (sum < 0) {
                        sum = 0;
                    }

                    $('.total_amount').val(sum.toFixed(2));

                    $('#balance').val(sum.toFixed(2));
                }

                function dueAmount() {
                    var sum = 0;
                    $(".subtotal").each(function () {
                        var value = parseFloat($(this).val()) || 0;
                        sum += value;
                    });

                    $('.due_amount').val(sum.toFixed(2));
                }

                function calculateSubtotalPrice() {
                    $('.qty').each(function(index) {
                        var qty = $(this).val();
                        var price = $('.price').eq(index).val();
                        var subtotal = qty * price;

                        $('.subtotal').eq(index).val(subtotal);
                    });
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
    @endpush

</x-app-layout>
