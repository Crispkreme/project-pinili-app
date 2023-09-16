<?php

namespace App\Repositories;

use App\Models\Inventory;
use App\Contracts\InventoryContract;

class InventoryRepository implements InventoryContract {

    protected $model;

    public function __construct(Inventory $model)
    {
        $this->model = $model;
    }

    public function storeInventory($params)
    {
        return $this->model->create($params);
    }
}
