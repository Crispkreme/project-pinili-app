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
                        <form method="POST" action="{{ route('manager.store.patient.followup.checkup') }}" enctype="multipart/form-data">
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
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Patient Name</label>
	                                            <div class="col-sm-9">
	                                            	<div class="row">
	                                            		<div class="col-sm-5">
	                                            			<input class="form-control" type="text" name="firstname" value="{{ $patientData->firstname }}" readonly>
	                                            		</div>
	                                            		<div class="col-sm-5">
	                                            			<input class="form-control" type="text" name="lastname" value="{{ $patientData->lastname }}" readonly>
	                                            		</div>
	                                            		<div class="col-sm-2">
	                                            			<input class="form-control" type="text" name="mi" value="{{ $patientData->mi }}" readonly>
	                                            		</div>
	                                            	</div>
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Age</label>
	                                            <div class="col-sm-9">
	                                                <input class="form-control" type="text" name="age" value="{{ $patientData->age }}" readonly>
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Contact Number</label>
	                                            <div class="col-sm-9">
	                                                <input class="form-control" name="contact_number" type="text" value="{{ $patientData->contact_number }}" readonly>
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label class="col-sm-3 col-form-label">Gender</label>
	                                            <div class="col-sm-9">
	                                                <select class="form-select" aria-label="Default select example" name="gender_id" style="width: 100% !important;">
	                                                    <option selected="" disabled>{{ $patientData->gender->gender }}</option>
	                                                </select>
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
                                                <label class="col-sm-3 col-form-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea required="" name="address" class="form-control" rows="6" readonly>{{ $patientData->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Picture</label>
	                                            <div class="col-sm-9">
	                                                <div class="input-group">
			                                            <input type="file" class="form-control" id="customFile" multiple accept="image/*" name="checkup_image[]">
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
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Blood Pressure</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" type="text" placeholder="{{ $bmiData->blood_pressure }} mmHg" name="blood_pressure">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Heart Rate</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" type="text" placeholder="{{ $bmiData->heart_rate }} bpm" name="heart_rate">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Weight</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" type="text" placeholder="{{ $bmiData->weight }} kg" name="weight">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Temperature</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" type="text" placeholder="{{ $bmiData->temperature }} deg" name="temperature">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Symptom</label>
                                                <div class="col-sm-8">
                                                    <textarea required="" placeholder="{{ $bmiData->symptoms }}" class="form-control" name="symptoms" rows="6"></textarea>
                                                </div>
                                            </div>
                                            @if ($bmiData->diagnosis !== "")
                                                <div class="row mb-3">
                                                    <label class="col-sm-4 col-form-label">Diagnosis</label>
                                                    <div class="col-sm-8">
                                                        <textarea required="" placeholder="{{ strip_tags($bmiData->diagnosis) }}" class="form-control" name="symptoms" rows="6"></textarea>
                                                    </div>
                                                </div>
                                            @endif
                                            <div>
                                                <button type="submit" class="btn btn-dark waves-effect waves-light" style="float:right;margin-left:5px;">Follow-up Checkup</button>
                                                <button type="button" class="btn btn-warning btn-rounded waves-effect waves-light mb-3" style="float:right;" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                                                    <i class="ri-add-fill" style="margin-right:5px;"></i>
                                                    Add Diagnosis
                                                </button>
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

            {{-- Modal content --}}
            <div class="modal fade bs-example-modal-center" id="diagnosis-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Patient Diagnosis</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('manager.store.patient.diagnosis', $bmiData->id) }}">
                                @csrf
                                <textarea id="elm1" name="diagnosis"></textarea>
                                <button type="submit" class="btn btn-dark waves-effect waves-light mt-2" style="float: right;">Add Diagnosis</button>
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
