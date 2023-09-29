<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\DistributorContract;

use App\Contracts\InventoryDetailContract;
use App\Contracts\InventoryPaymentContract;
use App\Contracts\InventoryPaymentDetailContract;
use App\Contracts\InventorySheetContract;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\StatusContract;
use App\Contracts\UserContract;
use App\Contracts\EntityContract;
use App\Http\Requests\StoreInventoryDetailRequest;
use App\Http\Requests\StoreInventoryPaymentDetailRequest;
use App\Http\Requests\StoreInventoryPaymentRequest;
use App\Http\Requests\StoreInventorySheetRequest;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventorySheetController extends Controller
{
    protected $inventorySheetContract;
    protected $userContract;
    protected $representativeContract;
    protected $distributorContract;
    protected $productContract;
    protected $statusContract;
    protected $categoryContract;
    protected $inventoryDetailContract;
    protected $inventoryPaymentContract;
    protected $inventoryPaymentDetailContract;
    protected $orderContract;
    protected $pdf;
    protected $entityContract;

    public function __construct(
        PDF $pdf,
        OrderContract $orderContract,
        InventorySheetContract $inventorySheetContract,
        InventoryDetailContract $inventoryDetailContract,
        UserContract $userContract,
        RepresentativeContract $representativeContract,
        DistributorContract $distributorContract,
        ProductContract $productContract,
        StatusContract $statusContract,
        CategoryContract $categoryContract,
        InventoryPaymentContract $inventoryPaymentContract,
        InventoryPaymentDetailContract $inventoryPaymentDetailContract,
        EntityContract $entityContract,
    ) {
        $this->inventorySheetContract = $inventorySheetContract;
        $this->inventoryDetailContract = $inventoryDetailContract;
        $this->userContract = $userContract;
        $this->representativeContract = $representativeContract;
        $this->distributorContract = $distributorContract;
        $this->productContract = $productContract;
        $this->statusContract = $statusContract;
        $this->categoryContract = $categoryContract;
        $this->inventoryPaymentContract = $inventoryPaymentContract;
        $this->inventoryPaymentDetailContract = $inventoryPaymentDetailContract;
        $this->orderContract = $orderContract;
        $this->pdf = $pdf;
        $this->entityContract = $entityContract;
    }

    public function getAllInventorySheet()
    {
        $inventorySheets = $this->inventoryDetailContract->getAllInventoryDetail();
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

        try {

            $prefix = "TNX-RCV";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoice_number = $prefix.'-'.$transactionNumber;

            $params = [
                'invoice_number' => $invoice_number,
                'po_number' => $request->input('po_number'),
                'delivery_number' => $request->input('delivery_number'),
                'delivery_date' => $request->input('delivery_date'),
                'previous_delivery' => "",
                'present_delivery' => "",
                'or_number' => $request->input('or_number'),
                'or_date' => $request->input('or_date'),
                'description' => $request->input('description'),
            ];

            $distributors = $this->distributorContract->getSpecificDistributorBySupplierId($request->supplier_id);
            $companyId = $distributors[0]->company_id;

            $params['distributor_id'] = $companyId;

            $inventorySheets = $this->inventorySheetContract->storeInventorySheet($params);
            $inventory_status_id = 7;

            $allData = [];

            for ($i = 0; $i < count($request->product_id); $i++) {

                $data = [
                    'inventory_sheet_id' => $inventorySheets->id,
                    'product_id' => $request->product_id[$i],
                    'inventory_status_id' => $inventory_status_id,
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i],
                    'subtotal' => $request->subtotal[$i],
                ];

                $allData[] = $data;
            }

            foreach ($allData as $data) {
                $this->inventoryDetailContract->storeInventoryDetail($data);
            }

            $current_paid_amount = $request->current_paid_amount;
            $payment_status_id = $request->payment_status_id;
            $discount_amount = $request->discount_amount;
            $due_amount = $request->due_amount;
            $total_amount = $request->total_amount;
            $balance = $request->balance;
            $customer_id = auth()->user()->id;

            $params1 = [
                'inventory_sheet_id' => $inventorySheets->id,
                'customer_id' => $customer_id,
                'payment_status_id' => $payment_status_id,
                'paid_amount' => $current_paid_amount,
                'due_amount' => $due_amount,
                'total_amount' => $total_amount,
                'discount_amount' => $discount_amount,
            ];

            $this->inventoryPaymentContract->storeInventoryPayment($params1);

            $params2 = [
                'inventory_sheet_id' => $inventorySheets->id,
                'current_paid_amount' => $current_paid_amount,
                'balance' => $balance,
            ];

            $this->inventoryPaymentDetailContract->storeInventoryPaymentDetail($params2);

            $orderID = $this->orderContract->getOrderIdByInvoiceNumber($request->input('po_number'));

            $this->orderContract->updateOrderStatusByInventorySheet($orderID->id);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Ordered successfully delivered!',
            ];

            return redirect()->route('admin.all.inventory.sheet')->with($notification);

        } catch (Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);

        }
    }

    public function generateInventorySheetReport($id)
    {
        $companyHistories = $this->orderContract->getAllOrderHistoryByCompany($id);

        foreach ($companyHistories as $data) {
            $supplierId = $data->supplier_id;
            $companyId = $data->manufacturer_id;
            $approveId = $data->approve_id;
            $recieveId = $data->user_id;
        }

        $supplierName = $this->entityContract->getSpecificSupplierName($supplierId);

        $company = $this->distributorContract->getSpecificDistributorBySupplierId($companyId);

        $orderData = $this->orderContract->getAllSpecificOrderHistoryByUser($id);

        $approveBy = $this->userContract->getApprovedByUser($id);

        $recievedBy = $this->userContract->getRecievedByUser($id);

        $pdf = $this->pdf->loadView('pdf.inventory-sheet-invoice-report', [
            'companyHistories' => $companyHistories,
            'supplierName' => $supplierName,
            'company' => $company,
            'orderData' => $orderData,
            'approveBy' => $approveBy,
            'recievedBy' => $recievedBy,
        ])
        ->setPaper('a4', 'landscape')
        ->setWarnings(false);
        return $pdf->stream('inventory-sheet-invoice-report.pdf');
    }
}
