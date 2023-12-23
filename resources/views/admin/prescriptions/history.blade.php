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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">Patient Checkup List Data</h4>
                                            <p class="card-title-desc">This are the complete list of our users.</p>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-dark btn-rounded waves-effect waves-light mb-3"
                                                href="{{ route('admin.all.patient.checkup') }}"
                                                style="float:right;margin-left:5px;">
                                                Checkup
                                            </a>
                                        </div>
                                    </div>

                                    <table class="table activate-select dt-responsive nowrap w-100"
                                        id="state-saving-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Checkup No.</th>
                                                <th>Name</th>
                                                <th>Age</th>
                                                <th>Checkup Date</th>
                                                <th>Followup Date</th>
                                                <th>Status</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patientCheckupData as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->patientCheckup->id_number }}</td>
                                                    <td>{{ $item->patientCheckup->patientBmi->patient->firstname }}
                                                        {{ $item->patientCheckup->patientBmi->patient->mi }}
                                                        {{ $item->patientCheckup->patientBmi->patient->lastname }}</td>
                                                    <td>{{ $item->patientCheckup->patientBmi->patient->age }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                                    </td>
                                                    @if ($item->follow_up_date === '1900-01-01')
                                                        <td>None</td>
                                                    @else
                                                        <td>{{ \Carbon\Carbon::parse($item->follow_up_date)->format('M d, Y') }}
                                                        </td>
                                                    @endif
                                                    <td>{{ $item->status->status }}</td>
                                                    <td>{{ $item->remarks }}</td>
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
