<?php

namespace App\Repositories;

use App\Models\InventoryPaymentDetail;
use App\Contracts\InventoryPaymentDetailContract;

class InventoryPaymentDetailRepository implements InventoryPaymentDetailContract {

    protected $model;

    public function __construct(InventoryPaymentDetail $model)
    {
        $this->model = $model;
    }

    public function storeInventoryPaymentDetail($params)
    {
        return $this->model->create($params);
    }
}
