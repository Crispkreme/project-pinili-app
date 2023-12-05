<?php

namespace App\Repositories;

use App\Models\PurchaseItem;
use App\Contracts\PurchaseItemContract;

class PurchaseItemRepository implements PurchaseItemContract {

    protected $model;

    public function __construct(PurchaseItem $model)
    {
        $this->model = $model;
    }

    public function storePurchaseItem($params)
    {
        return $this->model->create($params);
    }

    public function getPurchaseItemList($params)
    {
        return $this->model
        ->where('petty_cash_id', $params)
        ->get();
    }

    public function updatePurchaseItem($params, $id)
    {
        $purchaseItemData = $this->model->findOrFail($id);
        $purchaseItemData->update($params);
        return $purchaseItemData;
    }
}