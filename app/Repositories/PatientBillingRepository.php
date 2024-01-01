<?php

namespace App\Repositories;

use App\Models\PatientBilling;
use App\Contracts\PatientBillingContract;

class PatientBillingRepository implements PatientBillingContract {

    protected $model;

    public function __construct(PatientBilling $model)
    {
        $this->model = $model;
    }

    public function storePatientBilling($params)
    {
        return $this->model->create($params);
    }

    public function getPatientBillingByCheckupId($id)
    {
        return $this->model->where('patient_checkup_id', $id)->get();
    }
}
