<?php

namespace App\Contracts;

interface OrderContract {

    public function getAllOrder();
    public function printOrderInvoice($id);
    public function storeOrder($params);
    public function pendingOrder($id);
    public function deleteOrder($id);
    public function approveOrder($id);
    public function updateOrDeliveryNumberOrder($id, $params);
    public function printOrderInvoiceById($id);
    public function getAllDailyOrderReport($params);
    public function getAllDeletedOrder();
    public function getRestoreDeletedOrder($id);
    public function getAllStockReport();
    public function getAllOrderHistoryByCompany($id);
    public function getSpecificProduct($id);
    public function updateOrderStatusByInventorySheet($or_number);
    public function getOrderTransaction($id);
    public function getOrderIdByInvoiceNumber($params);
    public function getAllSpecificOrderHistoryByUser($id);
}
