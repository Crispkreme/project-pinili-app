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
                        <form method="POST" action="{{ route('clerk.update.patient', ['id' => $patient->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row" style="align-items: flex-end;">
                                                <div class="col-md-6">
                                                    <h4 class="card-title">Add New Patient Data</h4>
                                                    <p class="card-title-desc">This are the complete list of our users.
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6" style="text-align: end;">
                                                            <label class="col-form-label"
                                                                for="example-text-input">Date</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input class="form-control col-md-9" id="example-text-input"
                                                                name="check_up_date" type="date"
                                                                value="{{ $patientCheckups->check_up_date }}"
                                                                style="text-transform: uppercase;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-7">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="example-text-input">Patient
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <div class="col-sm-5">
                                                            <input class="form-control" id="example-text-input"
                                                                name="firstname" type="text"
                                                                value="{{ $patient->firstname }}">
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input class="form-control" id="example-text-input"
                                                                name="lastname" type="text"
                                                                value="{{ $patient->lastname }}">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" id="example-text-input"
                                                                name="mi" type="text"
                                                                value="{{ $patient->mi }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label"
                                                    for="example-text-input">Age</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="example-text-input" name="age"
                                                        name="age" type="text" value="{{ $patient->age }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="example-text-input">Contact
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="example-text-input"
                                                        name="contact_number" type="text"
                                                        value="{{ $patient->contact_number }}"
                                                        placeholder="09067--------">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="gender_id"
                                                        aria-label="Default select example"
                                                        style="width: 100% !important;">
                                                        @if ($patient->gender_id)
                                                            <option value="{{ $patient->gender_id }}" selected>
                                                                {{ ucwords($patient->gender->gender) }}</option>
                                                        @endif
                                                        <option disabled>Select Gender</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="address" rows="6">{{ $patient->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label"
                                                    for="example-text-input">Picture</label>
                                                <div class="col-sm-9">
                                                    <div class="input-group">
                                                        <input class="form-control" id="customFile"
                                                            name="checkup_image[]" type="file" multiple
                                                            accept="image/*">
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
                                                <label class="col-sm-4 col-form-label" for="example-text-input">Blood
                                                    Pressure</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="example-text-input"
                                                        name="blood_pressure" type="text"
                                                        value="{{ $patientBmi->blood_pressure }}"
                                                        placeholder="xxx/xxmmHg">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label" for="example-text-input">Heart
                                                    Rate</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="example-text-input"
                                                        name="heart_rate" type="text"
                                                        value="{{ $patientBmi->heart_rate }}" placeholder="xx bpm">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label"
                                                    for="example-text-input">Weight</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="example-text-input"
                                                        name="weight" type="text"
                                                        value="{{ $patientBmi->weight }}" placeholder="xx kg">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label"
                                                    for="example-text-input">Temperature</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" id="example-text-input"
                                                        name="temperature" type="text"
                                                        value="{{ $patientBmi->temperature }}" placeholder="xx deg">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Symptom</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="symptoms" required="" placeholder="Diagnosis" rows="6">{{ $patientBmi->symptoms }}</textarea>
                                                </div>
                                            </div>

                                            <button class="btn btn-dark waves-effect waves-light mb-3"
                                                type="submit" style="float:right;">Update Patient Admit</button>
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
