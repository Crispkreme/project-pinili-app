<?php

namespace App\Repositories;

use App\Models\Entity;
use Illuminate\Support\Facades\Auth;
use App\Contracts\RepresentativeContract;

class RepresentativeRepository implements RepresentativeContract {

    protected $model;

    public function __construct(Entity $model)
    {
        $this->model = $model;
    }

    public function storeRepresentative($params)
    {
        return $this->model->create($params);
    }

    public function getAllRepresentative()
    {
        return $this->model->get();
    }

    public function editRepresentative($id)
    {
        return $this->model->with('role')->find($id);
    }

    public function updateRepresentative($id, $params)
    {
        return $this->model->update($params);
    }
}
