<?php

namespace App\Repositories;

use App\Models\InventorySheet;
use Illuminate\Support\Facades\Auth;
use App\Contracts\InventorySheetContract;

class InventorySheetRepository implements InventorySheetContract {

    protected $model;

    public function __construct(InventorySheet $model)
    {
        $this->model = $model;
    }

    public function getAllInventorySheet()
    {
        return $this->model->orderBy('created_at','desc')
        ->orderBy('id', 'desc')
        ->get();
    }

    public function storeInventorySheet($params)
    {
        return $this->model->create($params);
    }
}
