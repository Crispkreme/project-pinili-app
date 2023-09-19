<x-app-layout>
    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content" style="height:100vh;">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Daily Invoice Report</h4>
                                    <p class="card-title-desc">Select specific date to filter.</p>

                                    <form method="POST" id="myForm" action="{{ route('admin.daily.order.report.all')}}">
                                        @csrf
                                        <div style="display:flex;justify-content: space-evenly;">
                                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container="#datepicker6" style="width: 80%;">
                                                <input type="text" class="form-control" name="start" placeholder="Start Date" name="start_date" id="start_date">
                                                <input type="text" class="form-control" name="end" placeholder="End Date" name="end_date" id="end_date">
                                            </div>
                                            <button class="btn btn-info" type="submit">
                                                <span>
                                                    <i class="ri-search-2-line"></i>
                                                </span>
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                    @if(!empty($userData))
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div style="align-items: flex-end;display: flex;justify-content: space-between;margin-bottom: 20px;">
                                            <div class="table-details">
                                                <h4 class="card-title">Order List Data</h4>
                                                <p class="card-title-desc">This are the complete list of our filtered data.</p>
                                            </div>
                                            <div>
                                                <button class="btn btn-success">
                                                    <span>
                                                        <i class="ri-printer-line"></i>
                                                    </span>
                                                    Generate Invoice
                                                </button>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
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
                                                            @elseif ($item->status_id == 2)
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
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

    <!-- <script>
        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = String(currentDate.getMonth() + 1).padStart(2, '0');
        var day = String(currentDate.getDate()).padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day;

        document.getElementById('start_date').value = formattedDate;
        document.getElementById('end_date').value = formattedDate;
    </script> -->

</x-app-layout>
