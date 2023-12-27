<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\Prescription;
use App\Contracts\PrescriptionContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PrescriptionRepository implements PrescriptionContract {

    protected $model;

    public function __construct(Prescription $model)
    {
        $this->model = $model;
    }

    public function storePrescription($params)
    {
        return $this->model->create($params);
    }

    public function getPatientPrescription($id)
    {
        try {
            $patient = Patient::findOrFail($id);

            return $this->model
                ->with(['patientCheckup', 'prescribe_medicine', 'prescribe_laboratory', 'status'])
                ->when($patient, function ($query) use ($id) {
                    $query->whereHas('patientCheckup', function ($query) use ($id) {
                        $query->whereHas('patientBmi', function ($query) use ($id) {
                            $query->where('patient_id', $id);
                        });
                    });
                })
                ->orderBy('id','desc')
                ->get();
        } catch (ModelNotFoundException $exception) {
            dd("Patient not found");
        }
    }

    public function getAllPatientPrescription()
    {
        return $this->model
        ->where('qty', '!=', 0)
        ->select(
            'patient_checkup_id',
            'status_id',
            'invoice_number',
            'remarks',
            'qty',
            'isActive',
        )
        ->get()
        ->groupBy('invoice_number')
        ->map(function ($group) {
            return $group->first();
        })
        ->values();
    }

    public function getPrescribeMedicineLaboratoryIdByPrescription($params)
    {
        return $this->model
        ->where('qty', '!=', 0)
        ->where('invoice_number', $params)
        ->get();
    }

    public function getSpecificPatientPrescription($id)
    {
        return $this->model
        ->with('prescribe_medicine', 'prescribe_laboratory', 'status')
        ->where('patient_checkup_id', $id)
        ->where('qty', '!=', 0)
        ->get();
    }
}
