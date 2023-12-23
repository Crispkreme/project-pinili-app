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

                                    @if (count($errors))
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">
                                                {{ $error }} </p>
                                        @endforeach
                                    @endif

                                    <form id="myForm" method="POST"
                                        action="{{ route('manager.update.company', ['id' => $company->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Company Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" id="company_name" name="company_name"
                                                    type="text" value="{{ $company->company_name }}"
                                                    placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Contact Number</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" id="contact_number" name="contact_number"
                                                    type="text" value="{{ $company->contact_number }}"
                                                    placeholder="Contact Number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Landline</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" id="landline" name="landline"
                                                    type="text" value="{{ $company->landline }}"
                                                    placeholder="Landline">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Email Address</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" id="email" name="email" type="text"
                                                    value="{{ $company->email }}" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="name">Address</label>
                                            <div class="form-group col-sm-10">
                                                <textarea class="form-control" id="address" name="address" cols="10" rows="5">{{ $company->address }}</textarea>
                                            </div>
                                        </div>

                                        <button class="btn btn-success waves-effect waves-light" type="submit">
                                            Edit Company
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
