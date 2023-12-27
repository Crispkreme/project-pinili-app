<?php

namespace App\Contracts;

interface InventoryContract {

    public function storeInventory($params);
    public function getProductWiseReport($id);
    public function getSupplierWiseReport($id);
    public function getAllInventory();
    public function getSpecificInventoryByProductID($id);
    public function getProductDataByInventory();
    public function getInventory($id);
}
