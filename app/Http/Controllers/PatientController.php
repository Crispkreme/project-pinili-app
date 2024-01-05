<?php

namespace App\Http\Controllers;

use App\Contracts\InventoryContract;
use App\Contracts\LaboratoryContract;
use App\Contracts\PatientBmiContract;
use App\Contracts\PatientCheckupContract;
use App\Contracts\PatientCheckupImageContract;
use App\Contracts\PatientContract;
use App\Contracts\PrescribeLaboratoryContract;
use App\Contracts\PrescribeMedicineContract;
use App\Contracts\PrescriptionContract;
use App\Contracts\ProductContract;

use App\Http\Requests\AddPatientPrescriptionRequest;
use App\Http\Requests\StorePatientBmiRequest;

use App\Http\Requests\StorePatientRequest;
use App\Models\PatientBmi;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    protected $productContract;
    protected $patientContract;
    protected $prescriptionContract;
    protected $patientBmiContract;
    protected $patientCheckupContract;
    protected $patientCheckupImageContract;
    protected $laboratoryContract;
    protected $inventoryContract;
    protected $prescribeMedicineContract;
    protected $prescribeLaboratoryContract;

    public function __construct(
        PrescribeMedicineContract $prescribeMedicineContract,
        PatientContract $patientContract,
        PrescribeLaboratoryContract $prescribeLaboratoryContract,
        PatientBmiContract $patientBmiContract,
        PatientCheckupContract $patientCheckupContract,
        PatientCheckupImageContract $patientCheckupImageContract,
        PrescriptionContract $prescriptionContract,
        LaboratoryContract $laboratoryContract,
        InventoryContract $inventoryContract,
        ProductContract $productContract,
    ) {
        $this->patientContract = $patientContract;
        $this->patientBmiContract = $patientBmiContract;
        $this->patientCheckupContract = $patientCheckupContract;
        $this->patientCheckupImageContract = $patientCheckupImageContract;
        $this->prescriptionContract = $prescriptionContract;
        $this->laboratoryContract = $laboratoryContract;
        $this->inventoryContract = $inventoryContract;
        $this->productContract = $productContract;
        $this->prescribeMedicineContract = $prescribeMedicineContract;
        $this->prescribeLaboratoryContract = $prescribeLaboratoryContract;
    }
    
    private function getRedirectRoute()
    {
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;

            if ($role_id == 1) {
                return 'admin.all.patient.prescription';
            } elseif ($role_id == 2) {
                return 'manager.all.patient.prescription';
            }
        }

        return '404';
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

    // PATIENT CHECK UP FUNCTIONALITY
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
    public function patientCheckupPdf($id)
    {
        try {

            $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
            $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->id);
            $patientData = $this->patientContract->getPatientDataByBmiId($bmiData->patient_id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.patient-checkups.medical-certificate', [
                        'checkupData' => $checkupData,
                        'patientData' => $patientData,
                        'bmiData' => $bmiData,
                        'checkupID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('clerk.patient-checkups.medical-certificate', [
                        'checkupData' => $checkupData,
                        'patientData' => $patientData,
                        'bmiData' => $bmiData,
                        'checkupID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.patient-checkups.medical-certificate', [
                        'checkupData' => $checkupData,
                        'patientData' => $patientData,
                        'bmiData' => $bmiData,
                        'checkupID' => $id,
                    ]);
                } else {
                    return view('404');
                }
            }
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function getAllPatientCheckup()
    {
        $patientCheckupData = $this->patientCheckupContract->allPatientCheckup();

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.patient-checkups.index', ['patientCheckupData' => $patientCheckupData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.patient-checkups.index', ['patientCheckupData' => $patientCheckupData]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.patient-checkups.index', ['patientCheckupData' => $patientCheckupData]);
            } else {
                return view('404');
            }
        }
    }
    public function createPatientCheckup($id)
    {
        $patientCheckupData = $this->patientCheckupContract->getPatientCheckupById($id);
        $laboratories = $this->laboratoryContract->getLaboratoryData();
        $products = $this->inventoryContract->getProductDataByInventory();
        $firstTab = 'progress-medicine-details';
        $lastTab = 'progress-purchase-products';

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.patient-checkups.create', [
                    'patientCheckupData' => $patientCheckupData,
                    'products' => $products,
                    'laboratories' => $laboratories,
                    'firstTab' => $firstTab,
                    'lastTab' => $lastTab,
                ]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.patient-checkups.create', [
                    'patientCheckupData' => $patientCheckupData,
                    'products' => $products,
                    'laboratories' => $laboratories,
                    'firstTab' => $firstTab,
                    'lastTab' => $lastTab,
                ]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.patient-checkups.create', [
                    'patientCheckupData' => $patientCheckupData,
                    'products' => $products,
                    'laboratories' => $laboratories,
                    'firstTab' => $firstTab,
                    'lastTab' => $lastTab,
                ]);
            } else {
                return view('404');
            }
        }
    }
    public function storePatientFollowupCheckup(Request $request) {
        DB::beginTransaction();

        try {
            $transactionNumber = Carbon::now()->format('mHis');
            $patientID = $request->patient_id;
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
                'remarks' => "for follow-up",
                'isNew' => 1,
                'isFollowUp' => 1,
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

            $patientPrescriptionParams = [
                'product_id' => 1,
                'patient_checkup_id' => $patientCheckup->id,
                'laboratory_id' => 1,
                'status_id' => 1,
                'invoice_number' => "",
                'remarks' => "pending",
                'isActive' => 1,
            ];
            $this->prescriptionContract->storePrescription($patientPrescriptionParams);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Patient data saved successfully.',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.patient')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.patient')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.patient')->with($notification);
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

            return redirect()->back()->with($notification);
        }
    }
    public function createPatientFollowupCheckup($id)
    {
        $patientData = $this->patientContract->getPatientById($id);
        $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
        $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->patient_bmi_id);

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
    }
    public function updatePatientCheckupStatus($id)
    {
        try {

            $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);

            $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->patient_bmi_id);

            $patientData = $this->patientContract->getPatientDataByBmiId($bmiData->patient_id);

            if (Auth::check()) {
                if (Auth::user()->role_id == 2) {
                    return view('manager.patient-checkups.update-checkup-status', [
                        'checkupData' => $checkupData,
                        'patientData' => $patientData,
                        'bmiData' => $bmiData,
                        'checkupID' => $id,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.patient-checkups.update-checkup-status', [
                        'checkupData' => $checkupData,
                        'patientData' => $patientData,
                        'bmiData' => $bmiData,
                        'checkupID' => $id,
                    ]);
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {
            dd($e);
        }
    }
    public function updateCheckupStatus($id)
    {
        try {

            $bmiData = $this->patientBmiContract->getPatientIdByPatientBmi($id);
            $data = $this->patientCheckupContract->updatePatientCheckupStatus($bmiData->id);

            return redirect()
                ->back()
                ->with('success', 'Checkup updated successfully.');

        } catch (Exception $e) {
            dd($e);
        }

    }

    // PATIENT PRESCRIPTION FUNCTIONALITY
    public function getPatientPrescription()
    {
        $patientData = $this->patientContract->allPatient();

        return view('admin.prescriptions.index', [
            'patientData' => $patientData,
        ]);
    }
    public function storePatientPrescription(AddPatientPrescriptionRequest $request)
    {
        DB::beginTransaction();

        try {
            $prefix = "TNX-PRS";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoiceNumber = $prefix . '-' . $transactionNumber;

            $params = $request->validated();
            $statusId = 1;
            $remarks = "for checkup";
            $isActive = 1;
            $qty = 1;

            $medicineId = [];
            $laboratoryId = [];
            $prescriptionData = [];

            if (!empty($request->follow_up_date)) {

                // Prescribe Medicine
                if (!empty($request->product_id)) {

                    for ($i = 0; $i < count($request->product_id); $i++) {

                        $medicine = [
                            'product_id' => $request->product_id[$i],
                            'srp' => $request->srp[$i],
                            'quantity' => $request->qty_medicine[$i],
                            'remarks' => $request->remark_medicine[$i],
                            'isActive' => $isActive,
                        ];

                        $medicineData[] = $medicine;
                    }

                    foreach ($medicineData as $medicine) {
                        $prescribeMedicine = $this->prescribeMedicineContract->storePrescribeMedicine($medicine);
                        $medicineId[] = $prescribeMedicine->id;
                    }
                } else {
                    $medicineId[] = 1;
                }

                // Prescribe Laboratory
                if (!empty($request->laboratory_id)) {

                    for ($i = 0; $i < count($request->laboratory_id); $i++) {

                        $laboratory = [
                            'laboratory_id' => $request->laboratory_id[$i],
                            'quantity' => $request->qty_laboratory[$i],
                            'remarks' => $request->remark_laboratory[$i],
                            'isActive' => $isActive,
                        ];

                        $laboratoryData[] = $laboratory;
                    }

                    foreach ($laboratoryData as $laboratory) {
                        $prescribeLaboratory = $this->prescribeLaboratoryContract->storePrescribeLaboratory($laboratory);
                        $laboratoryId[] = $prescribeLaboratory->id;
                    }
                } else {
                    $laboratoryId[] = 1;
                }

                $prescribeIds = (count($medicineId) >= count($laboratoryId)) ? $medicineId : $laboratoryId;
                $maxIterations = max(count($medicineId), count($laboratoryId));
                $patientCheckupId = $request->patient_checkup_id;

                for ($i = 0; $i < $maxIterations; $i++) {
                    $prescription = [
                        'patient_checkup_id' => $patientCheckupId,
                        'prescribe_medicine_id' => isset($medicineId[$i]) ? $medicineId[$i] : 1,
                        'prescribe_laboratory_id' => isset($laboratoryId[$i]) ? $laboratoryId[$i] : 1,
                        'status_id' => $statusId,
                        'invoice_number' => $invoiceNumber,
                        'remarks' => $remarks,
                        'qty' => $qty,
                        'isActive' => $isActive,
                    ];

                    $prescriptionData[] = $prescription;
                }

                foreach ($prescriptionData as $prescription) {
                    $this->prescriptionContract->storePrescription($prescription);
                }

                $this->patientCheckupContract->updateFollowUpCheckupDate($request->patient_checkup_id, $request->follow_up_date);

                DB::commit();

                $notification = [
                    'alert-type' => 'success',
                    'message' => 'Data saved successfully!',
                ];

                $redirectRoute = $this->getRedirectRoute();
                // return redirect()->route($redirectRoute)->with($notification);

                return redirect()->route('admin.print.patient.prescription', $patientCheckupId)->with($notification);

            } else {

                $notification = [
                    'alert-type' => 'danger',
                    'message' => 'Follow-up Date is required.',
                ];
                return redirect()->back()->with($notification);
            }

        } catch (\Exception $e) {

            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            $redirectRoute = $this->getRedirectRoute();
            return redirect()->route($redirectRoute)->with($notification);
        }
    }

    // PRINT PDF FUNCTIONALITY
    public function printPatientPrescription($id)
    {
        $prescriptions = $this->prescriptionContract->getPrescriptionByPatientCheckupId($id);
        return view('admin.patient-checkups.prescription-certificate', [
            'prescriptions' => $prescriptions,
        ]);
    }
}
