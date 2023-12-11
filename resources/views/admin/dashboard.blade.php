<x-app-layout>
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

                    @php
                        $CardItem = [
                            [
                                'title' => 'Total Patients',
                                'total' => $totalPatient,
                                'percentage' => '9.23%',
                                'icon' => '<i class="ri-arrow-right-up-line me-1 align-middle"></i>',
                                'avatar' => '<i class="ri-team-line font-size-24"></i>',
                            ],
                            [
                                'title' => 'New Patients',
                                'total' => $countPatients,
                                'percentage' => '1.09%',
                                'icon' => '<i class="ri-arrow-right-down-line me-1 align-middle"></i>',
                                'avatar' => '<i class="ri-user-2-line font-size-24"></i>',
                            ],
                            [
                                'title' => 'New Users',
                                'total' => '8246',
                                'percentage' => '16.2%',
                                'icon' => '<i class="ri-arrow-right-up-line me-1 align-middle"></i>',
                                'avatar' => '<i class="ri-user-3-line font-size-24"></i>',
                            ],
                            [
                                'title' => 'Unique Visitors',
                                'total' => '29670',
                                'percentage' => '11.7%',
                                'icon' => '<i class="ri-arrow-right-up-line me-1 align-middle"></i>',
                                'avatar' => '<i class="mdi mdi-currency-btc font-size-24"></i>',
                            ],
                        ];
                    @endphp

                    <x-dashboard-card :cardItems="$CardItem" />

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="float-end d-none d-md-inline-block">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted">Report<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Export</a>
                                                <a class="dropdown-item" href="#">Import</a>
                                                <a class="dropdown-item" href="#">Download Report</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">Daily Report</h4>

                                    <div class="text-center pt-3">
                                        <div class="row">
                                            <div class="col-sm-6 mb- mb-sm-0">
                                                <div class="d-inline-flex">
                                                    <h5 class="me-2">{{ $totalPatient }}</h5>
                                                    <div class="text-success font-size-12">
                                                        <i class="mdi mdi-menu-up font-size-14"> </i>2.2 %
                                                    </div>
                                                </div>
                                                <p class="text-muted text-truncate mb-0">New Patient</p>
                                            </div><!-- end col -->
                                            <div class="col-sm-6 mb- mb-sm-0">
                                                <div class="d-inline-flex">
                                                    <h5 class="me-2">{{ $countPatients }}</h5>
                                                    <div class="text-success font-size-12">
                                                        <i class="mdi mdi-menu-up font-size-14"> </i>1.2 %
                                                    </div>
                                                </div>
                                                <p class="text-muted text-truncate mb-0">Follow-up Patient</p>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                                <div class="card-body py-0 px-2">
                                    <div id="daily_report_chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body pb-0">
                                    <div class="float-end d-none d-md-inline-block">
                                        <div class="dropdown">
                                            <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted">This Years<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Today</a>
                                                <a class="dropdown-item" href="#">Last Week</a>
                                                <a class="dropdown-item" href="#">Last Month</a>
                                                <a class="dropdown-item" href="#">This Year</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="card-title mb-4">Monthly Report</h4>

                                    <div class="text-center pt-3">
                                        <div class="row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div>
                                                    <h5>{{ $totalPatient }}</h5>
                                                    <p class="text-muted text-truncate mb-0">Total Patient</p>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <div>
                                                    <h5>{{ $countPatients }}</h5>
                                                    <p class="text-muted text-truncate mb-0">New Patient</p>
                                                </div>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                </div>
                                <div class="card-body py-0 px-2">
                                    <div id="monthly_report_chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div><!-- end card -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        </div>
                                    </div>

                                    <h4 class="card-title mb-4">Latest Transactions</h4>

                                    <div class="table-responsive">
                                        <table id="state-saving-datatable"
                                            class="table activate-select dt-responsive nowrap w-100">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Checkup Number</th>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Client</th>
                                                    <th>Status</th>
                                                    <th>Remarks</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($patientCheckups as $key => $item)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $item->id_number }}</td>
                                                        <td>
                                                            <h6 class="mb-0">
                                                                {{ $item->patientBmi->patient->firstname }}
                                                                {{ $item->patientBmi->patient->mi }}
                                                                {{ $item->patientBmi->patient->lastname }}
                                                            </h6>
                                                        </td>
                                                        <td>{{ $item->patientBmi->patient->age }}</td>
                                                        <td>
                                                            @if ($item->isNew == 1 && $item->isFollowUp == 0)
                                                                New
                                                            @endif
                                                            @if ($item->isNew == 1 && $item->isFollowUp == 1)
                                                                Follow-up
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="font-size-13">
                                                                @if ($item->status_id == 2)
                                                                    <i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>
                                                                    {{ $item->statuses->status }}
                                                                @else
                                                                    <i
                                                                        class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>
                                                                    {{ $item->statuses->status }}
                                                                @endif

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $item->remarks }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody><!-- end tbody -->
                                        </table> <!-- end table -->
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end card -->
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

    @push('scripts')
        {{-- for areachart --}}
        <script>
            var isNewData = @json($isNew);
            var isFollowUpData = @json($isFollowUp);

            var options = {
                series: [{
                    name: 'New',
                    data: [
                        @foreach ($isNew as $data)
                            {{ $data->totalPatientIsNew }},
                        @endforeach
                    ]
                }, {
                    name: 'Follow up',
                    data: [
                        @foreach ($isFollowUp as $data)
                            {{ $data->totalPatientIsFollowUp }},
                        @endforeach
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    type: 'datetime',
                    categories: [
                        @foreach ($isNew as $data)
                            '{{ $data->date }}',
                        @endforeach
                    ]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#daily_report_chart"), options);
            chart.render();
        </script>

        {{-- for barchart --}}
        <script>
            var isNewMonthlyData = @json($isNewMonthly);
            var isFollowUpMonthlyData = @json($isFollowUpMonthly);

            var options = {
                series: [{
                    name: 'New',
                    data: [
                        @foreach ($isNewMonthly as $data)
                            {{ $data->totalPatientIsNewMonthly }},
                        @endforeach
                    ]
                }, {
                    name: 'Follow up',
                    data: [
                        @foreach ($isFollowUpMonthly as $data)
                            {{ $data->totalPatientFollowupMonthly }},
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [
                        @foreach ($isNewMonthly as $data)
                            '{{ $data->date }}',
                        @endforeach
                    ],
                },
                yaxis: {
                    title: {
                        text: 'Monthly Patient Checkup Report'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val;
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#monthly_report_chart"), options);
            chart.render();
        </script>
    @endpush

</x-app-layout>
