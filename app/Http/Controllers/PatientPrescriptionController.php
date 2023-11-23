<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contracts\PatientContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Contracts\PrescriptionContract;
use Illuminate\Validation\Rules\Exists;
use App\Contracts\PrescribeMedicineContract;
use App\Contracts\PrescribeLaboratoryContract;
use App\Http\Requests\AddPatientPrescriptionRequest;

class PatientPrescriptionController extends Controller
{
    protected $patientContract;
    protected $prescribeMedicineContract;
    protected $prescribeLaboratoryContract;
    protected $prescriptionContract;

    public function __construct(
        PatientContract $patientContract,
        PrescribeMedicineContract $prescribeMedicineContract,
        PrescribeLaboratoryContract $prescribeLaboratoryContract,
        PrescriptionContract $prescriptionContract,
    ){
        $this->patientContract = $patientContract;
        $this->prescribeMedicineContract = $prescribeMedicineContract;
        $this->prescribeLaboratoryContract = $prescribeLaboratoryContract;
        $this->prescriptionContract = $prescriptionContract;
    }

    public function getPatientPrescription()
    {
        $patientData = $this->patientContract->allPatient();

        return view('admin.prescriptions.index', [
            'patientData' => $patientData,
        ]);
    }

    public function storePatientPrescription(AddPatientPrescriptionRequest $request)
    {
        DB::beginTransaction();

        try {
            $prefix = "TNX-PRS";
            $transactionNumber = Carbon::now()->format('Ymd-His');
            $invoiceNumber = $prefix . '-' . $transactionNumber;

            $params = $request->validated();
            $statusId = 1;
            $remarks = "for checkup";
            $isActive = 1;

            $medicineId = [];
            $laboratoryId = [];

            // Prescribe Medicine
            if (!empty($params['product_id'])) {
                foreach ($params['product_id'] as $key => $productId) {
                    $prescribeMedicine = $this->prescribeMedicineContract->storePrescribeMedicine([
                        'product_id' => $productId,
                        'srp' => $params['srp'][$key],
                        'quantity' => $params['quantity'][$key],
                        'remarks' => $remarks,
                        'isActive' => $isActive,
                    ]);

                    $medicineId[] = $prescribeMedicine->id;
                }
            } else {
                $medicineId[] = 1;
            }

            // Prescribe Laboratory
            if (!empty($params['laboratory_id'])) {
                foreach ($params['laboratory_id'] as $key => $laboratoryId) {
                    $prescribeLaboratory = $this->prescribeLaboratoryContract->storePrescribeLaboratory([
                        'laboratory_id' => $laboratoryId,
                        'quantity' => $params['quantity'][$key],
                        'remarks' => $remarks,
                        'isActive' => $isActive,
                    ]);

                    $laboratoryId[] = $prescribeLaboratory->id;
                }
            } else {
                $laboratoryId[] = 1;
            }

            // Determine which array to use based on the counts
            $prescribeIds = (count($medicineId) >= count($laboratoryId)) ? $medicineId : $laboratoryId;

            // Create Transactions
            foreach ($prescribeIds as $key => $prescribeId) {
                $data = [
                    'supplier_id' => $params['supplier_id'][$key],
                    'patient_checkup_id' => $params['patient_checkup_id'][$key],
                    'prescribe_laboratory_id' => $laboratoryId[$key],
                    'prescribe_medicine_id' => $medicineId[$key],
                    'status_id' => $statusId,
                    'invoice_number' => $invoiceNumber,
                    'remarks' => $remarks,
                    'isActive' => $isActive,
                ];

                $this->prescriptionContract->storePrescription($data);
            }

            DB::commit();

            $notification = [
                'alert-type' => 'success',
                'message' => 'Data saved successfully!',
            ];

            return redirect()->route('admin.')->with($notification);

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.patient.prescription')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.patient.prescription')->with($notification);
                } else {
                    return view('404');
                }
            }
        } catch (\Exception $e) {
            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            if (Auth::check()) {
                if (Auth::user()->role_id == 1) {
                    return redirect()->route('admin.all.patient.prescription')->with($notification);
                } elseif (Auth::user()->role_id == 2) {
                    return redirect()->route('manager.all.patient.prescription')->with($notification);
                } else {
                    return view('404');
                }
            }
        }
    }
}
