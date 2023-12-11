<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Patient;
use App\Contracts\PatientContract;

class PatientRepository implements PatientContract {

    protected $model;

    public function __construct(Patient $model)
    {
        $this->model = $model;
    }

    public function allPatient($perPage = 10)
    {
        return $this->model
            ->orderBy('id','desc')
            ->paginate($perPage);
    }

    public function storePatient($params)
    {
        return $this->model->create($params);
    }

    public function getPatientById($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function updatePatient($id, $params)
    {
        $patient = $this->model->findOrFail($id);
        $patient->update($params);
        return $patient;
    }

    public function getPatientDataByBmiId($id)
    {
        $patient = $this->model->findOrFail($id);
        return $patient;
    }

    public function getTotalPatient()
    {
        return $this->model->count();
    }

    public function getTotalPatientPerMonth()
    {
        return $this->model
            ->selectRaw('
                DATE_FORMAT(created_at, "%Y-%m") as month,
                COUNT(*) as totalPatients
            ')
            ->groupBy('month')
            ->first();
    }

    public function getMonthlyPatient()
    {
        $currentMonth = Carbon::now()->format('Y-m');

        return $this->model
            ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])
            ->get();
    }
}
