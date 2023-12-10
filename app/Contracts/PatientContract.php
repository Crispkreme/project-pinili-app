<?php

namespace App\Contracts;

interface PatientContract {

    public function allPatient();
    public function storePatient($params);
    public function getPatientById($id);
    public function updatePatient($id, $params);
    public function getPatientDataByBmiId($id);
    public function getTotalPatientPerMonth();
}
