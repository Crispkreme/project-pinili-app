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
                        <form method="POST" action="{{ route('admin.store.patient.checkup', $bmiData->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input name="patient_id" type="hidden" value="{{ $patientData->id }}" readonly>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Follow up Checkup</h4>
                                        <p class="card-title-desc">This are the complete list of our patient.</p>

                                        <h4 class="card-title">Checkup Status:
                                            <span style="text-transform: uppercase;">
                                                {{ $checkupData->statuses->status }}
                                            </span>
                                        </h4>

                                        <div class="mt-2" style="display: flex;justify-content: space-between;">
                                            @if ($checkupData->status_id == 2)
                                                <a class="btn btn-success waves-effect waves-light"
                                                    href='{{ route('admin.patient.checkup.print', $checkupData->id) }}'>
                                                    <i class="ri-printer-line align-middle me-2"></i>
                                                    Print Certificate
                                                </a>
                                            @endif
                                            <a class="btn btn-success waves-effect waves-light"
                                                href="{{ route('admin.create.patient.checkup', $patientData->id) }}">
                                                <i class="ri-printer-line align-middle me-2"></i>
                                                Prescription
                                            </a>
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
                                                            <input class="form-control" name="firstname" type="text"
                                                                value="{{ $patientData->firstname }}" readonly>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input class="form-control" name="lastname" type="text"
                                                                value="{{ $patientData->lastname }}" readonly>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input class="form-control" name="mi" type="text"
                                                                value="{{ $patientData->mi }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label"
                                                    for="example-text-input">Age</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="age" type="text"
                                                        value="{{ $patientData->age }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label" for="example-text-input">Contact
                                                    Number</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="contact_number" type="text"
                                                        value="{{ $patientData->contact_number }}" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select class="form-select" name="gender_id"
                                                        aria-label="Default select example"
                                                        style="width: 100% !important;">
                                                        <option selected="" disabled>
                                                            {{ $patientData->gender->gender }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" name="address" required="" rows="6" readonly>{{ $patientData->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3" style="display: none !important;">
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
                                                    <input class="form-control" name="blood_pressure" type="text"
                                                        placeholder="{{ $bmiData->blood_pressure }} mmHg" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label" for="example-text-input">Heart
                                                    Rate</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="heart_rate" type="text"
                                                        placeholder="{{ $bmiData->heart_rate }} bpm" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label"
                                                    for="example-text-input">Weight</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="weight" type="text"
                                                        placeholder="{{ $bmiData->weight }} kg" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label"
                                                    for="example-text-input">Temperature</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control" name="temperature" type="text"
                                                        placeholder="{{ $bmiData->temperature }} deg" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Symptom</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="symptoms" required="" rows="2" readonly>{{ $bmiData->symptoms }}</textarea>
                                                </div>
                                            </div>
                                            @if (auth()->user()->role_id == 1)
                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">Diagnosis</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" name="diagnosis" rows="3">{{ strip_tags($bmiData->diagnosis) }}</textarea>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($checkupData->status_id === 2)
                                                <div>
                                                    <a class="btn btn-warning btn-rounded waves-effect waves-light"
                                                        href="{{ route('clerk.all.patient') }}"
                                                        style="float:right;margin-left:5px;">
                                                        Back
                                                    </a>
                                                </div>
                                            @else
                                                <div>
                                                    <button class="btn btn-dark waves-effect waves-light"
                                                        type="submit" style="float:right;margin-left:5px;">
                                                        Update Checkup
                                                    </button>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->

            {{-- Modal content --}}
            <div class="modal fade bs-example-modal-center" id="diagnosis-modal" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Patient Diagnosis</h5>
                            <button class="btn-close" data-bs-dismiss="modal" type="button"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('admin.store.patient.diagnosis', $bmiData->id) }}">
                                @csrf
                                <textarea id="elm1" name="diagnosis"></textarea>
                                <button class="btn btn-dark waves-effect waves-light mt-2" type="submit"
                                    style="float: right;">Add Diagnosis</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
