<?php

namespace App\Repositories;

use App\Models\PatientBilling;
use Illuminate\Support\Facades\Auth;
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
}
