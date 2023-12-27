<?php

namespace App\Repositories;

use App\Models\Laboratory;
use App\Contracts\LaboratoryContract;

class LaboratoryRepository implements LaboratoryContract {

    protected $model;

    public function __construct(Laboratory $model)
    {
        $this->model = $model;
    }

    public function getLaboratoryData()
    {
        return $this->model->pluck('laboratory', 'id')->toArray();
    }

    public function getSpecificLaboratoryByID($id)
    {
        return $this->model
            ->where('id', $id)
            ->get(['laboratory','description','price','id'])
            ->toArray();
    }

    public function getSpecificLaboratory($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getLaboratory()
    {
        return $this->model->get();
    }
}
