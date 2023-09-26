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
                                    <a href="{{ route('admin.add.inventory.sheet') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="ri-add-fill" style="margin-right:5px;"></i> Add Inventory Sheet</a><br><br>

                                    <h4 class="card-title">Inventory Sheet List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our inventory sheet.</p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Invoice Number</th>
                                                <th>Medicine Name</th>
                                                <th>Brand Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Delivery Number</th>
                                                <th>Delivery Date</th>
                                                <th>Delivery Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inventorySheets as $key => $item)
                                                <tr>
                                                    <td>
                                                        <a href="">
                                                            {{ $item->inventory_sheet->invoice_number }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $item->product->medicine_name }}</td>
                                                    <td>{{ $item->product->generic_name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->price }}</td>
                                                    <td>{{ $item->inventory_sheet->delivery_number }}</td>
                                                    <td>{{ date('M, d, Y', strtotime($item->inventory_sheet->delivery_date)) }}</td>
                                                    <td>
                                                        @if( $item->inventory_status_id == 7)
                                                            <span class="badge rounded-pill bg-success" style="font-size:12px;padding:5px;">
                                                                {{ $item->inventory_status->status }}
                                                            </span>
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
