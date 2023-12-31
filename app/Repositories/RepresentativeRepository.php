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
        return $this->model
            ->orderBy('id','desc')
            ->get();
    }

    public function getRepresentativeData()
    {
        return $this->model->pluck('name', 'id')->toArray();
    }

    public function editRepresentative($id)
    {
        return $this->model->with('role')->find($id);
    }

    public function updateRepresentative($id, $params)
    {
        return $this->model->update($params);
    }

    public function updateEntityActiveStatus($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'isActive' => 1,
        ]);
        return $order;
    }

    public function updateEntityNotActiveStatus($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'isActive' => 0,
        ]);
        return $order;
    }
}
