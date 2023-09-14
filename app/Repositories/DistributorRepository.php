<?php

namespace App\Repositories;

use App\Models\Distributor;
use Illuminate\Support\Facades\Auth;
use App\Contracts\DistributorContract;

class DistributorRepository implements DistributorContract {

    protected $model;

    public function __construct(Distributor $model)
    {
        $this->model = $model;
    }

    public function storeDistributor($params)
    {
        return $this->model->create($params);
    }

    public function getAllDistributor()
    {
        return $this->model->with(['entity', 'company'])->get();
    }

    public function editDistributor($id)
    {
        return $this->model->with(['entity', 'company'])->find($id);
    }

    public function updateDistributor($id, $params)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update($params);
        return $distributor;
    }

    public function getAllDistributorData() {
        return $this->model->pluck('company_name', 'id')->toArray();
    }
}
