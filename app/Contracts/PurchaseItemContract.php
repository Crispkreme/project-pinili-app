<?php

namespace App\Contracts;

interface PurchaseItemContract {

    public function storePurchaseItem($params);
    public function getPurchaseItemList($id);
    public function updatePurchaseItem($params, $id);
}