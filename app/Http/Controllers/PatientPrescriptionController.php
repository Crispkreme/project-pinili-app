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

    private function getRedirectRoute()
    {
        if (Auth::check()) {
            $role_id = Auth::user()->role_id;

            if ($role_id == 1) {
                return 'admin.all.patient.prescription';
            } elseif ($role_id == 2) {
                return 'manager.all.patient.prescription';
            }
        }

        return '404';
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
            $qty = 1;

            $medicineId = [];
            $laboratoryId = [];
            $prescriptionData = [];

            if (!empty($request->follow_up_date)) {

                // Prescribe Medicine
                if (!empty($request->product_id)) {

                    for ($i = 0; $i < count($request->product_id); $i++) {

                        $medicine = [
                            'product_id' => $request->product_id[$i],
                            'srp' => $request->srp[$i],
                            'quantity' => $request->qty_medicine[$i],
                            'remarks' => $request->remark_medicine[$i],
                            'isActive' => $isActive,
                        ];

                        $medicineData[] = $medicine;
                    }

                    foreach ($medicineData as $medicine) {
                        $prescribeMedicine = $this->prescribeMedicineContract->storePrescribeMedicine($medicine);
                        $medicineId[] = $prescribeMedicine->id;
                    }
                } else {
                    $medicineId[] = 1;
                }

                // Prescribe Laboratory
                if (!empty($request->laboratory_id)) {

                    for ($i = 0; $i < count($request->laboratory_id); $i++) {

                        $laboratory = [
                            'laboratory_id' => $request->laboratory_id[$i],
                            'quantity' => $request->qty_laboratory[$i],
                            'remarks' => $request->remark_laboratory[$i],
                            'isActive' => $isActive,
                        ];

                        $laboratoryData[] = $laboratory;
                    }

                    foreach ($laboratoryData as $laboratory) {
                        $prescribeLaboratory = $this->prescribeLaboratoryContract->storePrescribeLaboratory($laboratory);
                        $laboratoryId[] = $prescribeLaboratory->id;
                    }
                } else {
                    $laboratoryId[] = 1;
                }

                // Determine which array to use based on the counts
                // $prescribeIds = (count($medicineId) >= count($laboratoryId)) ? $medicineId : $laboratoryId;
                // $maxIterations = max(count($prescribeIds), count($medicineId), count($laboratoryId));

                // for ($i = 0; $i < $maxIterations; $i++) {

                //     $prescription = [
                //         'patient_checkup_id' => $request->patient_checkup_id,
                //         'prescribe_medicine_id' => $medicineId[$i],
                //         'prescribe_laboratory_id' => $laboratoryId[$i],
                //         'status_id' => $statusId,
                //         'invoice_number' => $invoiceNumber,
                //         'remarks' => $remarks,
                //         'qty' => $qty,
                //         'isActive' => $isActive,
                //     ];

                //     $prescriptionData[] = $prescription;
                //     dd($prescriptionData);
                // }

                // foreach ($prescriptionData as $prescription) {

                //     $this->prescriptionContract->storePrescription($prescription);
                // }

                $prescribeIds = (count($medicineId) >= count($laboratoryId)) ? $medicineId : $laboratoryId;
                $maxIterations = max(count($medicineId), count($laboratoryId));

                for ($i = 0; $i < $maxIterations; $i++) {
                    $prescription = [
                        'patient_checkup_id' => $request->patient_checkup_id,
                        'prescribe_medicine_id' => isset($medicineId[$i]) ? $medicineId[$i] : 1,
                        'prescribe_laboratory_id' => isset($laboratoryId[$i]) ? $laboratoryId[$i] : 1,
                        'status_id' => $statusId,
                        'invoice_number' => $invoiceNumber,
                        'remarks' => $remarks,
                        'qty' => $qty,
                        'isActive' => $isActive,
                    ];

                    $prescriptionData[] = $prescription;
                }

                foreach ($prescriptionData as $prescription) {
                    $data = $this->prescriptionContract->storePrescription($prescription);
                }

                DB::commit();

                $notification = [
                    'alert-type' => 'success',
                    'message' => 'Data saved successfully!',
                ];

                $redirectRoute = $this->getRedirectRoute();
                return redirect()->route($redirectRoute)->with($notification);

            } else {

                $notification = [
                    'alert-type' => 'danger',
                    'message' => 'Follow-up Date is required.',
                ];
                return redirect()->back()->with($notification);
            }

        } catch (\Exception $e) {

            dd($e);

            DB::rollback();

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            $redirectRoute = $this->getRedirectRoute();
            return redirect()->route($redirectRoute)->with($notification);
        }
    }
}
