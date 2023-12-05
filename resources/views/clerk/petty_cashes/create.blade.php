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
                    <form method="POST" action="{{ route('clerk.store.petty.cash') }}" id="myForm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Petty Cash Information</h4>
                                        <p class="card-title-desc">You can add here you product information.</p>

                                        @if(count($errors))
                                            @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                            @endforeach
                                        @endif

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
                                        <div class="row" style="align-items: flex-end;">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <label for="purchase_item" class="col-form-label">Purchase Item</label>
                                                    <input class="form-control" name="" type="text" id="purchase_item" placeholder="Purchase Item">
                                                </div>
                                                <div class="row">
                                                    <label for="purchase_remarks" class="col-form-label">Remarks</label>
                                                    <textarea class="form-control" name="" id="purchase_remarks" cols="30" rows="2" placeholder="Remarks"></textarea>
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
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table-sm table-bordered" width="100%" style="border-color:#ddd;">
                                            <thead>
                                                <tr>
                                                    <th>Purchase Item</th>
                                                    <th>Remarks</th>
                                                    <th style="width: 10%;">Price</th>
                                                    <th style="width: 10%;">Qty</th>
                                                    <th style="width: 10%;">Total Price</th>
                                                    <th style="width: 10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addRow" class="addRow"></tbody>
                                            <tbody>
                                                <tr>
                                                    <td>Remarks</td>
                                                    <td colspan="3">
                                                        <textarea placeholder="Remarks" class="form-control" rows="2" name="remarks" id="remarks"></textarea>
                                                    </td>
                                                    <td>Paid Amount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control paid_amount" id="paid_amount" name="paid_amount" placeholder="0.00">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="3">
                                                    </td>
                                                    <td>Discount</td>
                                                    <td colspan="2">
                                                        <input type="text" class="form-control discount" id="discount" name="discount" placeholder="0.00">
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
                                            <button class="btn btn-info mt-1" id="storeButton">Submit</button>
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

                <input type="hidden" name="purchase_item[]" value="@{{ purchase_item }}">
                <input type="hidden" name="purchase_remarks[]" value="@{{ purchase_remarks }}">

                <td>@{{ purchase_item }}</td>
                <td>@{{ purchase_remarks }}</td>
                <td>
                    <input
                    type="number"
                    name="qty[]"
                    class="form-control qty text-right"
                    value="@{{ quantity }}"
                    id="qty">
                </td>
                <td>
                    <input
                    type="number"
                    name="amount[]"
                    class="form-control amount text-right"
                    value="@{{ purchase_cost }}"
                    id="amount">
                </td>
                <td>
                    <input
                    type="text"
                    class="form-control subtotal"
                    id="subtotal"
                    name="subtotal[]"
                    placeholder="0"
                    value=""
                    style="background-color:#ddd;">
                </td>
                <td style="text-align: center;">
                    <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more"></i>
                </td>
            </tr>
        </script>
        <script type="text/javascript">
            $(function(){
                $(document).on('click', '.addeventmore', function() {
                    var purchase_item = $('.row #purchase_item').val();
                    var purchase_remarks = $('.row #purchase_remarks').val();

                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);

                    var html = template({
                        purchase_item: purchase_item,
                        purchase_remarks: purchase_remarks,
                    });

                    $("#addRow").append(html);

                    $('.row #purchase_item').val('');
                    $('.row #purchase_remarks').val('');
                });
                $(document).on('click','.remove_event_more', function() {
                    $(this).closest(".delete_add_more_item").remove();
                    calculateSubtotalPrice();
                    totalAmountPrice();
                });

                $(document).on('click keyup', '#qty, #amount, #discount_amount, #paid_amount', function() {
                    calculateSubtotalPrice();
                    totalAmountPrice();
                });

                function calculateSubtotalPrice() {
                    $('.qty').each(function(index) {
                        var qty = $(this).val();
                        var price = $('.amount').eq(index).val();
                        var subtotal = qty * price;

                        $('.subtotal').eq(index).val(subtotal);
                    });
                }

                // calculate the total amount
                function totalAmountPrice() {
                    var sum = 0;
                    $(".subtotal").each(function () {
                        var value = parseFloat($(this).val()) || 0;
                        sum += value;
                    });

                    var discount = parseFloat($('#discount').val());
                    var paid_amount = parseFloat($('#paid_amount').val());
                    var totalAmount = discount + paid_amount;

                    if(!isNaN(totalAmount) && totalAmount.length != 0){
                        sum -= parseFloat(totalAmount);
                    }

                    if (sum < 0) {
                        sum = 0;
                    }

                    $('.total_amount').val(sum.toFixed(2));
                    $('#balance').val(sum.toFixed(2));
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
