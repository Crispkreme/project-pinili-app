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

    public function getPatientPrescription($id, $perPage = 10)
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
                ->paginate($perPage);
        } catch (ModelNotFoundException $exception) {
            dd("Patient not found");
        }
    }
}
