<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PatientCheckupContract;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatientBmiRequest;
use App\Http\Requests\StorePatientRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PatientCheckupController extends Controller
{
    public function __construct(
        PatientCheckupContract $patientCheckupContract,
    ) {
        $this->patientCheckupContract = $patientCheckupContract;
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

        return view('admin.patient-checkups.create', [
            'patientCheckupData' => $patientCheckupData
        ]);
    }
}
