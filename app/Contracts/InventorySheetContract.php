<?php

namespace App\Contracts;

interface InventorySheetContract {
    public function getAllInventorySheet();
    public function storeInventorySheet($params);
    public function editInventorySheet($id);
}
