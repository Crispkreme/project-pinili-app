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
        ->paginate($perPage);;
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
}
