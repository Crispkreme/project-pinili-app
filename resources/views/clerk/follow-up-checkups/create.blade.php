<x-app-layout>

    <style>
        input[switch]+label {
            width: 80px !important;
        }

        input[switch]:checked+label:after {
            left: 58px !important;
        }

        select {
            width: 60px !important;
        }
    </style>

    <div id="layout-wrapper">

        @include('layouts.header-navigation')

        @include('layouts.sidebar')

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <x-breadcrumb />
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <form method="POST" action="{{ route('clerk.store.patient.followup.checkup') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="patient_id" value="{{ $patientData->id }}" readonly>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Follow up Checkup</h4>
                                        <p class="card-title-desc">This are the complete list of our users.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Patient
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <input class="form-control" type="text" name="firstname"
                                                                value="{{ $patientData->firstname }}" readonly style='text-transform:uppercase'>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input class="form-control" type="text" name="lastname"
                                                                value="{{ $patientData->lastname }}" readonly style='text-transform:uppercase'>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" type="text" name="mi"
                                                                value="{{ $patientData->mi }}" readonly style='text-transform:uppercase'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input"
                                                    class="col-sm-3 col-form-label">Age</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="text" name="age"
                                                        value="{{ $patientData->age }}" readonly style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-3 col-form-label">Contact
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="contact_number" type="text"
                                                        value="{{ $patientData->contact_number }}" readonly style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="gender_id" style="width: 100% !important;">
                                                        <option selected="" style='text-transform:uppercase' disabled>
                                                            {{ $patientData->gender->gender }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea required="" name="address" class="form-control" rows="6" readonly style='text-transform:uppercase'>{{ $patientData->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input"
                                                    class="col-sm-3 col-form-label">Picture</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="customFile"
                                                            multiple accept="image/*" name="checkup_image[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Blood
                                                    Pressure</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="xxx mmHg"
                                                        name="blood_pressure" style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-4 col-form-label">Heart
                                                    Rate</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="xxx bpm"
                                                        name="heart_rate" style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input"
                                                    class="col-sm-4 col-form-label">Weight</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="xxx kg"
                                                        name="weight" style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="example-text-input"
                                                    class="col-sm-4 col-form-label">Temperature</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" type="text" placeholder="xxx deg"
                                                        name="temperature" style='text-transform:uppercase'>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Symptom</label>
                                                <div class="col-sm-8">
                                                    <textarea required="" style='text-transform:uppercase' placeholder="xxx" class="form-control" name="symptoms" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit"
                                                    class="btn btn-dark waves-effect waves-light"
                                                    style="float:right;margin-left:5px;">Follow-up Checkup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->
            <x-footer />

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <x-right-sidebar />
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script>
        function toggleSwitch(activeRoute, notActiveRoute) {
            var checkbox = document.getElementById('square-switch1');
            if (checkbox.checked) {
                window.location.href = activeRoute;
            } else {
                window.location.href = notActiveRoute;
            }
        }
    </script>

</x-app-layout>
