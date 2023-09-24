<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\InventorySheetContract;
use App\Contracts\UserContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\DistributorContract;
use App\Contracts\ProductContract;
use App\Contracts\StatusContract;
use App\Contracts\CategoryContract;
use App\Http\Requests\StoreInventorySheetRequest;

class InventorySheetController extends Controller
{
    protected $inventorySheetContract;
    protected $userContract;
    protected $representativeContract;
    protected $distributorContract;
    protected $productContract;
    protected $statusContract;
    protected $categoryContract;

    public function __construct(
        InventorySheetContract $inventorySheetContract,
        UserContract $userContract,
        RepresentativeContract $representativeContract,
        DistributorContract $distributorContract,
        ProductContract $productContract,
        StatusContract $statusContract,
        CategoryContract $categoryContract,
    ) {
        $this->inventorySheetContract = $inventorySheetContract;
        $this->userContract = $userContract;
        $this->representativeContract = $representativeContract;
        $this->distributorContract = $distributorContract;
        $this->productContract = $productContract;
        $this->statusContract = $statusContract;
        $this->categoryContract = $categoryContract;
    }

    public function getAllInventorySheet()
    { 
        $inventorySheets = $this->inventorySheetContract->getAllInventorySheet();
        return view('admin.inventories.index', ['inventorySheets' => $inventorySheets]);
    }

    public function addInventoryList()
    {
        $userData = $this->userContract->getAllUserData();
        $representativeData = $this->representativeContract->getRepresentativeData();
        $distributorData = $this->distributorContract->getAllDistributorData();
        $productData = $this->productContract->getProductData();
        $statusData = $this->statusContract->getAllStatusData();
        $categoryData = $this->categoryContract->getCategoryData();

        return view('admin.inventories.create', [
            'userData' => $userData,
            'representativeData' => $representativeData,
            'distributorData' => $distributorData,
            'productData' => $productData,
            'statusData' => $statusData,
            'categoryData' => $categoryData,
        ]);
    }

    public function storeInventorySheet(
        StoreInventorySheetRequest $inventorySheetRequest,
        StoreInventoryRequest $inventoryRequest,
        StoreUserRequest $userRequest,
        StoreCustomerRequest $customerRequest
    ) {
        $params = [
            'inventorySheet' => $inventorySheetRequest->validated(),
            'inventory' => $inventoryRequest->validated(),
            'user' => $userRequest->validated(),
            'customer' => $customerRequest->validated(),
        ];

        dd($params);
    }
}
