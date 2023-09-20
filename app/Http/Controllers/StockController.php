<?php

namespace App\Http\Controllers;

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

    public function __construct(
        OrderContract $orderContract,
        RepresentativeContract $representativeContract,
        ProductContract $productContract,
    ){
        $this->orderContract = $orderContract;
        $this->representativeContract = $representativeContract;
        $this->productContract = $productContract;
    }

    public function getAllStockReport()
    {
        $userData = $this->orderContract->getAllStockReport();
        return view('admin.stocks.index', ['userData' => $userData]);
    }

    public function getProductSupplierWiseReport()
    {
        $columns = ['medicine_name','id'];
        $suppliers = $this->representativeContract->getRepresentativeData();
        $products = $this->productContract->getProductData($columns);
        return view('admin.stocks.supplier-product-wise-report', [
            'suppliers' => $suppliers,
            'products' => $products
        ]);
    }

    public function getProductWiseReport(ProductWiseReportRequest $request)
    {
        $params = $request->validated();
        dd($params['product_id']);
    }

    public function getSupplierWiseReport(SupplierWiseReportRequest $request)
    {
        $params = $request->validated();
        dd($params['supplier_id']);
    }
}
