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
}
