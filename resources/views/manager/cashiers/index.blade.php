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
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
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
                                                    <a href="#progress-seller-details" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">01</span>
                                                        <span class="step-title">Seller Details</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#progress-company-document" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">02</span>
                                                        <span class="step-title">Company Document</span>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#progress-bank-detail" class="nav-link" data-toggle="tab">
                                                        <span class="step-number">03</span>
                                                        <span class="step-title">Bank Details</span>
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
                                                <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"></div>
                                            </div>
                                            <div class="tab-content twitter-bs-wizard-tab-content">
                                                <div class="tab-pane" id="progress-seller-details">
                                                    <form>
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
                                                                    <label class="form-label" for="progress-basicpill-address-input">Address</label>
                                                                    <textarea id="progress-basicpill-address-input" class="form-control" rows="2"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane" id="progress-company-document">
                                                <div>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-pancard-input">PAN Card</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-pancard-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-vatno-input">VAT/TIN No.</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-vatno-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-cstno-input">CST No.</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-cstno-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-servicetax-input">Service Tax No.</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-servicetax-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-companyuin-input">Company UIN</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-companyuin-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="progress-basicpill-declaration-input">Declaration</label>
                                                                    <input type="text" class="form-control" id="progress-basicpill-declaration-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
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
                                                                            <option selected>Select Card Type</option>
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
                                                <li class="previous"><a href="javascript: void(0);">Previous</a></li>
                                                <li class="next"><a href="javascript: void(0);">Next</a></li>
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

                $(document).on('click','.remove_event_more', function() {
                    $(this).closest(".delete_add_more_item").remove();
                    totalAmountPrice();
                });

                $(document).on('keyup click','.purchase_cost, .quantity', function() {
                    var purchase_cost = $(this).closest("tr").find("input.purchase_cost").val();
                    var quantity = $(this).closest("tr").find("input.quantity").val();
                    var subtotal = purchase_cost * quantity;
                    $(this).closest("tr").find("input.subtotal").val(subtotal);
                    totalAmountPrice();
                });

                // calculate the total amount
                function totalAmountPrice() {
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
                    url: "{{ route('admin.get.specific.category') }}",
                    type: "GET",
                    data: { category_id: category_id },
                    success: function(data) {
                        console.log(data);
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
                        url: "{{ route('admin.get.specific.form') }}",
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
