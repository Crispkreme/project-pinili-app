<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PatientCheckupContract;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatientBmiRequest;
use App\Http\Requests\StorePatientRequest;
use Carbon\Carbon;

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
        return view('clerk.patient-checkups.index', ['patientCheckupData' => $patientCheckupData]);
    }
}
