<?php

namespace App\Contracts;

interface OrderContract {

    public function getAllOrder();
    public function printOrderInvoice($id);
    public function storeOrder($params);
    public function pendingOrder($id);
    public function deleteOrder($id);
    public function approveOrder($id);
    public function printOrderInvoiceById($id);
}
