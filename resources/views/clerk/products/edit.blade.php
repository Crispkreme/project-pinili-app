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
                                    <h4 class="card-title">Update Company Information</h4>
                                    <p class="card-title-desc">You can update here you company information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('clerk.update.product', ['id' => $product->id]) }}" enctype="multipart/form-data" id="myForm">
                                        @csrf

                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Serial Number</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="serial_number" value="{{ $product->serial_number }}" placeholder="Serial Number" id="serial_number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Medicine Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="medicine_name" value="{{ $product->medicine_name }}" placeholder="Medicine Name" id="medicine_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Generic Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="generic_name" placeholder="Generic Name" value="{{ $product->generic_name }}" id="generic_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="category_id" aria-label="Default select example" id="category_id">
                                                    <option value="{{ $product->category_id }}" selected>{{ $product->category->name }}</option>
                                                    @if (empty($categories))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($categories as $categoryId => $name)
                                                            <option value="{{ $categoryId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Form</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="form_id" aria-label="Default select example" id="form_id">
                                                    <option value="{{ $product->form_id }}" selected>{{ $product->form->name }}</option>
                                                    @if (empty($forms))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($forms as $formId => $name)
                                                            <option value="{{ $formId }}" style="text-transform: capitalize">{{ $name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Description</label>
                                            <div class="form-group col-sm-10">
                                                <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Edit Product
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

</x-app-layout>
