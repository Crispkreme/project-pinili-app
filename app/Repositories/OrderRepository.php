<?php

namespace App\Repositories;

use DB;
use App\Models\Order;
use App\Contracts\OrderContract;

class OrderRepository implements OrderContract {

    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getAllOrder()
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->orderBy('id', 'desc')
        ->get();
    }

    public function getAllStockReport()
    {
        return $this->model
        ->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('status_id', 8)
        ->get();
    }

    public function getSpecificProduct($id)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('supplier_id', $id)
        ->where('status_id', 2)
        ->where('order_status_id', 1)
        ->get();
    }

    public function printOrderInvoice($id)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('status_id', $id)
        ->get();
    }

    public function storeOrder($params) {
        return $this->model->create($params);
    }

    public function pendingOrder($id)
    {
        $relationships = ['user', 'supplier', 'manufacturer', 'product', 'status'];
        $pendingOrders = $this->model
            ->with($relationships)
            ->where('status_id', $id)
            ->get();
        return $pendingOrders;
    }

    public function deleteOrder($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'status_id' => 3,
        ]);
        $order->delete($order->id);
        return $order;
    }

    public function approveOrder($id)
    {
        $order = $this->model->findOrFail($id);
        $order->update([
            'status_id' => 8,
        ]);
        return $order;
    }

    public function printOrderInvoiceById($id)
    {
        $relationships = ['user', 'supplier', 'manufacturer', 'product', 'status'];
        $purchaseOrders = $this->model
            ->with($relationships)
            ->findOrFail($id);
        return $purchaseOrders;
    }

    public function getAllDailyOrderReport($params)
    {
        $relationships = ['user', 'supplier', 'manufacturer', 'product', 'status'];
        $startDate = $params[0];
        $endDate = $params[1];
        
        return $this->model
        ->whereRaw('DATE(created_at) >= ? AND DATE(created_at) <= ?', [$startDate, $endDate])
        ->where('status_id', 2)
        ->get();
    }

    public function getAllDeletedOrder()
    {
        $deletedOrders = $this->model->onlyTrashed()->get();
        return $deletedOrders;
    }

    public function getRestoreDeletedOrder($id)
    {
        $order = $this->model->withTrashed()->findOrFail($id);

        if ($order->trashed()) {
            $order->restore();
        }

        $order->update([
            'status_id' => 1,
            'created_at' => now(),
        ]);

        return $order;
    }

    public function getAllOrderHistoryByCompany($id)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'approve',
            'order_status',
            'status',
            'product' => function ($query) {
                $query->with([
                    'category',
                    'form',
                ]);
            }
        ])
        ->where('manufacturer_id', $id)
        ->get();
    }

    public function getAllSpecificOrderHistoryByUser($id)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'approve',
            'order_status',
            'status',
            'product' => function ($query) {
                $query->with([
                    'category',
                    'form',
                ]);
            }
        ])
        ->where('manufacturer_id', $id)
        ->first();
    }

    public function updateOrderStatusByInventorySheet($or_number)
    {
        $orderStatus = $this->model->where('or_number', $or_number)->get();

        $orderStatus->each(function ($order) {
            $order->update([
                'approve_id' => auth()->user()->id,
                'order_status_id' => 7,
            ]);
        });

        return $orderStatus;
    }

    public function getOrderTransaction($id)
    {
        $order = $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('product_id', $id)
        ->where('status_id', 2)
        ->where('order_status_id', 1)
        ->first();
        $order->invoice_number;
        return $order;
    }

    public function getOrderIdByInvoiceNumber($params)
    {
        $order = $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('or_number', $params)
        ->first();
        return $order;
    }

    public function updateOrDeliveryNumberOrder($id, $params)
    {
        $orderData = $this->model->findOrFail($id);
        $orderData->update($params);
        return $orderData;
    }

    public function getOrderData($params)
    {
        return $this->model->where('or_number', $params)->get();
    }

    public function editOrderData($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getOrderDataByInvoiceNumber($params)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('invoice_number', $params)
        ->get();
    }

    public function getOrderInvoiceNumber($params)
    {
        return $this->model->with([
            'user',
            'supplier',
            'manufacturer',
            'product',
            'status'
        ])
        ->where('invoice_number', $params)
        ->get();
    }
}
