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

    public function getProductWiseReport($id)
    {
        return $this->model
        ->where('product_id', $id)
        ->orderBy('product_id', 'asc')
        ->get();
    }

    public function getSupplierWiseReport($id)
    {
        return $this->model
        ->where('supplier_id', $id)
        ->orderBy('supplier_id', 'asc')
        ->get();
    }

    public function getAllInventory() 
    {
        return $this->model
        ->with(['user','product','supplier'])
        ->get();
    }

    public function getSpecificInventoryByProductID($id)
    {
        return $this->model
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->with(['user', 'supplier'])
            ->where('products.isActive', 0)
            ->where('inventories.product_id', $id)
            ->select([
                'products.medicine_name',
                'products.generic_name',
                'products.description',
                'inventories.srp',
            ])
            ->get()
            ->toArray();
    }

    public function getProductDataByInventory()
    {
        // $data = $this->model
        //     ->where('products.isActive', 0)
        //     ->select([
        //             'products.medicine_name',
        //             'products.generic_name',
        //             'products.description',
        //             'inventories.srp',
        //         ])
        //     ->get()
        //     ->toArray();

        return $this->model->get();
    }
}
