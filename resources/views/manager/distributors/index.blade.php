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
                                    <a class="btn btn-dark waves-effect waves-light" href="{{ route('manager.create.distributor') }}" style="float:right;">
                                        <i class="ri-add-fill" style="margin-right:5px;"></i>
                                        Add distributor
                                    </a>
                                    <br><br>

                                    <h4 class="card-title">Distributor List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our distributor.</p>

                                    <table class="table activate-select dt-responsive nowrap w-100"
                                        id="state-saving-datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Representative</th>
                                                <th>Position</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userData as $key => $item)
                                                <tr>
                                                    <td>{{ $item->id_number }}</td>
                                                    <td>{{ $item->entity->name }}</td>
                                                    <td>{{ $item->entity->role }}</td>
                                                    <td>{{ $item->company->company_name }}</td>
                                                    <td>{{ $item->company->address }}</td>
                                                    <td>
                                                        <div class="square-switch">
                                                            <input id="square-switch1" type="checkbox" switch="none"
                                                                {{ $item->isActive == 1 ? 'checked' : '' }}>
                                                            <label data-on-label="Active" data-off-label="Inactive"
                                                                for="square-switch1"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info sm"
                                                            href="{{ route('manager.edit.distributor', $item->id) }}"
                                                            title="Edit Data">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger sm" id="delete" href=""
                                                            title="Delete Data">
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
