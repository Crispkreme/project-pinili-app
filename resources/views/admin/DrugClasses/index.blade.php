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
                                    <a href="{{ route('admin.create.drug.class') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Drug Class</a><br><br>

                                    <h4 class="card-title">Drug Classes List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our drug classes.</p>

                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Drug Class No.</th>
                                                <th>Drug Classification Name</th>
                                                <th>description</th>
                                                <th>Classification</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userData as $key => $item)
                                                <tr>
                                                    <td class="text-center">{{ $key+1}}</td>
                                                    <td>{{ $item->id_number }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->classification->classification }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.drug.class', $item->id) }}" class="btn btn-info sm" title="Edit Data">
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
