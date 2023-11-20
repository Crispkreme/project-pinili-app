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
                                    <a href="{{ route('admin.create.product') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">Add Product</a><br><br>

                                    <h4 class="card-title">Product List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our product.</p>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width:15%;">ID</th>
                                                <th>Medicine Name</th>
                                                <th>Generic Name</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Form</th>
                                                <th style="width:15%;text-align:center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userData as $key => $item)
                                                <tr>
                                                    <td>{{ $item->barcode }}</td>
                                                    <td>{{ $item->medicine_name }}</td>
                                                    <td>{{ $item->generic_name }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->form->name }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.product', $item->id) }}" class="btn btn-info sm" title="Edit Data">
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
