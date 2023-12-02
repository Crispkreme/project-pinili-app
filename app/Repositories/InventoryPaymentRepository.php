<?php

namespace App\Repositories;

use App\Models\InventoryPayment;
use Illuminate\Support\Facades\Auth;
use App\Contracts\InventoryPaymentContract;

class InventoryPaymentRepository implements InventoryPaymentContract {

    protected $model;

    public function __construct(InventoryPayment $model)
    {
        $this->model = $model;
    }

    public function storeInventoryPayment($params)
    {
        return $this->model->create($params);
    }

    public function getInventoryPaymentDataByOrNumber($id)
    {
        return $this->model
        ->where('inventory_sheet_id', $id)
        ->get();
    }
}
