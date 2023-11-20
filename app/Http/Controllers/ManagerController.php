<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\LaboratoryContract;
use App\Contracts\InventoryContract;

class ManagerController extends Controller
{
    protected $productContract;
    protected $laboratoryContract;
    protected $inventoryContract;

    public function __construct(
        ProductContract $productContract,
        InventoryContract $inventoryContract,
        LaboratoryContract $laboratoryContract
    ){
        $this->productContract = $productContract;
        $this->laboratoryContract = $laboratoryContract;
        $this->inventoryContract = $inventoryContract;
    }

    public function index()
    {
        return view('manager.dashboard');
    }

    public function cashier()
    {
        // $inventories = $this->inventoryContract->getProductDataByInventory();
        // dd($inventories);
        $products = $this->productContract->getProductData();
        $laboratories = $this->laboratoryContract->getLaboratoryData();
        return view('manager.cashiers.index', [
            'products' => $products,
            'laboratories' => $laboratories,
        ]);
    }
}
