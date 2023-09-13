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

                                    <form method="POST" action="{{ route('admin.store.company') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Company Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="company_name" value="" placeholder="Company Name" id="company_name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Contact Number</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="contact_number" placeholder="Contact Number" value="" id="contact_number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Landline</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="landline" placeholder="Landline" value="" id="landline">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Email Address</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="email" placeholder="Email Address" value="" id="email">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Address</label>
                                            <div class="form-group col-sm-10">
                                                <textarea name="address" id="address" cols="10" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Add Company
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
