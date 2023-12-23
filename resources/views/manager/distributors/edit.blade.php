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
                                    <h4 class="card-title">Add Representative Information</h4>
                                    <p class="card-title-desc">You can add here you representative information.</p>

                                    @if (count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">
                                                {{ $error }} </p>
                                        @endforeach
                                    @endif

                                    <form id="myForm" method="POST"
                                        action="{{ route('manager.store.representative') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Representative</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="entity_id" name="entity_id"
                                                    aria-label="Default select example">
                                                    <option selected disabled>{{ $distributor->entity->name }}</option>
                                                    @if (empty($representatives))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($representatives as $representativeId => $name)
                                                            <option value="{{ $representativeId }}"
                                                                style="text-transform: capitalize">{{ $name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Company</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" id="company_id" name="company_id"
                                                    aria-label="Default select example">
                                                    <option selected disabled>{{ $distributor->company->company_name }}
                                                    </option>
                                                    @if (empty($companies))
                                                        <option value="" disabled>No data found</option>
                                                    @else
                                                        @foreach ($companies as $companyId => $companyName)
                                                            <option value="{{ $companyId }}"
                                                                style="text-transform:capitalize">{{ $companyName }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <button class="btn btn-success waves-effect waves-light" type="submit">
                                            Edit Representative
                                            <i class="ri-edit-2-line align-middle ms-2"></i>
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
