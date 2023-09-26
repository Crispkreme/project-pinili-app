<?php

namespace App\Contracts;

interface InventoryDetailContract {

    public function storeInventoryDetail($params);
    public function getAllInventoryDetail();
}
