<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Contracts\StatusContract;
use App\Contracts\ProductContract;
use Illuminate\Support\Facades\DB;
use App\Contracts\CategoryContract;
use App\Contracts\DistributorContract;
use App\Contracts\InventorySheetContract;
use App\Contracts\RepresentativeContract;
use App\Http\Requests\StoreInventorySheetRequest;
use App\Http\Requests\StoreInventoryDetailRequest;
use App\Http\Requests\StoreInventoryPaymentRequest;
use App\Http\Requests\StoreInventoryPaymentDetailRequest;

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

    public function storeInventorySheet(Request $request) {

        DB::beginTransaction();

        try {
            $prefix = "TNX-RCV";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoice_number = $prefix.'-'.$transactionNumber;

            $subtotal = $request->subtotal;
            $description = $request->description;
            $current_paid_amount = $request->current_paid_amount;
            $paid_status_id = $request->paid_status_id;
            $discount_amount = $request->discount_amount;
            $total_amount = $request->total_amount;

            for ($i = 0; $i < count($request->supplier_id); $i++) {
                $data = [
                    'supplier_id' => $request->supplier_id[$i],
                    'product_id' => $request->product_id[$i],
                    'quantity' => $request->quantity[$i],
                    'purchase_cost' => $request->purchase_cost[$i],
                    "subtotal" => $subtotal,
                    "description" => $description,
                    "current_paid_amount" => $current_paid_amount,
                    "paid_status_id" => $paid_status_id,
                    "discount_amount" => $discount_amount,
                    "total_amount" => $total_amount,
                ];

                $distributorId = $this->distributorContract->getSpecificDistributorBySupplierId($data['supplier_id']);
                dd($distributorId->company_id);
            }

        } catch (Exception $e) {

            DB::rollBack();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);

        }
    }
}
