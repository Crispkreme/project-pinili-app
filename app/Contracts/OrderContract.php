<?php

namespace App\Contracts;

interface OrderContract {

    public function getAllOrder();
    public function storeOrder($params);
    public function pendingOrder($id);
}
