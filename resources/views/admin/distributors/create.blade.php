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

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.store.distributor') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Representative</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="entity_id" aria-label="Default select example" id="entity_id">
                                                    <option selected disabled>Select Representative</option>
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
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Company</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="company_id" aria-label="Default select example" id="company_id">
                                                    <option selected disabled>Select Company</option>
                                                    @if (empty($companies))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($companies as $companyId => $companyName)
                                                            <option value="{{ $companyId }}" style="text-transform:capitalize">{{ $companyName }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Add Representative
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
