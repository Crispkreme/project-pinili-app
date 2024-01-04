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
                                    <a class="btn btn-dark waves-effect waves-light" href="{{ route('manager.create.drug.class') }}" style="float:right;">
                                        <i class="ri-add-fill" style="margin-right:5px;"></i>
                                        Add DrugClass
                                    </a>
                                    <br><br>

                                    <h4 class="card-title">Drug Classes List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our drug classes.</p>

                                    <table class="table activate-select dt-responsive nowrap w-100"
                                        id="state-saving-datatable">
                                        <thead>
                                            <tr>
                                                <th style="width:15%;">ID</th>
                                                <th style="width:20%;">Drug Classification Name</th>
                                                <th>description</th>
                                                <th style="width:10%;">Classification</th>
                                                <th style="width:15%;text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userData as $key => $item)
                                                <tr style="vertical-align: middle;text-transform:uppercase;">
                                                    <td>{{ $item->id_number }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->classification->classification }}</td>
                                                    <td>
                                                        <a class="btn btn-info sm"
                                                            href="{{ route('manager.edit.drug.class', $item->id) }}"
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
