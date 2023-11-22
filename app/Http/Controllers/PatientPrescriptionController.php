<?php

namespace App\Http\Controllers;

use App\Contracts\PatientContract;
use App\Http\Requests\AddPatientPrescriptionRequest;
use Illuminate\Http\Request;

class PatientPrescriptionController extends Controller
{
    protected $patientContract;

    public function __construct(
        PatientContract $patientContract
    ){
        $this->patientContract = $patientContract;
    }

    public function getPatientPrescription()
    {
        $patientData = $this->patientContract->allPatient();

        return view('admin.prescriptions.index', [
            'patientData' => $patientData,
        ]);
    }

    public function storeOrstorePatientPrescriptionder(AddOrderStoreRequest $request)
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
}
