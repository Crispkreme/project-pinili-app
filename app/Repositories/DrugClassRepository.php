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

    public function getAllDrugClass($perPage = 10)
    {
        return $this->model
        ->where('id', '!=', 1)
        ->orderBy('id','desc')
        ->paginate($perPage);
    }

    public function getSpecificDrugClassById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function editDrugClass($id)
    {
        return $this->model->with(['classification'])->find($id);
    }

    public function updateDrugClass($id, $params)
    {
        $company = $this->model->findOrFail($id);
        $company->update($params);
        return $company;
    }
}
