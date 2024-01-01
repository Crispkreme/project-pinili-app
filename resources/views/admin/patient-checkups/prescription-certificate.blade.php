<x-app-layout>

    <style>
        .card-body {
            padding: 5rem !important;
        }

        @media print {
            .card {
                box-shadow: none !important;
            }
        }

        input[switch]+label {
            width: 80px !important;
        }

        input[switch]:checked+label:after {
            left: 58px !important;
        }

        select {
            width: 60px !important;
        }
    </style>

    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-16">
                                            <strong>PRESCRIPTION CERTIFICATE</strong>
                                        </h4>
                                        <h3>
                                            <img src="assets/images/logo-sm.png" alt="logo" height="24" />
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h3 class="float-end">
                                            <strong>EDWIN C. PINILI. MD</strong>
                                        </h3>
                                        <p>Occupation and Family Health Physician</p>

                                        <div class="col-6">
                                            <address>
                                                <strong>CLINIC ADDRESS:</strong><br>
                                                2nd Rd., Brgy. Calumpang<br>
                                                General Santos City, 9500<br>
                                                09751785527<br>
                                                dyanatech1368@gmail.com
                                            </address>
                                        </div>
                                        <div class="col-6">
                                            <address>
                                                <strong>CLINIC HOURS:</strong><br>
                                                Monday - Saturday<br>
                                                09:00 am - 05:00 pm
                                            </address><br>
                                            <address>
                                                <strong>FOR APPOINTMENT:</strong><br>
                                                TEL. NO.: (083) 552-3857
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table-sm table-bordered mt-2" style="border-color:#ddd;" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th style="width: 25%;">Medicine Name</th>
                                            <th style="width: 25%;">Generic Name</th>
                                            <th style="width: 5%;">Quantity</th></th>
                                            <th style="width: 40%;">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody class="addRowMedicine" id="output-container-medicine">
                                        @foreach ($prescriptions as $key => $item)
                                            @unless ($item->prescribe_medicine->product_id == 1)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->prescribe_medicine->product->medicine_name }}</td>
                                                    <td>{{ $item->prescribe_medicine->product->generic_name }}</td>
                                                    <td class="text-center">{{ $item->prescribe_medicine->quantity }}</td>
                                                    <td>{{ $item->prescribe_medicine->remarks }}</td>
                                                </tr>
                                            @endunless
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="table-sm table-bordered mt-5" style="border-color:#ddd;" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;">ID</th>
                                            <th>Laboratory</th>
                                            <th>Description</th>
                                            <th style="width: 50%;">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prescriptions as $key => $item)
                                            @unless ($item->prescribe_laboratory->laboratory_id == 1)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->prescribe_laboratory->laboratory->laboratory }}</td>
                                                    <td>{{ $item->prescribe_laboratory->laboratory->description }}</td>
                                                    <td>{{ $item->prescribe_laboratory->remarks }}</td>
                                                </tr>
                                            @endunless
                                        @endforeach
                                    </tbody>                                                                       
                                </table>

                                <div class="mt-2" id="printButtons"
                                    style="display: flex;justify-content: space-between;padding-right: unset !important;padding-left: unset !important;">
                                    <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.all.patient') }}">Back to Patient</a>
                                    <button class="btn btn-success waves-effect waves-light"  onclick="printCertificate()">
                                        <i class="ri-printer-line align-middle me-2"></i>
                                        Print Prescription
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->

            <x-footer />

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <x-right-sidebar />
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script>
        function toggleSwitch(activeRoute, notActiveRoute) {
            var checkbox = document.getElementById('square-switch1');
            if (checkbox.checked) {
                window.location.href = activeRoute;
            } else {
                window.location.href = notActiveRoute;
            }
        }

        function printCertificate() {
            // Hide the print buttons before printing
            document.getElementById('printButtons').style.display = 'none';

            // Trigger the print functionality
            window.print();

            // Show the print buttons after printing (you can adjust the delay based on your needs)
            setTimeout(function() {
                document.getElementById('printButtons').style.display = 'flex';
            }, 1000);
        }
    </script>
</x-app-layout>
