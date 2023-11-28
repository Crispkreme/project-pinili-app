<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PatientCheckupContract;
use App\Contracts\LaboratoryContract;
use App\Contracts\InventoryContract;
use App\Contracts\ProductContract;
use App\Contracts\PatientBmiContract;
use App\Contracts\PrescriptionContract;
use App\Contracts\PatientContract;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatientBmiRequest;
use App\Http\Requests\StorePatientRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.patient-checkups.create', [
            'patientCheckupData' => $patientCheckupData,
            'products' => $products,
            'laboratories' => $laboratories,
        ]);
    }

    public function createPatientFollowupCheckup($id)
    {
        $checkupData = $this->patientCheckupContract->getPatientCheckupById($id);
        $bmiData = $this->patientBmiContract->getPatientBMIByCheckupId($checkupData->id);
        $patientData = $this->patientContract->getPatientDataByBmiId($bmiData->patient_id);

        return view('admin.follow-up-checkups.create', [
            'patientData' => $patientData,
            'bmiData' => $bmiData,
        ]);
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
}
