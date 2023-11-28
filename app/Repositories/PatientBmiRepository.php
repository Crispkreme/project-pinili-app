<?php

namespace App\Repositories;

use App\Models\PatientBmi;
use App\Contracts\PatientBmiContract;

class PatientBmiRepository implements PatientBmiContract {

    protected $model;

    public function __construct(PatientBmi $model)
    {
        $this->model = $model;
    }

    public function allPatientBmi()
    {
        return $this->model->with(["patient"])->get();
    }

    public function storePatientBmi($params)
    {
        return $this->model->create($params);
    }

    public function getPatientBmiByPatientId($id)
    {
        return $this->model
        ->with(['patient'])
        ->whereHas('patient', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->first();
    }

    public function updatePatientBmi($id, $params)
    {
        $patientBmi = $this->model->findOrFail($id);
        $patientBmi->update($params);
        return $patientBmi;
    }

    public function getPatientBMIByCheckupId($id)
    {
        $patientBmi = $this->model->findOrFail($id);
        return $patientBmi;
    }
}
