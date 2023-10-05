<x-app-layout>

    @push('styles')
    @endpush

    <link rel="stylesheet" href="http://[::1]:5173/resources/libs/select2/css/select2.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/bootstrap.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/icons.min.css" />
    <link rel="stylesheet" href="http://[::1]:5173/resources/css/app.min.css" />

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
                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.update.order', $productData->id) }}" id="myForm">
                                        @csrf

                                        <div style="display:flex;justify-content:space-between;align-items:center;">
                                            <div>
                                                <h4 class="card-title">Update Product Information</h4>
                                                <p class="card-title-desc">You can update here you ordered product information.</p>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">
                                                    <i class="ri-edit-2-line align-middle" style="margin-right: 12px;"></i>
                                                    Edit Product
                                                </button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Category</label>
                                                <select class="form-select" aria-label="Default select example" name="category_id">
                                                    <option value="{{ $productData->category_id }}" disabled>{{ $productData->category->name }}</option>
                                                    @if (empty($categoryData))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($categoryData as $category)
                                                            <option value="{{ $category->id }}" style="text-transform: capitalize">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="col-form-label">Product Form</label>
                                                <select class="form-select" aria-label="Default select example" name="form_id">
                                                    <option value="{{ $productData->form_id }}" disabled>{{ $productData->form->name }}</option>
                                                    @if (empty($formData))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($formData as $form)
                                                            <option value="{{ $form->id }}" style="text-transform: capitalize">
                                                                {{ $form->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="barcode-text-input" class="col-form-label">Barcode</label>
                                                <input name="barcode" class="form-control" type="text" value="{{ $productData->barcode }}" id="barcode-text-input" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="serial-number-text-input" class="col-form-label">Serial Number</label>
                                                <input name="serial_number" class="form-control" type="text" value="{{ $productData->serial_number }}" id="serial-number-text-input">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="medicine-name-text-input" class="col-form-label">Medicine Name</label>
                                                <input name="medicine_name" class="form-control" type="text" value="{{ $productData->medicine_name }}" id="medicine-name-text-input">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="generic-name-text-input" class="col-form-label">Generic Name</label>
                                                <input name="generic_name" class="form-control" type="text" value="{{ $productData->generic_name }}" id="generic-name-text-input">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="medicine-name-text-input" class="col-form-label">SKU</label>
                                                <input name="sku" class="form-control" type="text" value="{{ $productData->sku }}" id="medicine-name-text-input">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="generic-name-text-input" class="col-form-label">Sold</label>
                                                <input name="sold" class="form-control" type="text" value="{{ $productData->sold }}" id="generic-name-text-input">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="generic-name-text-input" class="col-form-label">Available</label>
                                                <input name="available" class="form-control" type="text" value="{{ $productData->available }}" id="generic-name-text-input">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="description-text-input" class="col-form-label">Description</label>
                                                <textarea class="form-control" name="description" id="description-text-input" cols="10" rows="5">{{ $productData->description }}</textarea>
                                            </div>
                                        </div>
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

    <script src="http://[::1]:5173/resources/libs/jquery/jquery.min.js"></script>
    <script src="http://[::1]:5173/resources/js/handlebars.js"></script>

    <script src="http://[::1]:5173/resources/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/metismenu/metisMenu.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/simplebar/simplebar.min.js"></script>
    <script src="http://[::1]:5173/resources/libs/node-waves/waves.min.js"></script>

    <script src="http://[::1]:5173/resources/libs/select2/js/select2.min.js"></script>
    <script src="http://[::1]:5173/resources/js/pages/form-advanced.init.js"></script>
    <script src="http://[::1]:5173/resources/js/main-js.js"></script>

    @push('scripts')
    @endpush

</x-app-layout>
