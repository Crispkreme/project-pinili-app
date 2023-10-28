<?php

namespace App\Http\Controllers;

use App\Contracts\InventoryContract;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Contracts\RepresentativeContract;
use App\Http\Requests\ProductWiseReportRequest;
use App\Http\Requests\SupplierWiseReportRequest;

class StockController extends Controller
{
    protected $orderContract;
    protected $representativeContract;
    protected $productContract;
    protected $inventoryContract;

    public function __construct(
        InventoryContract $inventoryContract,
        OrderContract $orderContract,
        RepresentativeContract $representativeContract,
        ProductContract $productContract,
    ){
        $this->orderContract = $orderContract;
        $this->representativeContract = $representativeContract;
        $this->productContract = $productContract;
        $this->inventoryContract = $inventoryContract;
    }

    public function getAllStockReport()
    {
        $userData = $this->orderContract->getAllStockReport();
        return view('admin.stocks.index', ['userData' => $userData]);
    }

    public function getProductSupplierWiseReport()
    {
        $suppliers = $this->representativeContract->getRepresentativeData();
        $products = $this->productContract->getProductData();
        $userData = $this->inventoryContract->getAllInventory();

        return view('admin.stocks.supplier-product-wise-report', [
            'suppliers' => $suppliers,
            'products' => $products,
            'userData' => $userData,
        ]);
    }
}
