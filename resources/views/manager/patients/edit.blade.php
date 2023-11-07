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
                        <form method="POST" action="{{ route('manager.update.patient', ['id' => $patient->id]) }}" enctype="multipart/form-data">
                        	@csrf

                        	<div class="col-12">
	                            <div class="card">
	                                <div class="card-body">
	                                    <h4 class="card-title">Update Patient Data</h4>
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
	                                            			<input class="form-control" value="{{ $patient->firstname }}" type="text" id="example-text-input" name="firstname">
	                                            		</div>
	                                            		<div class="col-sm-5">
	                                            			<input class="form-control" value="{{ $patient->lastname }}" type="text" id="example-text-input" name="lastname">
	                                            		</div>
	                                            		<div class="col-sm-2">
	                                            			<input class="form-control" value="{{ $patient->mi }}" type="text" id="example-text-input" name="mi">
	                                            		</div>
	                                            	</div>
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Age</label>
	                                            <div class="col-sm-9">
	                                                <input class="form-control" type="text" value="{{ $patient->age }}" name="age" id="example-text-input" name="age">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-3 col-form-label">Contact Number</label>
	                                            <div class="col-sm-9">
	                                                <input class="form-control" value="{{ $patient->contact_number }}" name="contact_number" type="text" placeholder="09067--------" id="example-text-input">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label class="col-sm-3 col-form-label">Gender</label>
	                                            <div class="col-sm-9">
	                                                <select class="form-select" aria-label="Default select example" name="gender_id" style="width: 100% !important;">
                                                        @if($patient->gender_id)
                                                            <option selected value="{{ $patient->gender_id }}">{{ ucwords($patient->gender->gender) }}</option>
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
                                                    <textarea name="address" class="form-control" rows="6">{{ $patient->address }}</textarea>
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
	                                                <input class="form-control" value="{{ $patientBmi->blood_pressure }}" type="text" placeholder="xxx/xxmmHg" id="example-text-input" name="blood_pressure">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Heart Rate</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" value="{{ $patientBmi->heart_rate }}" type="text" placeholder="xx bpm" name="heart_rate" id="example-text-input">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Weight</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" value="{{ $patientBmi->weight }}" type="text" placeholder="xx kg" name="weight" id="example-text-input">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
	                                            <label for="example-text-input" class="col-sm-4 col-form-label">Temperature</label>
	                                            <div class="col-sm-8">
	                                                <input class="form-control" value="{{ $patientBmi->temperature }}" type="text" placeholder="xx deg" name="temperature" id="example-text-input">
	                                            </div>
	                                        </div>
	                                        <div class="row mb-3">
                                                <label class="col-sm-4 col-form-label">Symptom</label>
                                                <div class="col-sm-8">
                                                    <textarea required="" placeholder="Diagnosis" class="form-control" name="symptoms" rows="6">{{ $patientBmi->symptoms }}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-dark btn-rounded waves-effect waves-light mb-3" style="float:right;">Update Patient Admit</button>
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
