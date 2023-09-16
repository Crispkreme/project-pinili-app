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

    public function pendingOrder($id)
    {
        $relationships = ['user', 'supplier', 'manufacturer', 'product', 'status'];
        $pendingOrders = $this->model
            ->with($relationships)
            ->where('status_id', $id)
            ->get();
        return $pendingOrders;
    }

    public function deleteOrder($id)
    {
        $order = $this->model->findOrFail($id);
        $order->delete($order->id);
        return $order;
    }

    public function approveOrder($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'status_id' => 2,
        ]);
        return $order;
    }
}
