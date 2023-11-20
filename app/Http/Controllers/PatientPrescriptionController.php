<?php

namespace App\Http\Controllers;

use App\Contracts\PatientContract;
use Illuminate\Http\Request;

class PatientPrescriptionController extends Controller
{
    protected $patientContract;

    public function __construct(
        PatientContract $patientContract
    ){
        $this->patientContract = $patientContract;
    }

    public function getPatientPrescription()
    {
        $patientData = $this->patientContract->allPatient();

        return view('admin.prescriptions.index', [
            'patientData' => $patientData,
        ]);
    }
}
