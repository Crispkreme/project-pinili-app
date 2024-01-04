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
                                    <a href="{{ route('admin.create.user') }}" class="btn btn-dark waves-effect waves-light" style="float:right;">
                                        <i class="ri-add-fill" style="margin-right:5px;"></i>
                                        Add User
                                    </a>
                                    <br><br>

                                    <h4 class="card-title">User List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our users.</p>

                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userData as $key => $item)
                                                <tr style="vertical-align: middle;text-transform:uppercase;">
                                                    <td class="text-center">{{ $key+1}}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->contact_number }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        <div class="square-switch">
                                                            <input type="checkbox" id="square-switch1" switch="none" {{ $item->isActive == 1 ? 'checked' : '' }}>
                                                            <label for="square-switch1"
                                                                   data-on-label="Active"
                                                                   data-off-label="Inactive"
                                                                   onclick="toggleSwitch('{{ route('admin.update.status.notactive.user', $item->id) }}','{{ route('admin.update.status.active.user', $item->id) }}')"
                                                            ></label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.edit.user', $item->id) }}" class="btn btn-info sm" title="Edit Data">
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

    <script>
        function toggleSwitch(activeRoute, notActiveRoute) {
            var checkbox = document.getElementById('square-switch1');
            if (checkbox.checked) {
                window.location.href = activeRoute;
            } else {
                window.location.href = notActiveRoute;
            }
        }
    </script>

</x-app-layout>
