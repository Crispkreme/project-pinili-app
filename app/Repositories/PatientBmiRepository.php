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
        return $this->model->get();
    }

    public function storePatientBmi($params)
    {
        return $this->model->create($params);
    }
}
