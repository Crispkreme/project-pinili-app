<?php

namespace App\Http\Controllers\Clerk;

use Exception;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use App\Http\Controllers\Controller;
use App\Contracts\PatientCheckupContract;

class ClerkController extends Controller
{
    protected $patientContract;
    protected $patientCheckupContract;

    public function __construct(
        PatientContract $patientContract,
        PatientCheckupContract $patientCheckupContract
    ){
        $this->patientContract = $patientContract;
        $this->patientCheckupContract = $patientCheckupContract;
    }

    public function index()
    {
        try {

            $totalPatient = $this->patientContract->getTotalPatient();

            $totalPatientByMonth = $this->patientContract->getTotalPatientPerMonth();
            $countPatients = $totalPatientByMonth->totalPatients;

            $patientCheckups = $this->patientCheckupContract->getPatientCheckup();

            $isNew = $this->patientCheckupContract->getNewPatientData();

            $isNewMonthly = $this->patientCheckupContract->getMonthlyNewPatientData();

            $isFollowUp = $this->patientCheckupContract->getFollowupPatientData();

            $isFollowUpMonthly = $this->patientCheckupContract->getMonthlyFollowupPatientData();

            return view('clerk.dashboard', [
                'totalPatient' => $totalPatient,
                'countPatients' => $countPatients,
                'patientCheckups' => $patientCheckups,
                'isNew' => $isNew,
                'isFollowUp' => $isFollowUp,
                'isNewMonthly' => $isNewMonthly,
                'isFollowUpMonthly' => $isFollowUpMonthly,
            ]);

        } catch (Exception $e) {
            dd($e);
        }

    }
}