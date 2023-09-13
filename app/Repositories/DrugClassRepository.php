<?php

namespace App\Repositories;

use App\Models\DrugClass;
use Illuminate\Support\Facades\Auth;
use App\Contracts\DrugClassContract;

class DrugClassRepository implements DrugClassContract {

    protected $model;

    public function __construct(DrugClass $model)
    {
        $this->model = $model;
    }

    public function storeDrugClass($params)
    {
        return $this->model->create($params);
    }

    public function getAllDrugClass()
    {
        return $this->model->get();
    }

    public function getDrugClassData()
    {
        return $this->model->pluck('company_name', 'id')->toArray();
    }

    public function editDrugClass($id)
    {
        return $this->model->find($id);
    }

    public function updateDrugClass($id, $params)
    {
        $company = $this->model->findOrFail($id);
        $company->update($params);
        return $company;
    }
}
