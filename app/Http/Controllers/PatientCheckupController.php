<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use App\Contracts\ProductContract;
use Illuminate\Support\Facades\DB;
use App\Contracts\InventoryContract;
use Illuminate\Support\Facades\Auth;
use App\Contracts\LaboratoryContract;
use App\Contracts\PatientBmiContract;
use App\Contracts\PrescriptionContract;
use Illuminate\Support\Facades\Storage;
use App\Contracts\PatientCheckupContract;

class PatientCheckupController extends Controller
{
    protected $productContract;
    protected $patientCheckupContract;
    protected $laboratoryContract;
    protected $inventoryContract;
    protected $patientBmiContract;
    protected $patientContract;
    protected $prescriptionContract;

    public function __construct(
        PatientContract $patientContract,
        PatientBmiContract $patientBmiContract,
        PatientCheckupContract $patientCheckupContract,
        ProductContract $productContract,
        LaboratoryContract $laboratoryContract,
        InventoryContract $inventoryContract,
        PrescriptionContract $prescriptionContract,
    ) {
        $this->patientContract = $patientContract;
        $this->patientCheckupContract = $patientCheckupContract;
        $this->productContract = $productContract;
        $this->laboratoryContract = $laboratoryContract;
        $this->inventoryContract = $inventoryContract;
        $this->patientBmiContract = $patientBmiContract;
        $this->prescriptionContract = $prescriptionContract;
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

    public function patientHistory($id)
    {
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
}
