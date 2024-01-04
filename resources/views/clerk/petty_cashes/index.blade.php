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
                                    <a href="{{ route('clerk.create.petty.cash') }}" class="btn btn-dark waves-effect waves-light" style="float:right;">
                                        <i class="ri-add-fill" style="margin-right:5px;"></i>
                                        Add Petty Cash
                                    </a>
                                    <br><br>

                                    <h4 class="card-title">Petty Cash List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our petty cash.</p>

                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Invoice Number</th>
                                                <th>Amount Paid</th>
                                                <th>Total Amount</th>
                                                <th>Discount</th>
                                                <th>Requestor</th>
                                                <th style="width: 20%;">Remarks</th>
                                                <th>Date</th>
                                                <th style="width: 10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pettyCash as $key => $item)
                                                <tr style="vertical-align:baseline;">
                                                    <td style="text-align: center;">
                                                        {{ (int)$key + 1 }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('clerk.edit.petty.cash', $item->id) }}">
                                                            {{ $item->invoice_number }}
                                                        </a>
                                                    <td>{{ $item->paid_amount }}</td>
                                                    <td>{{ $item->total_amount }}</td>
                                                    <td>{{ $item->discount }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->remarks }}</td>
                                                    <td>{{ date('M, d, Y', strtotime($item->file_date)) }}</td>
                                                    <td>
                                                        @if($item->petty_cash_status_id === 1)
                                                            <a href="{{ route('clerk.edit.petty.cash', $item->id) }}" type="button" class="btn btn-warning waves-effect waves-light">
                                                                <i class="ri-error-warning-line align-middle me-2"></i> Pending
                                                            </a>
                                                        @else
                                                            <button type="button" class="btn btn-success waves-effect waves-light" disabled>
                                                                <i class="ri-check-line align-middle me-2"></i> Approved
                                                            </button>
                                                        @endif
                                                    </td>
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

</x-app-layout>
