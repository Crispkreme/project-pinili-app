<?php

namespace App\Repositories;

use App\Models\Prescription;
use App\Contracts\PrescriptionContract;

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
        // return $this->model
        //     ->with(['patientBmi', 'patientBmi.patient', 'statuses'])
        //     ->whereHas('patientBmi', function ($query) use ($id) {
        //         $query->where('patient_id', $id);
        //     })
        //     ->paginate($perPage);

        $data = $this->model
            ->with(['patientCheckup', 'prescribe_medicine', 'prescribe_laboratory', 'status'])
            ->whereHas('patientCheckup', function ($query1) {
                $query1->whereHas('patientBmi', function ($query2) {
                    $query2->where('patient_id', $id);
                });
            })
            ->paginate($perPage);
        dd($data);
    }
}
