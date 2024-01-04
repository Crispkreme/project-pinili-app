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
                                            <strong>MEDICIL CERTIFICATE</strong>
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
                                <div class="col-12">
                                    <div>
                                        <hr>
                                        <h4 class="text-center font-size-16">
                                            <strong>MEDICIL CERTIFICATE</strong>
                                        </h4>
                                        <hr>

                                        <div>
                                            <p>{{ \Carbon\Carbon::parse(now())->format('F j, Y g:i A') }}
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p>To Whom it May Concern:</p><br>
                                            <p>This is to certify that
                                                Mr/Ms/Mrs.<span
                                                    style="font-weight:bold;text-transform:uppercase">{{ $patientData->firstname }}
                                                    {{ $patientData->mi }} {{ $patientData->lastname }}
                                                    {{ $patientData->age }}</span> yrs old. And
                                                residence of <span
                                                    style="font-weight:bold;text-transform:uppercase">{{ $patientData->address }}</span>
                                                was seen
                                                and examined at
                                                <span
                                                    style="font-weight:bold;text-transform:uppercase">{{ \Carbon\Carbon::parse($patientData->created_at)->format('F j, Y g:i A') }}</span>,
                                                and was found to have/be suffering from:
                                            </p>
                                            <h4 class="font-size-16">
                                                <strong>DIAGNOSIS</strong>
                                            </h4>
                                            <p style="font-weight:bold;text-transform:uppercase">{{ strip_tags(str_replace('&nbsp;', '', $bmiData->symptoms)) }}
                                            </p>
                                            <h4 class="font-size-16">
                                                <strong>RECOMENDATION</strong>
                                            </h4>
                                            <p style="font-weight:bold;text-transform:uppercase">{{ strip_tags(str_replace('&nbsp;', '', $bmiData->diagnosis)) }}
                                            </p>
                                        </div>
                                        <div class="mt-5" id="printButtons"
                                            style="display: flex;justify-content: space-between;">
                                            <button class="btn btn-success waves-effect waves-light"
                                                onclick="printCertificate()">
                                                <i class="ri-printer-line align-middle me-2"></i> Print Certificate
                                            </button>
                                            <a class="btn btn-primary waves-effect waves-light ms-2"
                                                href="{{ route('clerk.all.patient') }}">Back</a>
                                        </div>
                                    </div>

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
