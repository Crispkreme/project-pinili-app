<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Contracts\PatientBmiContract;
use Illuminate\Support\Facades\Storage;
use App\Contracts\PatientCheckupContract;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\StorePatientBmiRequest;
use App\Contracts\PatientCheckupImageContract;

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

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.patients.index', ['patientData' => $patientData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.patients.index', ['patientData' => $patientData]);
            } elseif (Auth::user()->role_id == 3) {
                return view('clerk.patients.index', ['patientData' => $patientData]);
            } else {
                return view('404');
            }
        }
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
                'patient_bmi_id' => $patientBmiID,
                'status_id' => 1,
                'remarks' => "for checkup",
                'isNew' => 1,
                'isFollowUp' => 0,
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

    public function editPatient($id)
    {
        $patientCheckups = $this->patientCheckupContract->getPatientCheckupByPatientId($id);

        if ($patientCheckups->isNotEmpty()) {

            $firstPatientCheckup = $patientCheckups->first();
            $patientBmiID = $firstPatientCheckup->patient_bmi_id;

            $patientBmi = $this->patientBmiContract->getPatientBmiByPatientId($patientBmiID);
            $patientID = $patientBmi->patient_id;

            $patientCheckupImage = $this->patientCheckupImageContract->getPatientCheckupImageById($id);
            dd($patientCheckupImage);
            $patient = $this->patientContract->getPatientById($patientID);

            return view('clerk.patients.edit', [
                'patient' => $patient,
                'patientBmi' => $patientBmi,
            ]);
        }

        $patientData = $this->patientContract->allPatient();

        if (Auth::check()) {
            switch (Auth::user()->role_id) {
                case 1:
                    return view('admin.patients.index', ['patientData' => $patientData]);
                case 2:
                    return view('manager.patients.index', ['patientData' => $patientData]);
                case 3:
                    return view('clerk.patients.index', ['patientData' => $patientData]);
                default:
                    return view('404');
            }
        }
    }
}
