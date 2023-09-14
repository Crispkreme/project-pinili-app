<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Contracts\OrderContract;
use App\Contracts\StatusContract;
use App\Contracts\ProductContract;
use App\Contracts\DistributorContract;
use App\Contracts\RepresentativeContract;

class OrderController extends Controller
{
    protected $orderContract;
    protected $userContract;
    protected $representativeContract;
    protected $distributorContract;
    protected $productContract;
    protected $statusContract;

    public function __construct(
        OrderContract $orderContract,
        UserContract $userContract,
        RepresentativeContract $representativeContract,
        DistributorContract $distributorContract,
        ProductContract $productContract,
        StatusContract $statusContract,
    ) {
        $this->orderContract = $orderContract;
        $this->userContract = $userContract;
        $this->representativeContract = $representativeContract;
        $this->distributorContract = $distributorContract;
        $this->productContract = $productContract;
        $this->statusContract = $statusContract;
    }

    public function getAllOrder()
    {
        $userData = $this->orderContract->getAllOrder();
        return view('admin.orders.index', ['userData' => $userData]);
    }

    public function createOrder()
    {
        $userData = $this->userContract->getAllUserData();
        $representativeData = $this->representativeContract->getRepresentativeData();
        $distributorData = $this->distributorContract->getAllDistributorData();
        $productData = $this->productContract->getProductData();
        $statusData = $this->statusContract->getAllStatusData();

        return view('admin.orders.create', [
            'userData' => $userData,
            'representativeData' => $representativeData,
            'distributorData' => $distributorData,
            'productData' => $productData,
            'statusData' => $statusData,
        ]);
    }
}
