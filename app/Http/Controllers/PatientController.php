<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\PatientBmi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use Illuminate\Support\Facades\DB;

use App\Contracts\InventoryContract;
use Illuminate\Support\Facades\Auth;

use App\Contracts\LaboratoryContract;
use App\Contracts\PatientBmiContract;
use App\Contracts\PrescriptionContract;
use Illuminate\Support\Facades\Storage;
use App\Contracts\PatientCheckupContract;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\StorePatientBmiRequest;
use App\Contracts\PatientCheckupImageContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientController extends Controller
{
    protected $patientContract;
    protected $prescriptionContract;
    protected $patientBmiContract;
    protected $patientCheckupContract;
    protected $patientCheckupImageContract;
    protected $laboratoryContract;
    protected $inventoryContract;

    public function __construct(
        PatientContract $patientContract,
        PatientBmiContract $patientBmiContract,
        PatientCheckupContract $patientCheckupContract,
        PatientCheckupImageContract $patientCheckupImageContract,
        PrescriptionContract $prescriptionContract,
        LaboratoryContract $laboratoryContract,
        InventoryContract $inventoryContract,
    ) {
        $this->patientContract = $patientContract;
        $this->patientBmiContract = $patientBmiContract;
        $this->patientCheckupContract = $patientCheckupContract;
        $this->patientCheckupImageContract = $patientCheckupImageContract;
        $this->prescriptionContract = $prescriptionContract;
        $this->laboratoryContract = $laboratoryContract;
        $this->inventoryContract = $inventoryContract;
    }

    public function getPatient()
    {
        try {
            $patientData = $this->patientContract->allPatient();

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.patients.index', [
                        'patientData' => $patientData
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.patients.index', [
                        'patientData' => $patientData
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.patients.index', [
                        'patientData' => $patientData
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function addPatient()
    {
        try {
            $patientData = $this->patientContract->allPatient();

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.patients.create', [
                        'patientData' => $patientData
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.patients.create', [
                        'patientData' => $patientData
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.patients.create', [
                        'patientData' => $patientData
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storePatient(Request $request) {
        DB::beginTransaction();

        try {

            $prefix = "PNT";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;
            $date = $request->created_at.' '.'00:00:00';

            $patientParams = [
                'id_number' => $id_number,
                'gender_id' => $request->gender_id,
                'firstname' => $request->firstname,
                'mi' => $request->mi,
                'lastname' => $request->lastname,
                'age' => $request->age,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
            ];

            $patient = $this->patientContract->storePatient($patientParams);
            $patientID = $patient->id;

            $patientBmiParams = [
                'patient_id' => $patientID,
                'blood_pressure' => $request->blood_pressure,
                'heart_rate' => $request->heart_rate,
                'temperature' => $request->temperature,
                'weight' => $request->weight,
                'symptoms' => $request->symptoms,
            ];
            $patientBmiParams['patient_id'] = $patientID;

            $patientBmi = $this->patientBmiContract->storePatientBmi($patientBmiParams);
            $patientBmiID = $patientBmi->id;

            $patientCheckupParams = [
                'id_number' => 'CHKP-'.$transactionNumber,
                'patient_bmi_id' => $patientBmiID,
                'status_id' => 1,
                'remarks' => "for checkup",
                'isNew' => 1,
                'isFollowUp' => 0,
                'check_up_date' => $date,
            ];
            $patientCheckup = $this->patientCheckupContract->storePatientCheckup($patientCheckupParams);

            $imagePaths = [];
            $patientCheckupImageData = [];

            if ($request->hasFile('checkup_image')) {
                $images = $request->file('checkup_image');
                $imageCount = count($images);

                foreach ($images as $image) {
                    $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                    // $image->move(public_path('uploads'), $imageName);
                    Storage::disk('app')->put($imageName, file_get_contents($image));
                    $imagePaths[] = 'uploads/' . $imageName;
                }

                for ($i = 0; $i < $imageCount; $i++) {
                    $patientCheckupImage = [
                        'patient_checkup_id' => $patientCheckup->id,
                        'checkup_image' => $imagePaths[$i],
                    ];
                    $patientCheckupImageData[] = $patientCheckupImage;
                }
            }

            foreach ($patientCheckupImageData as $patientCheckupImage) {
               $this->patientCheckupImageContract->storePatientCheckupImage($patientCheckupImage);
            }

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Patient data saved successfully.',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()
                        ->route('admin.all.patient')
                        ->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()
                        ->route('manager.all.patient')
                        ->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()
                        ->route('clerk.all.patient')
                        ->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {

            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()
            ->with($notification);
        }
    }

    public function editPatient($id)
    {

        try {
            $patientCheckups = $this->patientCheckupContract->getPatientCheckupByPatientId($id);

            $firstPatientCheckup = $patientCheckups->first();
            $patientBmiID = $firstPatientCheckup->patient_bmi_id;

            $patientBmi = $this->patientBmiContract->getPatientBmiByPatientId($patientBmiID);
            $patientID = $patientBmi->patient_id;

            $this->patientCheckupImageContract->getPatientCheckupImageById($id);

            $patient = $this->patientContract->getPatientById($patientID);

            return view('clerk.patients.edit', [
                'patient' => $patient,
                'patientBmi' => $patientBmi,
                'patientCheckups' => $patientCheckups,
            ]);
            $patientData = $this->patientContract->allPatient();

            if (Auth::check()) {
                switch (Auth::user()->role_id) {
                    case 1:
                        return view('admin.patients.index', [
                            'patientData' => $patientData
                        ]);
                    case 2:
                        return view('manager.patients.index', [
                            'patientData' => $patientData
                        ]);
                    case 3:
                        return view('clerk.patients.index', [
                            'patientData' => $patientData
                        ]);
                    default:
                        return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function updatePatient($id, Request $request)
    {
        DB::beginTransaction();

        try {

            $patientParams = [
                'gender_id' => $request->gender_id,
                'firstname' => $request->firstname,
                'mi' => $request->mi,
                'lastname' => $request->lastname,
                'age' => $request->age,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
            ];

            $this->patientContract->updatePatient($id, $patientParams);

            $patientBmiParams = [
                'blood_pressure' => $request->blood_pressure,
                'heart_rate' => $request->heart_rate,
                'temperature' => $request->temperature,
                'weight' => $request->weight,
                'symptoms' => $request->symptoms,
            ];

            $patientBmi = $this->patientBmiContract->getPatientBmiByPatientId($id);
            $bmiID = $patientBmi->id;

            $this->patientBmiContract->updatePatientBmi($bmiID, $patientBmiParams);

            $checkup = $this->patientCheckupContract->getPatientCheckupByBmiId($bmiID);
            $checkupId = $checkup->id;

            $patientCheckupParams = [
                'check_up_date' => $request->check_up_date,
            ];

            $this->patientCheckupContract->updatePatientCheckup($checkupId, $patientCheckupParams);

            $imagePaths = [];
            $patientCheckupImageData = [];

            if ($request->hasFile('checkup_image')) {
                $images = $request->file('checkup_image');
                $imageCount = count($images);

                foreach ($images as $image) {
                    $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                    // $image->move(public_path('uploads'), $imageName);
                    $imagePaths[] = 'uploads/' . $imageName;
                }

                for ($i = 0; $i < $imageCount; $i++) {
                    $patientCheckupImage = [
                        'patient_checkup_id' => $checkupId,
                        'checkup_image' => $imagePaths[$i],
                    ];
                    $patientCheckupImageData[] = $patientCheckupImage;
                }
            }

            foreach ($patientCheckupImageData as $patientCheckupImage) {
               $this->patientCheckupImageContract->storePatientCheckupImage($patientCheckupImage);
            }


            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Patient data updated successfully.',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()
                        ->route('admin.all.patient')
                        ->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()
                        ->route('manager.all.patient')
                        ->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()
                        ->route('clerk.all.patient')
                        ->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {
            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()
            ->with($notification);
        }
    }

    public function patientHistory($id)
    {
        try {
            $patientCheckupData = $this->patientCheckupContract->getPatientCheckupDataById($id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.patients.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.patients.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.patients.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function patientPrescriptionHistory($id)
    {
        try {
            $patientCheckupData = $this->prescriptionContract->getPatientPrescription($id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.prescriptions.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.prescriptions.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.prescriptions.history', [
                        'patientCheckupData' => $patientCheckupData,
                        'patientID' => $id,
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function patientDiagnosis($id)
    {
        try {
            $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
            $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->id);
            $patientData = $this->patientContract->getPatientDataByBmiId($bmiData->patient_id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.follow-up-checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.follow-up-checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.follow-up-checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function patientCheckup($id)
    {
        try {
            $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
            $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->id);
            $patientData = $this->patientContract->getPatientDataByBmiId($bmiData->patient_id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.follow-up-checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.follow-up-checkups.create', [
                        'patientData' => $patientData,
                        'checkupData' => $checkupData,
                        'bmiData' => $bmiData,
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function storePatientCheckup($id, Request $request)
    {
        try {

            $this->patientBmiContract->getPatientBmiById($id);

            $bmiParams = [
                'diagnosis' => $request->diagnosis,
                'symptoms' => $request->symptoms,
            ];

            $this->patientBmiContract->updatePatientBmi($id, $bmiParams);

            $this->patientCheckupContract->updatePatientCheckupStatus($id);

            return redirect()
            ->back()
            ->with('success', 'Recommendation added successfully.');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function patientFollowCheckup($id)
    {
        $patientData = $this->patientContract->getPatientById($id);
        $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
        $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->patient_bmi_id);

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.checkups.followup', [
                    'patientData' => $patientData,
                    'checkupData' => $checkupData,
                    'bmiData' => $bmiData,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.follow-up-checkups.create', [
                    'patientData' => $patientData,
                    'checkupData' => $checkupData,
                    'bmiData' => $bmiData,
                ]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.follow-up-checkups.create', [
                    'patientData' => $patientData,
                    'checkupData' => $checkupData,
                    'bmiData' => $bmiData,
                ]);
            } else {
                return view('404');
            }
        }
    }

    public function storePatientFollowCheckup($id, Request $request)
    {
        dd($request);
    }

    public function storePatientDiagnosis($id, Request $request)
    {
        try {
            $bmiParams = [
                'diagnosis' => $request->diagnosis,
                'symptoms' => $request->symptoms,
            ];

            $this->patientBmiContract->addPatientDiagnosis($id, $bmiParams);
            return redirect()
            ->back()
            ->with('success', 'Recommendation added successfully.');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
