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

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.store.representative') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <h4 class="card-title">General Information</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="role_id" aria-label="Default select example" id="role_id">
                                                    <option selected disabled>Select Role</option>
                                                    @foreach ($roles as $roleId => $roleName)
                                                        @if (in_array($roleName, ['supplier', 'representative', 'manufacturer', 'wholesaler']))
                                                            <option value="{{ $roleId }}" style="text-transform:capitalize">{{ $roleName }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="name" value="" placeholder="Name" id="name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Contact Number</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="contact_number" placeholder="Contact Number" value="" id="contact_number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Address</label>
                                            <div class="form-group col-sm-10">
                                                <textarea name="address" id="address" cols="10" rows="5" class="form-control"></textarea>
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
