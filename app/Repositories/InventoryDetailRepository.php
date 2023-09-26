<?php

namespace App\Repositories;

use App\Models\InventoryDetail;
use App\Contracts\InventoryDetailContract;

class InventoryDetailRepository implements InventoryDetailContract {

    protected $model;

    public function __construct(InventoryDetail $model)
    {
        $this->model = $model;
    }

    public function storeInventoryDetail($params)
    {
        return $this->model->create($params);
    }

    public function getAllInventoryDetail()
    {
        return $this->model->with([
            'inventory_sheet',
            'inventory_status',
            'product',
        ])
        ->get();
    }
}
