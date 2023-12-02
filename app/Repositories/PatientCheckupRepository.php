<?php

namespace App\Repositories;

use App\Models\PatientCheckup;
use App\Contracts\PatientCheckupContract;

class PatientCheckupRepository implements PatientCheckupContract {

    protected $model;

    public function __construct(PatientCheckup $model)
    {
        $this->model = $model;
    }

    public function allPatientCheckup($perPage = 10)
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('status_id', 1)
        ->paginate($perPage);
    }

    public function storePatientCheckup($params)
    {
        return $this->model->create($params);
    }

    public function getPatientCheckupById($id)
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->where('id', $id)
        ->first();
    }

    public function getPatientCheckupByPatientId($id)
    {
        return $this->model
        ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        ->whereHas('patientBmi.patient', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->get();
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

    public function getPatientCheckupDataById($id, $perPage = 10)
    {
        return $this->model
            ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
            ->whereHas('patientBmi', function ($query) use ($id) {
                $query->where('patient_id', $id);
            })
            ->orderBy('id','desc')
            ->paginate($perPage);
    }

    public function updatePatientCheckupStatus($id)
    {
        $patientCheckup = $this->model->findOrFail($id);
        $patientCheckup->update([
            'status_id' => 2,
            'remarks' => "done checkup",
        ]);

        return $patientCheckup;
    }
}
