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
        return $this->model->get();
    }

    public function editDistributor($id)
    {
        return $this->model->find($id);
    }

    public function updateDistributor($id, $params)
    {
        $distributor = Distributor::findOrFail($id);
        $distributor->update($params);
        return $distributor;
    }
}
