<?php

namespace App\Repositories;

use App\Models\PrescribeMedicine;
use App\Contracts\PrescribeMedicineContract;

class PrescribeMedicineRepository implements PrescribeMedicineContract {

    protected $model;

    public function __construct(PrescribeMedicine $model)
    {
        $this->model = $model;
    }

    public function storePrescribeMedicine($params)
    {
        return $this->model
        ->create($params);
    }
}
