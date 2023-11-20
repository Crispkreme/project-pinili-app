<?php

namespace App\Repositories;

use App\Models\Prescription;
use App\Contracts\PrescriptionContract;

class PrescriptionRepository implements PrescriptionContract {

    protected $model;

    public function __construct(Prescription $model)
    {
        $this->model = $model;
    }

    public function storePrescription($params)
    {
        return $this->model->create($params);
    }
}
