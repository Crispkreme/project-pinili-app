<?php

namespace App\Repositories;

use App\Models\PatientCheckup;
use Illuminate\Support\Facades\DB;
use App\Contracts\PatientCheckupContract;

class PatientCheckupRepository implements PatientCheckupContract {

    protected $model;

    public function __construct(PatientCheckup $model)
    {
        $this->model = $model;
    }

    public function getPatientCheckup()
    {
        return $this->model->get();
    }

    public function allPatientCheckup()
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('status_id', 1)
        ->get();
    }

    public function storePatientCheckup($params)
    {
        return $this->model->create($params);
    }

    public function getPatientCheckupById($id)
    {

        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('patient_bmi_id', $id)
        ->first();
    }

    public function getPatientCheckupByPatientId($id)
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->whereHas('patientBmi.patient', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->first();
    }

    public function getPatientCheckupByBmiId($id)
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi', 'statuses'])
        ->whereHas('patientBmi', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->first();
    }

    public function updateFollowUpCheckupDate($id, $params)
    {
        $followup = $params;
        $patientCheckup = $this->model->findOrFail($id);
        $patientCheckup->update([
            'follow_up_date' => $followup,
            'remarks' => "for follow up",
        ]);

        return $patientCheckup;
    }

    public function getPatientCheckupDataById($id)
    {
        return $this->model
            ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
            ->whereHas('patientBmi', function ($query) use ($id) {
                $query->where('patient_id', $id);
            })
            ->orderBy('id','desc')
            ->get();
    }

    public function getPatientCheckupIdById($id)
    {
        return $this->model
            ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
            ->whereHas('patientBmi', function ($query) use ($id) {
                $query->where('patient_id', $id);
            })
            ->first();
    }

    public function updatePatientCheckupStatus($id)
    {
        $bmiData = $this->model->where('patient_bmi_id', $id)->first();
        $patientCheckup = $this->model->findOrFail($bmiData->id);
        $patientCheckup->update([
            'status_id' => 2,
            'remarks' => "done checkup",
            'isNew' => 0,
            'isFollowUp' => 1,
        ]);

        return $patientCheckup;
    }

    public function getNewPatientData()
    {
        return $this->model
        ->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(id) as totalPatientIsNew'),
        )
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('isNew', 1)
        ->groupBy('date')
        ->get();
    }

    public function getMonthlyNewPatientData()
    {
        return $this->model
        ->select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(id) as totalPatientIsNewMonthly')
        )
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('isNew', 1)
        ->groupBy('month')
        ->get();
    }

    public function getFollowupPatientData()
    {
        return $this->model
        ->select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(id) as totalPatientFollowup'),
        )
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('isFollowUp', 1)
        ->groupBy('date')
        ->get();
    }

    public function getMonthlyFollowupPatientData()
    {
        return $this->model
        ->select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(id) as totalPatientFollowupMonthly')
        )
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('isFollowUp', 1)
        ->groupBy('month')
        ->get();
    }

    public function updatePatientCheckup($id, $params)
    {
        $patientCheckup = $this->model->findOrFail($id);
        $patientCheckup->update([
            'check_up_date' => $params['check_up_date'],
        ]);

        return $patientCheckup;
    }
}
