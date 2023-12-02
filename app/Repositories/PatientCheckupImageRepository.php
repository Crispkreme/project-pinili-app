<?php

namespace App\Repositories;

use App\Models\PatientCheckupImage;
use App\Contracts\PatientCheckupImageContract;

class PatientCheckupImageRepository implements PatientCheckupImageContract {

    protected $model;

    public function __construct(PatientCheckupImage $model)
    {
        $this->model = $model;
    }

    public function allPatientCheckupImage()
    {
        return $this->model
        ->get();
    }

    public function storePatientCheckupImage($params)
    {
        return $this->model
        ->create($params);
    }

    public function getPatientCheckupImageById($id)
    {
        return $this->model
        ->where('patient_checkup_id', $id)
        ->get();
    }
}
