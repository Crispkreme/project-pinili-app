<x-app-layout>

    @push('styles')
    @endpush

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
                                    @if(request()->routeIs('admin.all.order'))
                                        <a href="{{ route('admin.create.order') }}"
                                        class="btn btn-dark waves-effect waves-light"
                                        style="float:right;">
                                            <i class="ri-add-fill" style="margin-right:5px;"></i>
                                            Add Order
                                        </a>
                                        <br><br>
                                    @endif

                                    <h4 class="card-title">Product List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our product.</p>

                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%;" class="text-center">ID</th>
                                                <th>Product Name</th>
                                                <th style="width: 15%;">Supplier</th>
                                                <th>Manufacturer</th>
                                                <th style="width: 15%;">Order Date</th>
                                                <th>Status</th>
                                                <th style="width: 15%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($userData)
                                                @foreach($userData as $key => $item)
                                                    <tr style="vertical-align: middle;">
                                                        <td style="text-align: center;" class="text-center">{{ (int)$key + 1 }}</td>
                                                        <td>
                                                            @if($item->status_id == 7)
                                                                <a href="{{ route('admin.edit.order.data', $item->id) }}">
                                                                    {{ $item->product->medicine_name }}
                                                                </a>
                                                            @else
                                                                {{ $item->product->medicine_name }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->supplier->name }}</td>
                                                        <td>{{ $item->manufacturer->company->company_name }}</td>
                                                        <td>{{ $item->created_at->format('M. j, Y') }}</td>
                                                        <td>
                                                            @if($item->status_id == 7)
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
                                                        <td style="text-align: center;">
                                                            @if ($item->status_id == 7)

                                                                @if(request()->routeIs('admin.all.order'))
                                                                    <a href="{{ route('admin.edit.order', $item->id) }}" class="btn btn-warning waves-light" id="edit_button">
                                                                        <i class="fas fa-edit"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.delete.order', $item->id) }}" class="btn btn-danger waves-light" id="delete_button">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
                                                                @elseif(request()->routeIs('admin.pending.order'))
                                                                    <a href="{{ route('admin.approve.order', $item->id) }}" type="button" class="btn btn-success waves-light">
                                                                        <i class="ri-checkbox-circle-line"></i>
                                                                    </a>
                                                                @endif

                                                            @endif

                                                            @if ($item->status_id == 3)

                                                                @if(request()->routeIs('admin.all.delete.order'))
                                                                    <a href="{{ route('admin.restore.deleted.order', $item->id) }}" type="button" class="btn btn-success waves-light">
                                                                        <i class="ri-recycle-line"></i>
                                                                    </a>
                                                                @endif

                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <p>No data available.</p>
                                            @endif
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

    @push('scripts')
        <script type="text/javascript">
            $(function(){
                $(document).on('click','#delete_button',function(e){
                    e.preventDefault();
                    Swal.fire('Any fool can use a computer')
                    // var link = $(this).attr("href");
                    // Swal.fire({
                    //     title: 'Are you sure?',
                    //     text: "Approve This Data?",
                    //     icon: 'warning',
                    //     showCancelButton: true,
                    //     confirmButtonColor: '#3085d6',
                    //     cancelButtonColor: '#d33',
                    //     confirmButtonText: 'Yes, Approve it!'
                    // }).then((result) => {
                    //     if (result.isConfirmed) {
                    //       window.location.href = link
                    //       Swal.fire(
                    //         'Approved!',
                    //         'Your file has been Approved.',
                    //         'success'
                    //       )
                    //     }
                    // })
                });
            });
        </script>
    @endpush

</x-app-layout>
