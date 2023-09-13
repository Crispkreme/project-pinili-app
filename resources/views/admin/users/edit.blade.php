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
                                    <h4 class="card-title">Add user Information</h4>
                                    <p class="card-title-desc">You can add here you user information.</p>

                                    @if(count($errors))
                                        @foreach ($errors->all() as $error)
                                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                        @endforeach
                                    @endif

                                    <form method="POST" action="{{ route('admin.store.user') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf
                                        <h4 class="card-title">Credentials</h4><br>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="role_id" aria-label="Default select example" id="role_id">
                                                    <option selected disabled>Select Role</option>
                                                    @foreach ($roles as $roleId => $roleName)
                                                        <option value="{{ $roleId }}" style="text-transform:capitalize">{{ $roleName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="username" placeholder="Username" id="username">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password" id="confirm-password">
                                            </div>
                                        </div>
                                        <br><br>

                                        <h4 class="card-title">Personal Information</h4><br>
                                        <div class="row mb-3">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="name" value="" placeholder="Name" id="name">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-sm-2 col-form-label">Email Address</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="email" name="email" placeholder="your@email.com" value="" id="email">
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
                                        <div class="row mb-3">
                                            <label for="image" class="col-sm-2 col-form-label">Profile Image</label>
                                            <div class="form-group col-sm-10">
                                                <input type="file" class="form-control" name="profile_image" id="image">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="showImage" class="col-sm-2 col-form-label"></label>
                                            <div class="form-group col-sm-10">
                                                <img id="showImage" class="rounded avatar-lg" src="{{ asset('storage/img/no-image.png') }}" alt="Card image cap">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-light">
                                            Add User
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

</x-app-layout>
