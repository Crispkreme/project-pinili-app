<x-app-layout>
    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

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
                                    <h4 class="card-title">Add Product Information</h4>
                                    <p class="card-title-desc">You can add here you product information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.store.product') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Date</label>
                                                    <input class="form-control" style="width:98%;" type="date" value="2011-08-19" id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row mb-3">
                                                    <label for="name" class="col-form-label">Purchase Number</label>
                                                    <input class="form-control" style="width:98%;" type="text" id="example-date-input" placeholder="Purchase Number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                        <div class="row" style="align-items: flex-end;">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="name" class="col-form-label">Product Category</label>
                                                            <select class="form-select" style="width:98%;" name="category_id" aria-label="Default select example" id="category_id">
                                                                <option selected disabled>Select Product Category</option>
                                                                @if (empty($categoryData))
                                                                    <option value="" disabled>No data found</option>
                                                                @else
                                                                    @foreach ($categoryData as $categoryDataId => $name)
                                                                        <option value="{{ $categoryDataId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="name" class="col-form-label">Product Form</label>
                                                            <select class="form-select" style="width:98%;" name="entity_id" aria-label="Default select example" id="entity_id">
                                                                <option selected disabled>Select Product Form</option>
                                                                @if (empty($representatives))
                                                                    <option value="" disabled>No data found</option>
                                                                @else
                                                                    @foreach ($representatives as $representativeId => $name)
                                                                        <option value="{{ $representativeId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <label for="name" class="col-form-label">Product Name</label>
                                                            <select class="form-select" style="width:98%;" name="entity_id" aria-label="Default select example" id="entity_id">
                                                                <option selected disabled>Select Product Name</option>
                                                                @if (empty($representatives))
                                                                    <option value="" disabled>No data found</option>
                                                                @else
                                                                    @foreach ($representatives as $representativeId => $name)
                                                                        <option value="{{ $representativeId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div style="display:flex;justify-content:flex-end;">
                                                    <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light">
                                                        <i class="ri-add-fill align-middle ms-2" style="margin-right: 1px;"></i>
                                                        Add More
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Add Product
                                            <i class="ri-user-add-line align-middle ms-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>

                </div>
            </div>

            <x-footer />

        </div>

    </div>

    <x-right-sidebar />

    <div class="rightbar-overlay"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('change','#category_id',function(){
                let url = '{{ route('admin.get.specific.product', ':id') }}';
                var category_id = $(this).val();

                $.ajax({
                    url: url.replace(':id', this.value),
                    type: "GET",
                    data: { category_id: category_id },
                    success: function(data){
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function(key, v){
                            html += `<option value="${v.id}">${v.name}</option>`;
                        });
                        $('#product_id').html(html);
                    }
                });
            });
        });
    </script>

</x-app-layout>
