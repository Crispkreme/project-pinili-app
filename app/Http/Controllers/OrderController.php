<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;

use App\Contracts\DistributorContract;
use App\Contracts\DrugClassContract;
use App\Contracts\EntityContract;
use App\Contracts\FormContract;

use App\Contracts\InventoryContract;
use App\Contracts\LaboratoryContract;
use App\Contracts\OrderContract;
use App\Contracts\PatientBillingContract;
use App\Contracts\PatientCheckupContract;
use App\Contracts\PatientContract;
use App\Contracts\PrescribeLaboratoryContract;
use App\Contracts\PrescribeMedicineContract;
use App\Contracts\PrescriptionContract;
use App\Contracts\ProductContract;
use App\Contracts\RepresentativeContract;
use App\Contracts\StatusContract;
use App\Contracts\TransactionContract;
use App\Contracts\UserContract;
use App\Http\Requests\AddOrderStoreRequest;
use App\Http\Requests\AddProductStoreRequest;
use App\Models\Laboratory;
use App\Models\Order;
use Carbon\Carbon;

use Exception;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderContract;
    protected $userContract;
    protected $representativeContract;
    protected $distributorContract;
    protected $productContract;
    protected $laboratoryContract;
    protected $statusContract;
    protected $categoryContract;
    protected $inventoryContract;
    protected $entityContract;
    protected $formContract;
    protected $transactionContract;
    protected $drugClassContract;
    protected $prescriptionContract;
    protected $patientContract;
    protected $prescribeMedicineContract;
    protected $prescribeLaboratoryContract;
    protected $patientCheckupContract;
    protected $patientBillingContract;

    public function __construct(
        DrugClassContract $drugClassContract,
        PatientCheckupContract $patientCheckupContract,
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
        PrescriptionContract $prescriptionContract,
        PatientContract $patientContract,
        PrescribeMedicineContract $prescribeMedicineContract,
        PrescribeLaboratoryContract $prescribeLaboratoryContract,
        LaboratoryContract $laboratoryContract,
        PatientBillingContract $patientBillingContract,
    ) {
        $this->patientContract = $patientContract;
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
        $this->prescriptionContract = $prescriptionContract;
        $this->prescribeMedicineContract = $prescribeMedicineContract;
        $this->prescribeLaboratoryContract = $prescribeLaboratoryContract;
        $this->laboratoryContract = $laboratoryContract;
        $this->patientCheckupContract = $patientCheckupContract;
        $this->patientBillingContract = $patientBillingContract;
    }

    public function getAllOrder()
    {

        try {

            $userData = $this->orderContract->getAllOrder();

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.orders.index', ['userData' => $userData]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.orders.index', ['userData' => $userData]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.orders.index', ['userData' => $userData]);
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {
            Log::error('Error in getAllOrder: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function printOrderInvoice()
    {
        $userData = $this->orderContract->printOrderInvoice(8);
        return view('admin.orders.print-invoice', ['userData' => $userData]);
    }

    public function createOrder()
    {

        try {

            $userData = $this->userContract->getAllUserData();
            $representativeData = $this->representativeContract->getRepresentativeData();
            $distributorData = $this->distributorContract->getAllDistributorData();
            $productData = $this->productContract->getProductData();
            $statusData = $this->statusContract->getAllStatusData();
            $categoryData = $this->categoryContract->getCategoryData();

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.orders.create', [
                        'userData' => $userData,
                        'representativeData' => $representativeData,
                        'distributorData' => $distributorData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.orders.create', [
                        'userData' => $userData,
                        'representativeData' => $representativeData,
                        'distributorData' => $distributorData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.orders.create', [
                        'userData' => $userData,
                        'representativeData' => $representativeData,
                        'distributorData' => $distributorData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {
            Log::error('Error in createOrder: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editOrder($id)
    {
        try {

            $productData = $this->productContract->editProduct($id);
            $categoryData = $this->categoryContract->getCategory();
            $formData = $this->formContract->getForm();

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.orders.edit', [
                        'productData' => $productData,
                        'categoryData' => $categoryData,
                        'formData' => $formData,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.orders.edit', [
                        'productData' => $productData,
                        'categoryData' => $categoryData,
                        'formData' => $formData,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.orders.edit', [
                        'productData' => $productData,
                        'categoryData' => $categoryData,
                        'formData' => $formData,
                    ]);;
                } else {
                    return view('404');
                }
            }

        } catch (Exception $e) {
            Log::error('Error in editOrder: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
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

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.order')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.order')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.order')->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            DB::rollback();

            Log::error('Error in storeOrder: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
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

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.orders.index', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.orders.index', ['userData' => $userData]);
            } else {
                return view('404');
            }
        }
    }

    public function approveOrderList()
    {
        $userData = $this->orderContract->pendingOrder(8);

        if (Auth::check()) {
            if (Auth::user()->role_id == 1) {
                return view('admin.orders.approve-order', ['userData' => $userData]);
            } elseif (Auth::user()->role_id == 2) {
                return view('manager.orders.approve-order', ['userData' => $userData]);
            } else {
                return view('404');
            }
        }
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

    public function updateOrder(Request $request, $id)
    {
        dd($request);
        try {

            $params = $request->validated();

            $this->productContract->updateProduct($id, $params);

            $notification = [
                'alert-type' => 'success',
                'message' => 'Password updated successfully!',
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.order')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.order')->with($notification);
                } elseif (Auth::user()->role_id == 3) {
                    return redirect()->route('clerk.all.order')->with($notification);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            Log::error('Error in storeOrder: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function editOrderData($id)
    {

        try {

            $productData = $this->productContract->getProductData();
            $statusData = $this->statusContract->getAllStatusData();
            $categoryData = $this->categoryContract->getCategoryData();

            $orderData = $this->orderContract->editOrderData($id);
            $representativeData = $this->representativeContract->getRepresentativeData();
            $distributorData = $this->distributorContract->getAllDistributorData();

            $invoiceNumber = $orderData->invoice_number;
            $manufacturingDate = $orderData->manufacturing_date;
            $expiryDate = $orderData->expiry_date;

            $productData = $this->orderContract->getOrderDataByInvoiceNumber($invoiceNumber);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return view('admin.orders.edit-order', [
                        'productData' => $productData,
                        'orderData' => $orderData,
                        'invoiceNumber' => $invoiceNumber,
                        'manufacturingDate' => $manufacturingDate,
                        'expiryDate' => $expiryDate,
                        'distributorData' => $distributorData,
                        'representativeData' => $representativeData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } elseif (Auth::user()->role_id == 2) {
                    return view('manager.orders.edit-order', [
                        'productData' => $productData,
                        'orderData' => $orderData,
                        'invoiceNumber' => $invoiceNumber,
                        'manufacturingDate' => $manufacturingDate,
                        'expiryDate' => $expiryDate,
                        'distributorData' => $distributorData,
                        'representativeData' => $representativeData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } elseif (Auth::user()->role_id == 3) {
                    return view('clerk.orders.edit-order', [
                        'productData' => $productData,
                        'orderData' => $orderData,
                        'invoiceNumber' => $invoiceNumber,
                        'manufacturingDate' => $manufacturingDate,
                        'expiryDate' => $expiryDate,
                        'distributorData' => $distributorData,
                        'representativeData' => $representativeData,
                        'productData' => $productData,
                        'statusData' => $statusData,
                        'categoryData' => $categoryData,
                    ]);
                } else {
                    return view('404');
                }
            }

        } catch (\Exception $e) {

            Log::error('Error in editOrderData: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
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

    public function patientPayment()
    {
        $prescriptions = $this->prescriptionContract->getAllPatientPrescription();

        return view('manager.cashiers.payment', [
            'prescriptions' => $prescriptions,
        ]);
    }

    public function createPatientPayment($id)
    {
        $patient = $this->patientContract->getPatientById($id);
        $laboratories = $this->laboratoryContract->getLaboratory();
        $inventories = $this->inventoryContract->getAllInventory();

        return view('manager.cashiers.for-payment', [
            'patient' => $patient,
            'id' => $id,
            'laboratories' => $laboratories,
            'inventories' => $inventories,
        ]);
    }

    public function getPatientMedicinePrescription($id)
    {
        $prescriptions = $this->prescriptionContract->getSpecificPatientPrescription($id);

        $prescribeMedicines = [];
        $prescribeLaboratories = [];

        foreach ($prescriptions as $prescription) {
            $prescribeMedicine = $prescription->prescribe_medicine;
            $prescribeLaboratory = $prescription->prescribe_laboratory;

            if ($prescribeMedicine) {
                $prescribeMedicines[] = [
                    'product_id' => $prescribeMedicine->product_id,
                    'medicine_name' => $prescribeMedicine->product->medicine_name,
                    'generic_name' => $prescribeMedicine->product->generic_name,
                    'srp' => $prescribeMedicine->srp,
                    'quantity' => $prescribeMedicine->quantity,
                ];
            }

            if ($prescribeLaboratory && $prescribeLaboratory->isActive === 1) {
                $prescribeLaboratories[] = [
                    'laboratory_id' => $prescribeLaboratory->laboratory_id,
                    'laboratory' => $prescribeLaboratory->laboratory->laboratory,
                    'description' => $prescribeLaboratory->laboratory->description,
                    'price' => $prescribeLaboratory->laboratory->price,
                ];
            }
        }

        $response = [
            'prescribeMedicines' => $prescribeMedicines,
            'prescribeLaboratories' => $prescribeLaboratories,
        ];
        return response()->json($response);
    }

    public function getSpecificProductById($id)
    {
        try {

            $inventories = $this->inventoryContract->getSpecificInventoryByProductID($id);
            $response = [
                'prescribeMedicines' => $inventories,
            ];
            return response()->json($response);

        } catch (\Exception $e) {

            Log::error('Error in getSpecificProductById: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function getSpecificLaboratoryById($id)
    {
        try {

            $laboratories = $this->laboratoryContract->getSpecificLaboratoryByID($id);
            $response = [
                'prescribeLaboratories' => $laboratories,
            ];
            return response()->json($response);

        } catch (\Exception $e) {

            Log::error('Error in getSpecificLaboratoryById: ' . $e->getMessage());

            $notification = [
                'message' => 'An error occurred while updating the brand.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }
    
    public function updatePatientBilling(Request $request)
    {
        DB::beginTransaction();

        try {
            $prefix = "TRNX";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoice_number = $prefix.'-'.$transactionNumber;

            $prescriptionId = $request->prescriptionId;
            $patientCheckup = $this->patientCheckupContract->getPatientCheckupData($prescriptionId);
            $patientCheckupId = $patientCheckup->id;

            $updatedPrescription = $this->prescriptionContract->updatePrescriptionStatus($patientCheckupId);
            dd($updatedPrescription);
            
            $billingData = [];
            $inputCount = count($request->product_id) > count($request->laboratory_id)
                ? count($request->product_id)
                : count($request->laboratory_id);

            for ($i = 0; $i < $inputCount; $i++) {
                $productId = isset($request->product_id[$i]) ? $this->prescribeMedicineContract->checkMedicineById($request->product_id[$i])->product_id ?? 1 : 1;
                $laboratoryId = isset($request->laboratory_id[$i]) ? $this->prescribeLaboratoryContract->checkLaboratoryById($request->laboratory_id[$i])->laboratory_id ?? 1 : 1;

                $billing = [
                    'product_id' => $productId,
                    'laboratory_id' => $laboratoryId,
                    'patient_checkup_id' => $patientCheckupId,
                    'billing_status_id' => 2,
                    'invoice_number' => $invoice_number,
                    'srp' => $request->srp[$i] ?? 0,
                    'quantity' => $request->quantity[$i] ?? 0,
                    'price' => $request->price[$i] ?? 0,
                    'qty' => $request->qty[$i] ?? 0,
                    'sub_total_medicine' => $request->sub_total_medicine[$i] ?? 0,
                    'sub_total_laboratory' => $request->sub_total_laboratory[$i] ?? 0,
                ];

                $billingData[] = $billing;
            }

            foreach ($billingData as $billing) {
                $this->patientBillingContract->storePatientBilling($billing);
            }

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Billing successfully updated!',
            ];

            return redirect()->route('manager.print.patient.prescription', $patientCheckupId)->with($notification);

        } catch (\Exception $e) {

            Log::error('Error in updatePatientBilling: ' . $e->getMessage());

            DB::rollback();

            $notification = [
                'message' => 'An error occurred while updating the updatePatientBilling.',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function printPrescriptionCertificate($id)
    {
        $billings = $this->patientBillingContract->getPatientBillingByCheckupId($id);

        return view('manager.cashiers.billing-certificate', [
            'billings' => $billings,
        ]);
    }
}
