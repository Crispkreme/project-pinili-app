<x-app-layout>

    <style>
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

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">For patient payment list.</h4>
                                    <p class="card-title-desc">This are the complete list of our users.</p>

                                    <table class="table activate-select dt-responsive nowrap w-100"
                                        id="state-saving-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Patient No.</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Address</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prescriptions as $key => $item)
                                                <tr>
                                                    <td style="text-align:center;">{{ (int) $key + 1 }}</td>
                                                    <td>
                                                        <a
                                                            href="{{ route('manager.create.patient.payment', $item->patientCheckup->patientBmi->patient->id) }}">
                                                            {{ $item->patientCheckup->patientBmi->patient->id_number }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{ $item->patientCheckup->patientBmi->patient->firstname }}
                                                        {{ $item->patientCheckup->patientBmi->patient->mi }}
                                                        {{ $item->patientCheckup->patientBmi->patient->lastname }}
                                                    </td>
                                                    <td>{{ $item->patientCheckup->patientBmi->patient->age }}</td>
                                                    <td>{{ $item->patientCheckup->patientBmi->patient->address }}
                                                    </td>
                                                    {{-- <td>{{ $item->remarks }}</td> --}}
                                                    <td>For payment</td>
                                                    <td><!-- Add your action buttons or links here --></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

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
    </script>

</x-app-layout>
