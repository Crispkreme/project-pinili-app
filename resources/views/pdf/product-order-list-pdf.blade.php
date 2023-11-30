<x-app-layout>

    @push('styles')
    @endpush

    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Invoice</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                        <li class="breadcrumb-item active">Invoice</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="invoice-title">
                                                <h3>
                                                    <img src="assets/images/logo-sm.png" alt="logo" height="24"/> PINILI MEDICAL CLINIC
                                                </h3>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <address>
                                                        EDWIN C. PINILI MD.<br>
                                                        OCCUPATION AND FAMILY HEALTH PHYSICIAN <br>
                                                        PINILI CLINIC 2ND RD.<br>
                                                        BRGY. CALUMPANG<br>
                                                        GENERAL SANTOS CITY, 9500
                                                    </address>
                                                </div>
                                                <div class="col-6 text-end"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mt-4">
                                                    <address>
                                                        <strong>DISTRIBUTOR/SUPPLIER:</strong><br>
                                                    </address>
                                                </div>
                                                <div class="col-6 mt-4 text-end">
                                                    <address>
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div>
                                                <div class="p-2">
                                                    <h3 class="font-size-16"><strong>Order List Summary Report</strong></h3>
                                                </div>
                                                <div class="">
                                                    <div class="table-responsive">
                                                        <table id="table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">ID</th>
                                                                    <th>Invoice Number</th>
                                                                    <th>Product Name</th>
                                                                    <th>Supplier</th>
                                                                    <th>Manufacturer</th>
                                                                    <th>Order Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($userData as $key => $item)
                                                                    <tr>
                                                                        <td>{{ (int)$key + 1 }}</td>
                                                                        <td>{{ $item->invoice_number }}</td>
                                                                        <td>{{ $item->product->medicine_name }}</td>
                                                                        <td>{{ $item->supplier->name }}</td>
                                                                        <td>{{ $item->manufacturer->company->company_name }}</td>
                                                                        <td>{{ $item->created_at->format('M. j, Y') }}</td>
                                                                        <td>
                                                                            @if($item->status_id == 1)
                                                                                <span class="badge rounded-pill bg-warning" style="font-size:12px;padding:5px;">
                                                                                    {{ $item->status->status }}
                                                                                </span>
                                                                            @elseif ($item->status_id == 8)
                                                                                <span class="badge rounded-pill bg-success" style="font-size:12px;padding:5px;">
                                                                                    {{ $item->status->status }}
                                                                                </span>
                                                                            @else
                                                                                <span class="badge rounded-pill bg-danger" style="font-size:12px;padding:5px;">
                                                                                    {{ $item->status->status }}
                                                                                </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="d-print-none">
                                                        <div class="" style="display:flex;justify-content:flex-end;">
                                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i> <span style="margin-left:5px;"> Print Invoice</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- end row -->

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Upcube.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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
    @endpush

</x-app-layout>
