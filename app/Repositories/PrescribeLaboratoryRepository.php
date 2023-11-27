<?php

namespace App\Repositories;

use App\Models\PrescribeLaboratory;
use App\Contracts\PrescribeLaboratoryContract;

class PrescribeLaboratoryRepository implements PrescribeLaboratoryContract {

    protected $model;

    public function __construct(PrescribeLaboratory $model)
    {
        $this->model = $model;
    }

    public function storePrescribeLaboratory($params)
    {
        return $this->model->create($params);
    }
}