<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Contracts\PatientContract;

class PatientRepository implements PatientContract {

    protected $model;

    public function __construct(Patient $model)
    {
        $this->model = $model;
    }

    public function allPatient()
    {
        return $this->model->get();
    }

    public function storePatient($params)
    {
        return $this->model->create($params);
    }

    public function getPatientById($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
