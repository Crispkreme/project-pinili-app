<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use App\Contracts\PatientBmiContract;
use App\Contracts\PatientCheckupContract;
use App\Contracts\PatientCheckupImageContract;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatientBmiRequest;
use App\Http\Requests\StorePatientRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function __construct(
        PatientContract $patientContract,
        PatientBmiContract $patientBmiContract,
        PatientCheckupContract $patientCheckupContract,
        PatientCheckupImageContract $patientCheckupImageContract
    ) {
        $this->patientContract = $patientContract;
        $this->patientBmiContract = $patientBmiContract;
        $this->patientCheckupContract = $patientCheckupContract;
        $this->patientCheckupImageContract = $patientCheckupImageContract;
    }

    public function getPatient()
    {
        $patientData = $this->patientContract->allPatient();
        return view('clerk.patients.index', ['patientData' => $patientData]);
    }

    public function addPatient()
    {
        return view('clerk.patients.create');
    }

    public function storePatient(Request $request) {

        DB::beginTransaction();

        try {
            $prefix = "PNT";
            $transactionNumber = Carbon::now()->format('mHis');
            $id_number = $prefix.'-'.$transactionNumber;

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
                'patient_id' => $patientID,
                'patient_bmi_id' => $patientBmiID,
                'status' => 1, 
                'remarks' => "for checkup",
                'isNew' => 1,
                'isFollowUp' => 0,
            ];

            $patientCheckup = $this->patientCheckupContract->storePatientCheckup($patientCheckupParams);

            $imagePaths = [];
            $patientCheckupImageData = [];

            if ($request->hasFile('checkup_image')) {
                $images = $request->file('checkup_image');
                $imageCount = count($images); // Get the number of uploaded images

                foreach ($images as $image) {
                    $imageName = Str::random(10) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $imageName);
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

            return redirect()->route('clerk.all.patient')->with($notification);

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
