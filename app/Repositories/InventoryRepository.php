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
        ->where('inventories.isActive', 1)
        ->where('inventories.product_id', $id)
        ->get([
            'products.id',
            'products.medicine_name',
            'products.generic_name',
            'products.description',
            'inventories.srp',
            'inventories.product_id',
        ])
        ->toArray();
    }

    // public function getSpecificInventoryByProductID($id)
    // {
    //     return $this->model
    //     ->join('products', 'inventories.product_id', '=', 'products.id')
    //     ->where('inventories.isActive', 1)
    //     ->where('inventories.product_id', $id)
    //     ->first([
    //         'products.id',
    //         'products.medicine_name',
    //         'products.generic_name',
    //         'products.description',
    //         'inventories.srp',
    //         'inventories.product_id',
    //     ])
    //     ->toArray();
    // }

    public function getProductDataByInventory()
    {
        return $this->model
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->where('inventories.isActive', 1)
            ->pluck('products.medicine_name', 'inventories.product_id');
    }

    public function getInventory($id)
    {
        return $this->model
        ->where('product_id', $id)
        ->get();
    }
}
