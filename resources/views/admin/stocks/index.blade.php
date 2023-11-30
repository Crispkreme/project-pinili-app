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
                                        class="btn btn-dark btn-rounded waves-effect waves-light"
                                        style="float:right;">Add Order</a>
                                        <br><br>
                                    @endif

                                    <h4 class="card-title">Stock List Data</h4>
                                    <p class="card-title-desc">This are the complete list of our stocks.</p>

                                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th>Invoice Number</th>
                                                <th>Product Name</th>
                                                <th>Supplier</th>
                                                <th>Manufacturer</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($userData)
                                                @foreach($userData as $key => $item)
                                                    <tr style="vertical-align: middle;">
                                                        <td style="text-align: center;">{{ (int)$key + 1 }}</td>
                                                        <td>{{ $item->invoice_number }}</td>
                                                        <td>{{ $item->product->medicine_name }}</td>
                                                        <td>{{ $item->supplier->name }}</td>
                                                        <td>{{ $item->manufacturer->company->company_name }}</td>
                                                        <td>{{ $item->quantity }}</td>
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
