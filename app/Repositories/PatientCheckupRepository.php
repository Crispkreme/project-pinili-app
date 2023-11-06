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

    public function allPatientCheckup()
    {
        return $this->model->with(['patientBmi', 'patientBmi.patient', 'statuses'])->get();
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
        ->get();
    }
}
