<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\InventoryContract;
use App\Contracts\ProductContract;
use App\Contracts\RepresentativeContract;
use App\Http\Requests\ProductWiseReportRequest;
use App\Http\Requests\SupplierWiseReportRequest;

class InventoryController extends Controller
{
    protected $inventoryContract;
    protected $representativeContract;
    protected $productContract;

    public function __construct(
        InventoryContract $inventoryContract,
        RepresentativeContract $representativeContract,
        ProductContract $productContract,
    ) {
        $this->inventoryContract = $inventoryContract;
        $this->representativeContract = $representativeContract;
        $this->productContract = $productContract;
    }

    public function getProductWiseReport(ProductWiseReportRequest $request)
    {
        $productId = $request->input('product_id');

        $suppliers = $this->representativeContract->getRepresentativeData();
        $products = $this->productContract->getProductData();
        $userData = $this->inventoryContract->getProductWiseReport($productId);

        return view('admin.stocks.product-wise-report', [
            'userData' => $userData,
            'suppliers' => $suppliers,
            'products' => $products,
        ]);
    }

    public function getSupplierWiseReport(SupplierWiseReportRequest $request)
    {
        $supplierId = $request->input('supplier_id');

        $userData = $this->inventoryContract->getSupplierWiseReport($supplierId);
        $suppliers = $this->representativeContract->getRepresentativeData();
        $products = $this->productContract->getProductData();

        return view('admin.stocks.supplier-wise-report', [
            'userData' => $userData,
            'suppliers' => $suppliers,
            'products' => $products,
        ]);
    }
}
