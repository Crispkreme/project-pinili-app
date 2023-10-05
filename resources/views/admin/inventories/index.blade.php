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
                                    <a href="{{ route('admin.add.inventory.sheet') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">
                                        <i class="ri-add-fill" style="margin-right:5px;"></i>
                                        Add Payable
                                    </a>
                                    <br><br>

                                    <h4 class="card-title">Inventory Sheet List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our inventory sheet.</p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>PO Number</th>
                                                <th>Delivery Number</th>
                                                <th>New</th>
                                                <th>Old</th>
                                                <th>OR Number</th>
                                                <th>OR Date</th>
                                                <th>Delivery Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inventorySheets as $key => $item)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.edit.inventory.sheet', $item->id) }}">
                                                            {{ $item->invoice_number }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $item->po_number }}</td>
                                                    <td>{{ $item->delivery_number }}</td>
                                                    <td>{{ $item->present_delivery }}</td>
                                                    <td>{{ $item->previous_delivery }}</td>
                                                    <td>{{ $item->or_number }}</td>
                                                    <td>{{ date('M, d, Y', strtotime($item->or_date)) }}</td>
                                                    <td>{{ date('M, d, Y', strtotime($item->delivery_date)) }}</td>
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
