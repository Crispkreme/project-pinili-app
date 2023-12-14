<?php

namespace App\Repositories;

use App\Models\PatientBmi;
use App\Contracts\PatientBmiContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientBmiRepository implements PatientBmiContract {

    protected $model;

    public function __construct(PatientBmi $model)
    {
        $this->model = $model;
    }

    public function allPatientBmi()
    {
        return $this->model
            ->with(["patient"])
            ->orderBy('id','desc')
            ->get();
    }

    public function storePatientBmi($params)
    {
        return $this->model->create($params);
    }

    public function getPatientBmiByPatientId($id)
    {
        return $this->model
        ->with(['patient'])
        ->whereHas('patient', function ($query) use ($id) {
            $query->where('id', $id);
        })
        ->first();
    }

    public function updatePatientBmi($id, $params)
    {
        $patientBmi = $this->model->findOrFail($id);
        $patientBmi->update($params);
        return $patientBmi;
    }

    public function getPatientBMIByCheckupId($id)
    {
        $patientBmi = $this->model->findOrFail($id);
        return $patientBmi;
    }

    public function addPatientDiagnosis($id, $params)
    {
        try {
            $bmi = $this->model->findOrFail($id);
            $bmi->update([
                'diagnosis' => $params['diagnosis'],
            ]);
            return $bmi;
        } catch (ModelNotFoundException $exception) {
            return null;
        }
    }

    public function getPatientIdByPatientBmi($id)
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return null;
        }
    }

    public function getPatientCheckupDate($id)
    {
        return $this->model
        ->where('patient_id', $id)
        ->first();
    }
}