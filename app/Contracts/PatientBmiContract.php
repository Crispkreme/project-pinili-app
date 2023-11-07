<?php

namespace App\Contracts;

interface PatientBmiContract {

    public function allPatientBmi();
    public function storePatientBmi($params);
    public function getPatientBmiByPatientId($id);
    public function updatePatientBmi($id, $params);
}
