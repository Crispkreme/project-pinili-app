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
                                    <h4 class="card-title">Add Company Information</h4>
                                    <p class="card-title-desc">You can add here you company information.</p>

                                    @if (count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">
                                                {{ $error }} </p>
                                        @endforeach
                                    @endif

                                    <form id="myForm" method="POST" action="{{ route('manager.store.drug.class') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Classification</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="classification_id"
                                                    name="classification_id" aria-label="Default select example">
                                                    <option selected disabled>Select Classification</option>
                                                    @if (empty($classifications))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($classifications as $classificationId => $name)
                                                            <option value="{{ $classificationId }}"
                                                                style="text-transform: capitalize">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Drug Classification
                                                Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" id="drug_classification_name" name="name"
                                                    type="text" value=""
                                                    placeholder="Drug Classification Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Description</label>
                                            <div class="form-group col-sm-10">
                                                <textarea class="form-control" id="description" name="description" cols="10" rows="5"
                                                    placeholder="Description"></textarea>
                                            </div>
                                        </div>

                                        <button class="btn btn-success waves-effect waves-light" type="submit">
                                            Add Drug Classification
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
