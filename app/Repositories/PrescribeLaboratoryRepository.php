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
        return $this->model
        ->create($params);
    }

    public function getPrescribeLaboratory($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getPrescribeLaboratoryByLaboratoryId($id)
    {
        return $this->model->where('laboratory_id', $id)->get();
    }

    public function checkLaboratoryById($id)
    {
        return $this->model->where('laboratory_id', $id)->first();
    }
}
