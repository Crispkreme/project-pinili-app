<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\UserContract;
use App\Contracts\OrderContract;
use App\Contracts\StatusContract;
use App\Contracts\ProductContract;
use App\Contracts\CategoryContract;
use App\Contracts\InventoryContract;
use App\Contracts\TransactionContract;
use Illuminate\Support\Facades\Auth;
use App\Contracts\DistributorContract;
use App\Contracts\EntityContract;
use App\Contracts\FormContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\DrugClassContract;
use App\Http\Requests\AddOrderStoreRequest;
use App\Http\Requests\AddProductStoreRequest;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $orderContract;
    protected $userContract;
    protected $representativeContract;
    protected $distributorContract;
    protected $productContract;
    protected $statusContract;
    protected $categoryContract;
    protected $inventoryContract;
    protected $entityContract;
    protected $formContract;
    protected $transactionContract;
    protected $drugClassContract;

    public function __construct(
        DrugClassContract $drugClassContract,
        OrderContract $orderContract,
        UserContract $userContract,
        RepresentativeContract $representativeContract,
        DistributorContract $distributorContract,
        ProductContract $productContract,
        StatusContract $statusContract,
        CategoryContract $categoryContract,
        InventoryContract $inventoryContract,
        EntityContract $entityContract,
        FormContract $formContract,
        TransactionContract $transactionContract,
    ) {
        $this->orderContract = $orderContract;
        $this->userContract = $userContract;
        $this->representativeContract = $representativeContract;
        $this->distributorContract = $distributorContract;
        $this->productContract = $productContract;
        $this->statusContract = $statusContract;
        $this->categoryContract = $categoryContract;
        $this->inventoryContract = $inventoryContract;
        $this->entityContract = $entityContract;
        $this->formContract = $formContract;
        $this->transactionContract = $transactionContract;
        $this->drugClassContract = $drugClassContract;
    }

    public function getAllOrder()
    {
        $userData = $this->orderContract->getAllOrder();
        return view('admin.orders.index', ['userData' => $userData]);
    }

    public function printOrderInvoice()
    {
        $userData = $this->orderContract->printOrderInvoice(8);
        return view('admin.orders.print-invoice', ['userData' => $userData]);
    }

    public function createOrder()
    {
        $userData = $this->userContract->getAllUserData();
        $representativeData = $this->representativeContract->getRepresentativeData();
        $distributorData = $this->distributorContract->getAllDistributorData();
        $productData = $this->productContract->getProductData();
        $statusData = $this->statusContract->getAllStatusData();
        $categoryData = $this->categoryContract->getCategoryData();

        return view('admin.orders.create', [
            'userData' => $userData,
            'representativeData' => $representativeData,
            'distributorData' => $distributorData,
            'productData' => $productData,
            'statusData' => $statusData,
            'categoryData' => $categoryData,
        ]);
    }

    public function editOrder($id)
    {
        $productData = $this->productContract->editProduct($id);
        $categoryData = $this->categoryContract->getCategory();
        $formData = $this->formContract->getForm();

        return view('admin.orders.edit', [
            'productData' => $productData,
            'categoryData' => $categoryData,
            'formData' => $formData,
        ]);
    }

    public function getSpecificCategory(Request $request, $id)
    {
        $formId = $this->productContract->getSpecificCategory($id);
        $formData = $this->drugClassContract->getSpecificDrugClassById($formId);
        return response()->json($formData);
    }

    public function getSpecificForm(Request $request)
    {
        $formId = $request->form_id;
        $userData = $this->productContract->getSpecificForm($formId);
        return response()->json($userData);
    }

    public function getSpecificProduct(Request $request)
    {
        $supplierId = $request->supplier_id;
        $userData = $this->orderContract->getSpecificProduct($supplierId);
        return response()->json($userData);
    }

    public function storeOrder(AddOrderStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $prefix = "TNX-ORD";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoice_number = $prefix.'-'.$transactionNumber;

            $params = $request->validated();
            $status_id = 7;
            $po_number = $transactionNumber;
            $user_id = Auth::user()->id;
            $remarks = "for approval";

            for ($i = 0; $i < count($params['supplier_id']); $i++) {
                $data = [
                    'supplier_id' => $params['supplier_id'][$i],
                    'manufacturer_id' => $params['manufacturer_id'][$i],
                    'product_id' => $params['product_id'][$i],
                    'quantity' => $params['quantity'][$i],
                    'purchase_cost' => $params['purchase_cost'][$i],
                    'srp' => $params['srp'][$i],
                    'expiry_date' => $params['expiry_date'][$i],
                    'manufacturing_date' => $params['manufacturing_date'][$i],
                    'status_id' => $status_id,
                    'po_number' => $po_number,
                    'user_id' => $user_id,
                    'remarks' => $remarks,
                    'invoice_number' => $invoice_number,
                ];

                $this->orderContract->storeOrder($data);
            }

            $params['user_id'] = $user_id;
            $params['status_id'] = $status_id;
            $params['description'] = "has ordered product with a ". $invoice_number. " ";

            $this->transactionContract->createTransaction($params);

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Data saved successfully!',
            ];

            return redirect()->route('admin.all.order')->with($notification);

        } catch (\Exception $e) {

            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->route('admin.all.order')->with($notification);
        }
    }

    public function approveOrder($id)
    {
        try {

            $updatedOrder = $this->orderContract->approveOrder($id);

            $prefix = "IVN";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $id_number = $prefix . '-' . $transactionNumber;

            $params = [
                'id_number' => $id_number,
                'product_id' => $updatedOrder->product_id,
                'supplier_id' => $updatedOrder->supplier_id,
                'purchase_stocks' => $updatedOrder->quantity,
                'srp' => $updatedOrder->srp,
                'user_id' => Auth::user()->id,
                'price' => $updatedOrder->purchase_cost,
                'isActive' => 1,
            ];

            $this->inventoryContract->storeInventory($params);

            $productId = $updatedOrder->product_id;
            $params = [
                'isActive' => 1,
                'sku' => $updatedOrder->quantity,
            ];

            $this->productContract->updateInventoryData($productId, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Order approved successfully!',
            ];

            return redirect()->back()->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function pendingOrder()
    {
        $userData = $this->orderContract->pendingOrder(7);
        return view('admin.orders.index', ['userData' => $userData]);
    }

    public function deleteOrder($id)
    {
        try{

            $userData = $this->orderContract->deleteOrder($id);
            toast('Order deleted successfully!','success');
            return redirect()->route('admin.all.order');

        } catch (Exception $e) {

            toast('Error occurred: ' . $e->getMessage(),'danger');
            return redirect()->route('admin.all.order');
        }
    }

    public function printOrderInvoiceById($id)
    {
        $userData = $this->orderContract->printOrderInvoiceById($id);
        return view('pdf.print-order-invoice-pdf', ['userData' => $userData]);
    }

    public function getDailyOrderReport()
    {
        return view('admin.orders.daily-order-report');
    }

    public function getAllDailyOrderReport(Request $request)
    {

        $startDate = date('Y-m-d', strtotime($request->start_date));
        $endDate = empty($request->end_date) ? date('Y-m-d') : date('Y-m-d', strtotime($request->end_date));
        $params = [$startDate, $endDate];

        $userData = $this->orderContract->getAllDailyOrderReport($params);

        return view('admin.orders.daily-order-report', [
            'userData' => $userData,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }

    public function getAllDeletedOrder()
    {
        $userData = $this->orderContract->getAllDeletedOrder();
        return view('admin.orders.index', ['userData' => $userData]);
    }

    public function getRestoreDeletedOrder($id)
    {
        $this->orderContract->getRestoreDeletedOrder($id);
        return redirect()->back();
    }

    public function getAllHistoryByCompany($id)
    {
        $companyHistories = $this->orderContract->getAllOrderHistoryByCompany($id);

        foreach ($companyHistories as $data) {
            $supplierId = $data->supplier_id;
            $companyId = $data->manufacturer_id;
            $approveId = $data->approve_id;
            $recieveId = $data->user_id;
            $reportId = $data->id;
        }

        $supplierName = $this->entityContract->getSpecificSupplierName($supplierId);

        $company = $this->distributorContract->getSpecificDistributorBySupplierId($companyId);

        $orderData = $this->orderContract->getAllSpecificOrderHistoryByUser($id);

        $approveBy = $this->userContract->getApprovedByUser($id);

        $recievedBy = $this->userContract->getRecievedByUser($id);

        return view('admin.inventories.inventory-sheet', [
            'companyHistories' => $companyHistories,
            'supplierName' => $supplierName,
            'company' => $company,
            'orderData' => $orderData,
            'approveBy' => $approveBy,
            'recievedBy' => $recievedBy,
            'supplierId' => $supplierId,
        ]);
    }

    public function getAllOrderHistoryByCompany($id)
    {
        $companyHistory = $this->orderContract->getAllOrderHistoryByCompany($id);
        return response()->json($companyHistory);
    }

    public function getAllPaymentHistoryByCompany($id)
    {
        $companyHistory = $this->orderContract->getAllOrderHistoryByCompany($id);
        return response()->json($companyHistory);
    }

    public function getAllStockHistoryByCompany($id)
    {
        $companyHistory = $this->orderContract->getAllOrderHistoryByCompany($id);
        return response()->json($companyHistory);
    }

    public function getOrderTransaction(Request $request)
    {
        $productId = $request->product_id;
        $orderData = $this->orderContract->getSpecificProduct($productId);
        return response()->json($orderData);
    }

    public function updateOrder(AddProductStoreRequest $request, $id)
    {
        try {

            $params = $request->validated();

            $this->productContract->updateProduct($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            return redirect()->route('admin.all.order')->with($notification);

        } catch (\Exception $e) {

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editOrderData($id)
    {
        $orderData = $this->orderContract->editOrderData($id);
        $representativeData = $this->representativeContract->getRepresentativeData();
        $distributorData = $this->distributorContract->getAllDistributorData();

        $invoiceNumber = $orderData->invoice_number;
        $manufacturingDate = $orderData->manufacturing_date;
        $expiryDate = $orderData->expiry_date;

        $productData = $this->orderContract->getOrderDataByInvoiceNumber($invoiceNumber);

        return view('admin.orders.edit-order', [
            'productData' => $productData,
            'orderData' => $orderData,
            'invoiceNumber' => $invoiceNumber,
            'manufacturingDate' => $manufacturingDate,
            'expiryDate' => $expiryDate,
            'distributorData' => $distributorData,
            'representativeData' => $representativeData,
        ]);
    }

    public function printOrderList(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $params = [$startDate, $endDate];

        $userData = $this->orderContract->getAllDailyOrderReport($params);

        return view('pdf.product-order-list-pdf', [
            'userData' => $userData,
        ]);
    }

    public function getOrderInvoiceNumber(Request $request)
    {
        $invoice_number = $request->invoice_number;
        $orderData = $this->orderContract->getOrderInvoiceNumber($invoice_number);
        return response()->json($orderData);
    }
}