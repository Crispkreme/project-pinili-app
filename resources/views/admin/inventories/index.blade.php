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
                                                <th>Company</th>
                                                <th>Supplier</th>
                                                <th>Delivery Number</th>
                                                <th>OR Number</th>
                                                <th>OR Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inventorySheets as $key => $item)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.all.order.history.company', $item->id) }}">
                                                            {{ $item->invoice_number }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.all.order.history.company', $item->id) }}">
                                                            {{ $item->distributor->company->company_name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $item->distributor->entity->name }}</td>
                                                    <td>{{ $item->delivery_number }}</td>
                                                    <td>{{ $item->or_number }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->status->status }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.company', $item->id) }}" class="btn btn-info sm" title="Edit Data">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger sm" title="Delete Data" id="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
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
