<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Contracts\DistributorContract;
use App\Contracts\EntityContract;
use App\Contracts\InventoryContract;
use App\Contracts\InventoryDetailContract;
use App\Contracts\InventoryPaymentContract;
use App\Contracts\InventoryPaymentDetailContract;
use App\Contracts\InventorySheetContract;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\StatusContract;
use App\Contracts\UserContract;
use App\Http\Requests\ProductWiseReportRequest;
use App\Http\Requests\SupplierWiseReportRequest;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    protected $inventoryContract;
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
        InventoryContract $inventoryContract,
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
        $this->inventoryContract = $inventoryContract;
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

    // INVENTORY SHEET FUNCTIONALITY
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

            if($request->product_id == null)
            {
                $notification = [
                    'alert-type' => 'danger',
                    'message' => 'Select Product to proceed',
                ];

                return redirect()->back()->with($notification);
            }

            $prefix = "TNX-RCV";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoice_number = $prefix.'-'.$transactionNumber;
            $po_number = $request->po_number;
            $delivery_number = $request->delivery_number;
            $or_number = $request->or_number;
            $current_paid_amount = $request->current_paid_amount;
            $payment_status_id = $request->payment_status_id;
            $discount_amount = $request->discount_amount;
            $due_amount = $request->due_amount;
            $total_amount = $request->total_amount;
            $balance = $request->balance;
            $remarks = $request->description;
            $customer_id = auth()->user()->id;

            $params = [
                'invoice_number' => $invoice_number,
                'po_number' => $po_number,
                'delivery_number' => $request->input('delivery_number'),
                'delivery_date' => $request->input('delivery_date'),
                'previous_delivery' => "",
                'present_delivery' => "",
                'or_number' => $request->input('or_number'),
                'or_date' => $request->input('or_date'),
                'description' => $request->input('description'),
            ];

            $distributors = $this->distributorContract->getSpecificDistributorBySupplierId($request->supplier_id);

            $companyId = $distributors->company_id;

            $params['distributor_id'] = $companyId;

            $inventorySheets = $this->inventorySheetContract->storeInventorySheet($params);
            $inventory_status_id = 7;

            $inventoryData = [];
            $orderData = [];

            for ($i = 0; $i < count($request->product_id); $i++) {
                $inventory = [
                    'inventory_sheet_id' => $inventorySheets->id,
                    'po_number' => $po_number,
                    'delivery_number' => $request->input('delivery_number'),
                    'or_number' => $request->input('or_number'),
                    'product_id' => $request->product_id[$i],
                    'inventory_status_id' => $inventory_status_id,
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i],
                    'subtotal' => $request->subtotal[$i],
                ];

                $order = [
                    'delivery_number' => $delivery_number,
                    'or_number' => $request->input('or_number'),
                    'product_id' => $request->product_id[$i],
                    'remarks' => $remarks,
                    'or_number' => $request->input('or_number'),
                    'delivery_number' => $request->input('delivery_number'),
                ];

                $inventoryData[] = $inventory;
                $orderData[] = $order;
            }

            foreach ($inventoryData as $inventory) {
               $this->inventoryDetailContract->storeInventoryDetail($inventory);
            }

            foreach ($orderData as $order) {
                $this->orderContract->updateOrDeliveryNumberOrder($order['product_id'], $order);
            }

            $this->orderContract->updateOrderStatusByInventorySheet($or_number);

            $params1 = [
                'inventory_sheet_id' => $inventorySheets->id,
                'customer_id' => $customer_id,
                'payment_status_id' => $payment_status_id,
                'paid_amount' => $current_paid_amount,
                'balance' => $balance,
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

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Ordered successfully delivered!',
            ];

            return redirect()->route('admin.all.inventory.sheet')->with($notification);

        } catch (Exception $e) {

            DB::rollback();

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
    public function editInventorySheet($id)
    {
        $inventorySheet = $this->inventorySheetContract->editInventorySheet($id);

        $orderData = $this->orderContract->getOrderData($inventorySheet[0]['or_number']);

        $inventoryPayment = $this->inventoryPaymentContract->getInventoryPaymentDataByOrNumber($inventorySheet[0]['id']);

        $userData = $this->userContract->getAllUserData();
        $representativeData = $this->representativeContract->getRepresentativeData();
        $distributorData = $this->distributorContract->getAllDistributorData();
        $productData = $this->productContract->getProductData();
        $statusData = $this->statusContract->getAllStatusData();
        $categoryData = $this->categoryContract->getCategoryData();

        return view('admin.inventories.update-inventory-sheet', [
            'userData' => $userData,
            'representativeData' => $representativeData,
            'distributorData' => $distributorData,
            'productData' => $productData,
            'statusData' => $statusData,
            'categoryData' => $categoryData,
            'inventorySheet' => $inventorySheet,
            'orderData' => $orderData,
            'inventoryPayment' => $inventoryPayment,
        ]);
    }
    public function generateInventorySheet($id)
    {
        $inventorySheet = $this->inventorySheetContract->editInventorySheet($id);
        $orderData = $this->orderContract->getOrderData($inventorySheet[0]['or_number']);
        $inventoryPayment = $this->inventoryPaymentContract->getInventoryPaymentDataByOrNumber($inventorySheet[0]['id']);

        $pdf = $this->pdf->loadView('pdf.all-inventory-sheet-invoice-report', [
            'inventorySheet' => $inventorySheet,
            'orderData' => $orderData,
            'inventoryPayment' => $inventoryPayment,
        ])
        ->setPaper('a4', 'landscape')
        ->setWarnings(false);
        return $pdf->stream('all-inventory-sheet-invoice-report.pdf');
    }

    // STOCK FUNCTIONALITY
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

    // INVOICE FUNCTIONALITY
    public function getDailyOrderInvoice()
    {
        return view('pdf.daily-order-invoice-report');
    }
}
