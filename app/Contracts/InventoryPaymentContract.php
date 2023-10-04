<?php

namespace App\Contracts;

interface InventoryPaymentContract {

    public function storeInventoryPayment($params);
    public function getInventoryPaymentDataByOrNumber($id);
}
