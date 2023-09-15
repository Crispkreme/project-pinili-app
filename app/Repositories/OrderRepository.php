<?php

namespace App\Repositories;

use App\Models\Order;
use App\Contracts\OrderContract;

class OrderRepository implements OrderContract {

    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getAllOrder()
    {
        return $this->model->with(['user','supplier','manufacturer','product','status'])->get();
    }

    public function storeOrder($params) {
        return $this->model->create($params);
    }

    public function pendingOrder($statusId)
    {
        // return $this->model->with(['user','supplier','manufacturer','product','status'])->where('status_id', $id)->get();

        $relationships = ['user', 'supplier', 'manufacturer', 'product', 'status'];
        $pendingOrders = $this->model
            ->with($relationships)
            ->where('status_id', $statusId)
            ->get();
        return $pendingOrders;
    }
}
