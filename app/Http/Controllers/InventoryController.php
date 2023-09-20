<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\InventoryContract;
use App\Http\Requests\ProductWiseReportRequest;
use App\Http\Requests\SupplierWiseReportRequest;

class InventoryController extends Controller
{
    protected $inventoryContract;

    public function __construct(
        InventoryContract $inventoryContract,
    ) {
        $this->inventoryContract = $inventoryContract;
    }

    public function getProductWiseReport(ProductWiseReportRequest $request)
    {
        $productId = $request->input('product_id');
        $userData = $this->inventoryContract->getProductWiseReport($productId);
        dd($this->inventoryContract->getProductWiseReport($productId));
        return view('admin.stocks.supplier-product-wise-report', ['userData' => $userData]);
    }

    public function getSupplierWiseReport(SupplierWiseReportRequest $request)
    {
        $supplierId = $request->input('supplier_id');
        $userData = $this->inventoryContract->getSupplierWiseReport($supplierId);
        dd($userData);
        return view('admin.stocks.supplier-product-wise-report', ['userData' => $userData]);
    }
}
